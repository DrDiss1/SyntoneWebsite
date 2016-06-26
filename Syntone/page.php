<?php get_header();?>
<div class="row spaceRowDouble"></div>
<div class="row GreenRow central">
    <h1><?php the_title(); ?></h1>
</div>

<!--Thing that splits up the content manually using 'nextpage' as a comment-->
<?php $post_content = $wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE ID = {$post->ID} LIMIT 0,1");
$raw_pages = explode('<!--nextpage-->', $post_content);
foreach($raw_pages as $raw_page){
    $pages[] = wpautop( do_shortcode( trim($main_content) ) );
}?>
<!-- End Thing -->

    <div class="row">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="coffee-span-8 coffee-offset-2 coffee-600-span-12 coffee-600-offset-0 DarkRow roomVertical">
                        <div class="paragraph words roomHorizontal">
                            <?php the_content(); ?>
                        </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <!-- End WordPress Loop -->
    </div>

<div class="row GreenRow">
    <div class="coffee-span-12"></div>
</div>

<?php get_footer();?>