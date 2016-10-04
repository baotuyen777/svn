<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */
get_header();
?>
<div class="main">
    <div class="homepage">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-8">
                    <?php
                    while (have_posts()) : the_post();

                        do_action('storefront_page_before');

                        get_template_part('content', 'page');

                        /**
                         * Functions hooked in to storefront_page_after action
                         *
                         * @hooked storefront_display_comments - 10
                         */
                        do_action('storefront_page_after');

                    endwhile; // End of the loop. 
                    ?>
                </div>
                <div class="col-sm-5 col-md-4">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- end main-->
<?php
do_action('storefront_sidebar');
get_footer();
