<?php
/**
 * XShop Plus Theme Customizer
 *
 * @package XShop Plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xshop_plus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//select sanitization function
	function xshop_plus_sanitize_select( $input, $setting ){
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		  
	}

	$wp_customize->add_panel( 'xshop_plus_options', array(
		 'priority'       => 50,
		  'title'          => __('XShop Plus Options', 'xshop-plus'),
		  'description'    => __('All XShop Plus theme settings', 'xshop-plus'),
		  ) );
    $wp_customize->add_section('xshop_plus_header', array(
		'title' => __('XShop Plus Header Settings', 'xshop-plus'),
		'capability'     => 'edit_theme_options',
		'description'     => __('XShop Plus theme header settings', 'xshop-plus'),
		'panel'    => 'xshop_plus_options',
	
	));
	$wp_customize->add_setting('xshop_plus_logo_align', array(
        'default'        => 'center',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xshop_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xshop_plus_logo_align', array(
        'label'      => __('Logo Position', 'xshop-plus'),
        'description'=> __('Set yout header logo position ', 'xshop-plus'),
        'section'    => 'xshop_plus_header',
        'settings'   => 'xshop_plus_logo_align',
        'type'       => 'select',
        'choices'    => array(
            'flex-start' => __('Left', 'xshop-plus'),
            'center' => __('Center', 'xshop-plus'),
            'flex-end' => __('Right', 'xshop-plus'),
        ),
    ));
	//xshop blog settings
    $wp_customize->add_section('xshop_plus_blog', array(
		'title' => __('XShop Plus Blog Settings', 'xshop-plus'),
		'capability'     => 'edit_theme_options',
		'description'     => __('XShop Plus theme blog settings', 'xshop-plus'),
		'panel'    => 'xshop_plus_options',
	
	));
	$wp_customize->add_setting('xshop_plus_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xshop_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xshop_plus_blog_container', array(
        'label'      => __('Container type', 'xshop-plus'),
        'description'=> __('You can set standard container or full width container. ', 'xshop-plus'),
        'section'    => 'xshop_plus_blog',
        'settings'   => 'xshop_plus_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'xshop-plus'),
            'container-fluid' => __('Full width Container', 'xshop-plus'),
        ),
    ));
    $wp_customize->add_setting('xshop_plus_blog_layout', array(
        'default'        => 'leftside',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xshop_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xshop_plus_blog_layout', array(
        'label'      => __('Select Blog Layout', 'xshop-plus'),
        'description'=> __('Right and Left sidebar only show when sidebar widget is available. ', 'xshop-plus'),
        'section'    => 'xshop_plus_blog',
        'settings'   => 'xshop_plus_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'xshop-plus'),
            'leftside' => __('Left Sidebar', 'xshop-plus'),
            'fullwidth' => __('No Sidebar', 'xshop-plus'),
        ),
    ));
	$wp_customize->add_setting('xshop_plus_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xshop_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xshop_plus_blog_style', array(
        'label'      => __('Select Blog Style', 'xshop-plus'),
        'section'    => 'xshop_plus_blog',
        'settings'   => 'xshop_plus_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'xshop-plus'),
            'classic' => __('Classic Style', 'xshop-plus'),
        ),
    ));
		//xshop page settings
		$wp_customize->add_section('xshop_plus_page', array(
			'title' => __('XShop Plus Page Settings', 'xshop-plus'),
			'capability'     => 'edit_theme_options',
			'description'     => __('XShop Plus theme blog settings', 'xshop-plus'),
			'panel'    => 'xshop_plus_options',
		
		));
		$wp_customize->add_setting('xshop_plus_page_container', array(
			'default'        => 'container',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'xshop_plus_sanitize_select',
			'transport' => 'refresh',
		));
		$wp_customize->add_control('xshop_plus_page_container', array(
			'label'      => __('Page Container type', 'xshop-plus'),
			'description'=> __('You can set standard container or full width container for page. ', 'xshop-plus'),
			'section'    => 'xshop_plus_page',
			'settings'   => 'xshop_plus_page_container',
			'type'       => 'select',
			'choices'    => array(
				'container' => __('Standard Container', 'xshop-plus'),
				'container-fluid' => __('Full width Container', 'xshop-plus'),
			),
		));	
		$wp_customize->add_setting('xshop_plus_page_header', array(
			'default'        => 'show',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'xshop_plus_sanitize_select',
			'transport' => 'refresh',
		));
		$wp_customize->add_control('xshop_plus_page_header', array(
			'label'      => __('Show Page header', 'xshop-plus'),
			'section'    => 'xshop_plus_page',
			'settings'   => 'xshop_plus_page_header',
			'type'       => 'select',
			'choices'    => array(
				'show' => __('Show all pages', 'xshop-plus'),
				'hide-home' => __('Hide Only Front Page', 'xshop-plus'),
				'hide' => __('Hide All Pages', 'xshop-plus'),
			),
		));	




	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'xshop_plus_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'xshop_plus_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'xshop_plus_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function xshop_plus_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function xshop_plus_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xshop_plus_customize_preview_js() {
	wp_enqueue_script( 'xshop-plus-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), XSHOP_PLUS_VERSION, true );
}
add_action( 'customize_preview_init', 'xshop_plus_customize_preview_js' );
