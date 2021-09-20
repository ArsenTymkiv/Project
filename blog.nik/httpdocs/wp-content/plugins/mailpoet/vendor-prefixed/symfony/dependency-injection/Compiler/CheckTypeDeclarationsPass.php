<?php
 namespace MailPoetVendor\Symfony\Component\DependencyInjection\Compiler; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\IteratorArgument; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\RewindableGenerator; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceClosureArgument; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceLocatorArgument; use MailPoetVendor\Symfony\Component\DependencyInjection\Container; use MailPoetVendor\Symfony\Component\DependencyInjection\Definition; use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException; use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidParameterTypeException; use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\RuntimeException; use MailPoetVendor\Symfony\Component\DependencyInjection\ExpressionLanguage; use MailPoetVendor\Symfony\Component\DependencyInjection\Parameter; use MailPoetVendor\Symfony\Component\DependencyInjection\ParameterBag\EnvPlaceholderParameterBag; use MailPoetVendor\Symfony\Component\DependencyInjection\Reference; use MailPoetVendor\Symfony\Component\DependencyInjection\ServiceLocator; use MailPoetVendor\Symfony\Component\ExpressionLanguage\Expression; final class CheckTypeDeclarationsPass extends AbstractRecursivePass { private const SCALAR_TYPES = ['int' => \true, 'float' => \true, 'bool' => \true, 'string' => \true]; private const BUILTIN_TYPES = ['array' => \true, 'bool' => \true, 'callable' => \true, 'float' => \true, 'int' => \true, 'iterable' => \true, 'object' => \true, 'string' => \true]; private $autoload; private $skippedIds; private $expressionLanguage; public function __construct(bool $autoload = \false, array $skippedIds = []) { $this->autoload = $autoload; $this->skippedIds = $skippedIds; } protected function processValue($value, $isRoot = \false) { if (isset($this->skippedIds[$this->currentId])) { return $value; } if (!$value instanceof Definition || $value->hasErrors() || $value->isDeprecated()) { return parent::processValue($value, $isRoot); } if (!$this->autoload) { if (!($class = $value->getClass())) { return parent::processValue($value, $isRoot); } if (!\class_exists($class, \false) && !\interface_exists($class, \false)) { return parent::processValue($value, $isRoot); } } if (ServiceLocator::class === $value->getClass()) { return parent::processValue($value, $isRoot); } if ($constructor = $this->getConstructor($value, \false)) { $this->checkTypeDeclarations($value, $constructor, $value->getArguments()); } foreach ($value->getMethodCalls() as $methodCall) { try { $reflectionMethod = $this->getReflectionMethod($value, $methodCall[0]); } catch (RuntimeException $e) { if ($value->getFactory()) { continue; } throw $e; } $this->checkTypeDeclarations($value, $reflectionMethod, $methodCall[1]); } return parent::processValue($value, $isRoot); } private function checkTypeDeclarations(Definition $checkedDefinition, \ReflectionFunctionAbstract $reflectionFunction, array $values) : void { $numberOfRequiredParameters = $reflectionFunction->getNumberOfRequiredParameters(); if (\count($values) < $numberOfRequiredParameters) { throw new InvalidArgumentException(\sprintf('Invalid definition for service "%s": "%s::%s()" requires %d arguments, %d passed.', $this->currentId, $reflectionFunction->class, $reflectionFunction->name, $numberOfRequiredParameters, \count($values))); } $reflectionParameters = $reflectionFunction->getParameters(); $checksCount = \min($reflectionFunction->getNumberOfParameters(), \count($values)); $envPlaceholderUniquePrefix = $this->container->getParameterBag() instanceof EnvPlaceholderParameterBag ? $this->container->getParameterBag()->getEnvPlaceholderUniquePrefix() : null; for ($i = 0; $i < $checksCount; ++$i) { if (!$reflectionParameters[$i]->hasType() || $reflectionParameters[$i]->isVariadic()) { continue; } $this->checkType($checkedDefinition, $values[$i], $reflectionParameters[$i], $envPlaceholderUniquePrefix); } if ($reflectionFunction->isVariadic() && ($lastParameter = \end($reflectionParameters))->hasType()) { $variadicParameters = \array_slice($values, $lastParameter->getPosition()); foreach ($variadicParameters as $variadicParameter) { $this->checkType($checkedDefinition, $variadicParameter, $lastParameter, $envPlaceholderUniquePrefix); } } } private function checkType(Definition $checkedDefinition, $value, \ReflectionParameter $parameter, ?string $envPlaceholderUniquePrefix, \ReflectionType $reflectionType = null) : void { $reflectionType = $reflectionType ?? $parameter->getType(); if ($reflectionType instanceof \ReflectionUnionType) { foreach ($reflectionType->getTypes() as $t) { try { $this->checkType($checkedDefinition, $value, $parameter, $envPlaceholderUniquePrefix, $t); return; } catch (InvalidParameterTypeException $e) { } } throw new InvalidParameterTypeException($this->currentId, $e->getCode(), $parameter); } if ($reflectionType instanceof \MailPoetVendor\ReflectionIntersectionType) { foreach ($reflectionType->getTypes() as $t) { $this->checkType($checkedDefinition, $value, $parameter, $envPlaceholderUniquePrefix, $t); } return; } if (!$reflectionType instanceof \ReflectionNamedType) { return; } $type = $reflectionType->getName(); if ($value instanceof Reference) { if (!$this->container->has($value = (string) $value)) { return; } if ('service_container' === $value && \is_a($type, Container::class, \true)) { return; } $value = $this->container->findDefinition($value); } if ('self' === $type) { $type = $parameter->getDeclaringClass()->getName(); } if ('static' === $type) { $type = $checkedDefinition->getClass(); } $class = null; if ($value instanceof Definition) { $class = $value->getClass(); if ($class && isset(self::BUILTIN_TYPES[\strtolower($class)])) { $class = \strtolower($class); } elseif (!$class || !$this->autoload && !\class_exists($class, \false) && !\interface_exists($class, \false)) { return; } } elseif ($value instanceof Parameter) { $value = $this->container->getParameter($value); } elseif ($value instanceof Expression) { try { $value = $this->getExpressionLanguage()->evaluate($value, ['container' => $this->container]); } catch (\Exception $e) { return; } } elseif (\is_string($value)) { if ('%' === ($value[0] ?? '') && \preg_match('/^%([^%]+)%$/', $value, $match)) { $value = $this->container->getParameter(\substr($value, 1, -1)); } if ($envPlaceholderUniquePrefix && \is_string($value) && \str_contains($value, 'env_')) { if ('' === \preg_replace('/' . $envPlaceholderUniquePrefix . '_\\w+_[a-f0-9]{32}/U', '', $value, -1, $c) && 1 === $c) { try { $value = $this->container->resolveEnvPlaceholders($value, \true); } catch (\Exception $e) { return; } } } } if (null === $value && $parameter->allowsNull()) { return; } if (null === $class) { if ($value instanceof IteratorArgument) { $class = RewindableGenerator::class; } elseif ($value instanceof ServiceClosureArgument) { $class = \Closure::class; } elseif ($value instanceof ServiceLocatorArgument) { $class = ServiceLocator::class; } elseif (\is_object($value)) { $class = \get_class($value); } else { $class = \gettype($value); $class = ['integer' => 'int', 'double' => 'float', 'boolean' => 'bool'][$class] ?? $class; } } if (isset(self::SCALAR_TYPES[$type]) && isset(self::SCALAR_TYPES[$class])) { return; } if ('string' === $type && \method_exists($class, '__toString')) { return; } if ('callable' === $type && (\Closure::class === $class || \method_exists($class, '__invoke'))) { return; } if ('callable' === $type && \is_array($value) && isset($value[0]) && ($value[0] instanceof Reference || $value[0] instanceof Definition || \is_string($value[0]))) { return; } if ('iterable' === $type && (\is_array($value) || 'array' === $class || \is_subclass_of($class, \Traversable::class))) { return; } if ($type === $class) { return; } if ('object' === $type && !isset(self::BUILTIN_TYPES[$class])) { return; } if ('mixed' === $type) { return; } if (\is_a($class, $type, \true)) { return; } if ('false' === $type) { if (\false === $value) { return; } } elseif ($reflectionType->isBuiltin()) { $checkFunction = \sprintf('is_%s', $type); if ($checkFunction($value)) { return; } } throw new InvalidParameterTypeException($this->currentId, \is_object($value) ? $class : \gettype($value), $parameter); } private function getExpressionLanguage() : ExpressionLanguage { if (null === $this->expressionLanguage) { $this->expressionLanguage = new ExpressionLanguage(null, $this->container->getExpressionLanguageProviders()); } return $this->expressionLanguage; } } 