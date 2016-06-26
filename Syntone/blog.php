<?php
/*
Template Name: Blog Page
*/
?>
<?php get_header();?>

<div id="primary" class="content-area row contentRow">

    <div class="row spaceRowDouble"></div>
    <div class="row GreenRow central">
        <h1><?php the_title(); ?></h1>
    </div>

        <div class="row coffee-span-9 coffee-1024-span-12">
            <div class="row DarkRow">
                <?php
                $btpgid=get_queried_object_id();
                $btmetanm=get_post_meta( $btpgid, 'WP_Catid','true' );
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array( 'posts_per_page' => 4, 'category_name' => $btmetanm,
                    'paged' => $paged,'post_type' => 'post' );
                $postslist = new WP_Query( $args );

                function my_permalink() {
                    echo substr(get_permalink(), strlen(get_option('home')));
                }

                if ( $postslist->have_posts() ) :
                while ( $postslist->have_posts() ) : $postslist->the_post();


                    ?><div class='entry coffee-span-10 coffee-offset-1'><h3 class='btposth white'>
                        <a href="<?php my_permalink(); ?>"><?php the_title(); ?></a>
                    </h3><div class='btpostdiv'>
                        <div class="coffee-span-2 coffee-600-span-12"><?php the_post_thumbnail('thumbnail'); ?></div>
                        <div class="coffee-span-8 coffee-600-span-12">
                            <p>Author: <?php the_author() ?> on <?php the_time(get_option('date_format')); ?></p>
                            <p>No. of comments: <?php comments_number( '0', '1', '%' ); ?></p>
                        </div>
                        <?php the_excerpt(); ?>
                    </div>
                    </div>

                <?php endwhile; ?>
                    <?php
                    next_posts_link( 'Older Entries', $postslist->max_num_pages );
                    previous_posts_link( 'Next Entries &raquo;' );
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

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