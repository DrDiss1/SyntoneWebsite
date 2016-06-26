<?php get_header();?>
<div class="row spaceRowDouble"></div>
<div class="row GreenRow central">
    <h1><?php the_title(); ?></h1>
</div>

    <div class="row">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="coffee-span-8 coffee-offset-2 coffee-600-span-12 coffee-600-offset-0 DarkRow roomVertical">
                <?php for ($i=0; $i<sizeof($pages);$i++) { ?>
                        <p class="paragraph words roomHorizontal">
                            <?php echo $pages[$i]; ?>
                        </p>
                <?php } ?>
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