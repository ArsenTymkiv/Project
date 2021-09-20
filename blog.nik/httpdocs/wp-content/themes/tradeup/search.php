<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @subpackage tradeup
 * @since tradeup
 */

get_header();
?>

<?php
    $sidebar_layout = get_theme_mod('tradeup_sidebar_layout_section', 'right');
    if ($sidebar_layout == 'left') {
        $sidebar_layout = 'has-left-sidebar';
    } elseif ($sidebar_layout == 'right') {
        $sidebar_layout = 'has-right-sidebar';
    } elseif ($sidebar_layout == 'no') {
        $sidebar_layout = 'no-sidebar';
    }
?>

 <div class="sp-100 bg-w">
        <div class="container">
            <div class="row <?php echo esc_attr($sidebar_layout); ?>">
                <div class="col-lg-8">

					<header class="page-header">
						<h1 class="page-title">
							<?php
							printf( esc_html__( 'Search Results for: %s', 'tradeup' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header> 
					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
						<?php endwhile; ?>

						<div class="row">
	                        <div class="col-12 text-center">
	                            <div class="pagination mt-5">
	                                <?php echo wp_kses_post(paginate_links()); ?>
	                            </div>
	                        </div>
	                    </div>
						

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif;?>

				</div>


					<?php
	                if (($sidebar_layout == 'has-left-sidebar') || ($sidebar_layout == 'has-right-sidebar')) { ?>
						<div class="col-lg-4">
							<aside class="sidebar mt-5 mt-lg-0">
	                        	<?php get_sidebar(); ?>
	                    	</aside>
						</div>
					<?php } ?>
			</div> 
		</div> 
	</section>

<?php
get_footer();
