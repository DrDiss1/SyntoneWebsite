<?php get_header(); ?>

	<div class="row spaceRowDouble"></div>

<?php if ( have_posts() ) : ?>
	<div id="primary" class="content-area row contentRow">
		<div class="row GreenRow central">
			<?php
			the_archive_title( '<h3 class="central">', '</h3>' );
			the_archive_description( '<div class="central">', '</div>' );
			?>
		</div>
		<main id="main" class="row coffee-span-7 coffee-offset-1 coffee-1024-span-12 coffee-1024-offset-0" role="main">
			<div class="row darkRow">

				<div class='entry coffee-span-10 coffee-offset-1'>
					<?php while ( have_posts() ) : the_post(); ?>
						<div>
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						</div>
					<?php endwhile;	?>
				</div>
			</div>
			<div class="row DarkRow roomVertical" style="padding-bottom:10px; margin-bottom:50px">
				<?php
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<span class="meta-nav smallName">Published in</span><span class="post-title smallName">%title</span>', 'Parent post link', 'syntone' ),
					) );
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' =>
							'<div class="coffee-span-9"><span class="screen-reader-text text">' . __( 'Next post:', 'syntone' ) . '</span> ' .
							'<span class="post-title text">%title</span></div>',
						'prev_text' =>
							'<div class="coffee-span-3"><span class="screen-reader-text text">' . __( 'Previous post:', 'syntone' ) . '</span> ' .
							'<span class="post-title text">%title</span></div>',
					) );
				}
				?>
			</div>
		</main><!-- .site-main -->
<?php endif; ?>
	<div class="row coffee-span-3 coffee-1024-span-12">
		<div class=" coffee-span-10 coffee-offset-1 coffee-1024-span-12 coffee-1024-offset-0">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<div class="row GreenRow">
		<div class="coffee-span-12"></div>
	</div>
	</div>
<?php get_footer();?>