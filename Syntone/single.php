
<?php get_header();?>

    <div id="primary" class="content-area row contentRow">

        <div class="row spaceRowDouble"></div>
        <div class="row GreenRow central">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
        </div>

        <main class="row coffee-span-7 coffee-offset-1 coffee-1024-span-12 coffee-1024-offset-0">
            <div class="row DarkRow">

                        <div class='entry coffee-span-10 coffee-offset-1'>
                            <div class="btpostdiv">
                                <div class="coffee-span-2 coffee-600-span-12"><?php the_post_thumbnail('thumbnail'); ?></div>
                                <div class="coffee-span-8 coffee-600-span-12">
                                    <p>Author: <?php the_author() ?> on <?php the_time(get_option('date_format')); ?></p>
                                </div>
                                
                            </div>
                            <div>
                                <?php the_content(); ?>
                            </div>
                        </div>
                </div>
            <div class="row">
                <?php if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
                <?php
                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                        'prev_text' => _x( '<h3 class="meta-nav">Published in</h3><h3 class="post-title">%title</h3>', 'Parent post link', 'syntone' ),
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
                    <?php endwhile; ?>
                    <?php endif; ?>
            </main>

        <div class="row coffee-span-3 coffee-1024-span-12">
            <div class=" coffee-span-10 coffee-offset-1 coffee-1024-span-12 coffee-1024-offset-0">
                <?php get_sidebar(); ?>
            </div>
        </div>

        <div class="row GreenRow">
            <div class="coffee-span-12"></div>
        </div>

    </div><!-- .content-area -->

<?php get_footer();?>