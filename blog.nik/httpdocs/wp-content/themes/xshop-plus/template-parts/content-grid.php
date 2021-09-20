<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package XShop Plus
 */
$xshop_plus_categories = get_the_category();
	if($xshop_plus_categories){
		$xshop_plus_category = $xshop_plus_categories[mt_rand(0,count( $xshop_plus_categories)-1)];
	}else{
		$xshop_plus_category = '';
	}
?>
<div class="col-lg-6 grid-item">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="xpost-item shadow pb-3 mb-5">
	<?php if( has_post_thumbnail( ) ): ?>
		<div class="xshop-plus-pimg">
		<?php if ( 'post' === get_post_type() && !empty($xshop_plus_category) ) : ?>
					<a class="xshoppimg-cat" href="<?php echo esc_url(get_category_link($xshop_plus_category)); ?>"><?php echo esc_html($xshop_plus_category->name ); ?></a>
		<?php endif; ?>
		<?php xshop_plus_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
		<div class="xpost-text xpost-grid-text p-3">
			<div class="grid-head">
				<span class="ghead-meta">
					<?php if ( 'post' === get_post_type() && !empty($xshop_plus_category) && ! has_post_thumbnail( ) ) : ?>
					<a href="<?php echo esc_url(get_category_link($xshop_plus_category)); ?>"><?php echo esc_html($xshop_plus_category->name.' / '); ?></a>
					<?php endif; ?>
				</span>
		<?php the_title( '<h2 class="entry-title grp-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</div>
		<?php the_excerpt(  ); ?>
			
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="grid-bmeta">
				<?php
				xshop_plus_posted_on();
				xshop_plus_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>	
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
