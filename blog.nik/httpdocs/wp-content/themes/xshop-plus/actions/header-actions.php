<?php
/**
 * The file for header all actions
 *
 *
 * @package XShop Plus
 */

function xshop_plus_header_top_output(){
	$xshop_plus_logo_align = get_theme_mod( 'xshop_plus_logo_align' );
?>
	<header id="masthead" class="site-header <?php if( has_header_image() ): ?>has-head-img<?php endif; ?>">
			<?php if( has_header_image() ): ?>
				<?php if( has_header_image() ): ?>
				<div class="header-img"> 
					<?php the_header_image_tag(); ?>
				</div>
				<?php endif; ?>
			<?php endif; ?>
	<?php if(has_custom_logo() || display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
			<div class="container">
			<div class="head-logo-sec logo-<?php echo esc_attr($xshop_plus_logo_align); ?>">
		<?php if(has_custom_logo()): ?>
			<div class="site-branding brand-logo">
				<?php the_custom_logo(); ?>
			</div>
		<?php endif; ?>
			<div class="site-branding brand-text">
					<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						$xshop_plus_description = get_bloginfo( 'description', 'display' );
						if ( $xshop_plus_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $xshop_plus_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>	
					<?php endif; ?>	

			</div><!-- .site-branding -->
			
			</div>
		</div>
	<?php endif; ?>

        <div class="menu-bar text-center">
			<div class="container">
				<div class="xshop-plus-container menu-inner">
					<nav id="site-navigation" class="main-navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'menu_id'        => 'xshop-plus-menu',
								'menu_class'        => 'xshop-plus-menu',
							) );
						?>
					</nav><!-- #site-navigation -->	
				</div>
			</div>
		</div>

		

		
	</header><!-- #masthead -->


<?php
}
add_action('xshop_plus_header_top','xshop_plus_header_top_output');