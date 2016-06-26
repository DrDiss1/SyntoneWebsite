<?php get_header(); ?>

    <div class="row ClearRow" id="FrontPageRow">
        <div class="row spaceRow"></div>
        <div class="coffee-span-8 coffee-offset-2 coffee-1024-offset-0 coffee-1024-span-12">
            <div class="subgrid central" id="dimColour">
                <div class="coffee-span-12"></div>
                <div class="coffee-span-12 central">
                    <h1 class="white">We Make Music</h1>
                </div>
                <div class="coffee-span-12 central">
                    <p class="subTitle">Welcome to Syntone, the manufacturers of impeccable sounds.</p>
                </div>
                <div class="coffee-span-8 coffee-offset-2 coffee-600-span-12 coffee-600-offset-0 central">
                    <?php echo do_shortcode("[cue id=\"45\"]"); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row GreenRow contentRow central">
        <svg class="breaker" x="0px" y="0px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="300px" height="50px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
            <rect class="greyBlock block" x="18" y="80" width="33" height="33"></rect>
            <rect class="blackBlock block" x="52" y="80" width="33" height="33"></rect>
            <rect class="greyBlock block" x="85" y="80" width="33" height="33"></rect>
            <rect class="blackBlock block" x="118" y="80" width="33" height="33"></rect>
            <rect class="greyBlock block" x="151" y="80" width="33" height="33"></rect>
        </svg>
    </div>

    <div class="row DarkRow DarkShadow roomVertical contentRow">

        <div class="coffee-span-5 coffee-offset-1 coffee-600-span-12 coffee-600-offset-0">
            <h4 class="central roomHorizontal" id="blogTitle"><a href="#/blog">Latest Projects</a></h4>
            <div class=" central text paragraph contentRow">
                <?php
                function my_permalink() {
                    echo substr(get_permalink(), strlen(get_option('home')));
                }
                ?>
                <?php
                $postslist = get_posts('numberposts=3&order=DESC&orderby=date&tag=project');
                foreach ($postslist as $post) :
                    setup_postdata($post);
                    ?>
                    <div class="entry coffee-span-12 roomHorizontal">
                        <div class="roomHorizontal contentRow central">
                            <h6 class="coffee-span-12"><a href="<?php my_permalink(); ?>"><?php the_title(); ?></a></h6>
                            <div class="coffee-span-12 central"><a id="<?php the_ID(); ?>" href="<?php my_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="coffee-span-5 coffee-600-span-12">
            <h4 class="central roomHorizontal" id="blogTitle"><a href="#/blog">Latest Blog Posts</a></h4>
            <div class="text paragraph contentRow">
                <?php
                $postslist = get_posts('numberposts=3&order=DESC&orderby=date');
                foreach ($postslist as $post) :
                    setup_postdata($post);
                    ?>
                    <div class="entry coffee-span-12 roomHorizontal">
                        <div class="roomHorizontal contentRow">
                            <h6 class="coffee-span-12"><a href="<?php my_permalink(); ?>"><?php the_title(); ?></a></h6>
                            <div class='btpostdiv'>
                                <div class="coffee-span-2 coffee-600-span-12"><?php the_post_thumbnail('thumbnail'); ?></div>
                                <div class="coffee-span-8 coffee-600-span-12">
                                    <p>Author: <?php the_author() ?> on <?php the_time(get_option('date_format')); ?></p>
                                    <p>No. of comments: <?php comments_number( '0', '1', '%' ); ?></p>
                                </div>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <div class="row GreenRow contentRow central">
        <svg class="breaker" x="0px" y="0px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="300px" height="50px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
            <rect class="greyBlock block" x="18" y="80" width="33" height="33"></rect>
            <rect class="blackBlock block" x="52" y="80" width="33" height="33"></rect>
            <rect class="greyBlock block" x="85" y="80" width="33" height="33"></rect>
            <rect class="blackBlock block" x="118" y="80" width="33" height="33"></rect>
            <rect class="greyBlock block" x="151" y="80" width="33" height="33"></rect>
        </svg>
    </div>

<?php
// Determine parent page ID
$parent_page_id = 14;

// Get child pages as array
$page_tree_array = get_pages( array(
    'child_of' => $parent_page_id) );
$pageCheck = true;

foreach($page_tree_array as $post) : ?>
    <div class="row DarkRow DarkShadow roomVertical contentRow">
        <div class="coffee-span-12 central">
            <h4 class="white"><?php the_title(); ?></h4>
        </div>
        <?php if($pageCheck) { ?>
             <div class="coffee-span-4 coffee-offset-2 coffee-600-span-12 coffee-600-offset-0 central roomHorizontal">
                 <?php the_post_thumbnail('medium'); ?>
             </div>
             <div class="coffee-span-4 coffee-600-span-12 roomHorizontal">
                 <p><?php echo $post->post_content ?></p>
             </div>
        <?php } else { ?>
            <div class="coffee-span-4 coffee-offset-2 coffee-600-span-12 coffee-600-offset-0 roomHorizontal">
                <p><?php echo $post->post_content ?></p>
            </div>
            <div class="coffee-span-4 coffee-600-span-12 central roomHorizontal">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php }
        $pageCheck = !$pageCheck ?>
    </div>
    <div class="row GreenRow contentRow central">
        <svg class="breaker" x="0px" y="0px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="300px" height="50px" viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
                <rect class="greyBlock block" x="18" y="80" width="33" height="33"></rect>
            <rect class="blackBlock block" x="52" y="80" width="33" height="33"></rect>
            <rect class="greyBlock block" x="85" y="80" width="33" height="33"></rect>
            <rect class="blackBlock block" x="118" y="80" width="33" height="33"></rect>
            <rect class="greyBlock block" x="151" y="80" width="33" height="33"></rect>
            </svg>
    </div>
<?php endforeach ?>

<?php get_footer();?>