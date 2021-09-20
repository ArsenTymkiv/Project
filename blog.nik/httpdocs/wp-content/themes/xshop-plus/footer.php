<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package XShop Plus
 */

?>

	<footer id="colophon" class="site-footer <?php if(is_active_sidebar( 'footer-widget' )): ?>has-footer-widget<?php endif; ?>">
		<?php if(is_active_sidebar( 'footer-widget' )): ?>
			<div class="footer-widget footer-top bg-dark text-white pt-3  pb-3">
				<div class="container">
					<?php dynamic_sidebar( 'footer-widget' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="site-info text-center  pt-3 pb-3 ">
			<div class="container">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'xshop-plus' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'xshop-plus' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
				<?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf(esc_html__('%1$s by %2$s.', 'xshop-plus'), '<a href="https://wpthemespace.com/product/xshop/">X Shop</a>', 'Wp Theme Space');
                        ?>
					
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php
		if ( function_exists( 'xshop_plus_woocommerce_header_cart' ) ) {
			xshop_plus_woocommerce_header_cart();
		}
	?>

<?php wp_footer(); ?>

</body>
</html>
