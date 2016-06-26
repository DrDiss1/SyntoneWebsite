<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'syntone' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" class="smallName" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
	</header><!-- .entry-header -->

	<div class='btpostdiv'>
		<div class="coffee-span-2 coffee-600-span-12"><?php the_post_thumbnail('thumbnail'); ?></div>
		<div class="coffee-span-8 coffee-600-span-12">
			<p>Author: <?php the_author() ?> on <?php the_time(get_option('date_format')); ?></p>
			<p>No. of comments: <?php comments_number( '0', '1', '%' ); ?></p>
		</div>
		<?php the_excerpt(); ?>
	</div>

</article><!-- #post-## -->
