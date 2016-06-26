
<?php get_header();?>

<div id="primary" class="content-area row contentRow">

    <div class="row spaceRowDouble"></div>
    <div class="row GreenRow central">
        <h1><?php _e( '404 - Page Not Found', 'syntone' ); ?></h1>
    </div>

    <main class="row coffee-span-7 coffee-offset-1 coffee-1024-span-12 coffee-1024-offset-0 roomVertical">
        <div class="row DarkRow">

            <div class='entry coffee-span-10 coffee-offset-1 roomVertical'>
                <div>
                    <p>Well, it would seem that the page you tried to look for doesn't exist. Try the menu above, or the options to the right to find what you were actually after.</p>
                </div>
            </div>
        </div>
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