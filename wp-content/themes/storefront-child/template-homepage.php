<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
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
                    <h3 class="inline-block">SẢN PHẨM MỚI </h3>
                    <a href="<?php echo get_permalink(PAGE_NEW_PRODCT)?>">xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    <div class="block-items products">
                        <div class="row">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 4,
                                'orderby' => 'date',
                                'order' => 'desc'
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();
                                    ?>
                                    <div class="col-sm-4 col-xs-6 col-md-3">
                                        <?php
                                          include(locate_template('template-parts/product.php'));
                                        ?>
                                    </div>
                                    <?php
                                endwhile;
                            } else {
                                echo __('No products found');
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <br><br>
                    <h3 class="inline-block"> BÁN CHẠY</h3>
                    <a href="<?php echo get_permalink(PAGE_BEST_SELLER)?>">xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    <div class="block-items products">

                        <div class="row">
                            <?php
                            $atts = shortcode_atts(array(
                                'per_page' => '12',
                                'columns' => '4',
                                'category' => '', // Slugs
                                'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                                    ), 'best_selling_products');

                            $query_args = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'ignore_sticky_posts' => 1,
                                'posts_per_page' => $atts['per_page'],
                                'meta_key' => 'total_sales',
                                'orderby' => 'meta_value_num',
                                'meta_query' => WC()->query->get_meta_query()
                            );
                            $bestSeller = new WP_Query($query_args);
                            if ($bestSeller->have_posts()): while ($bestSeller->have_posts()): $bestSeller->the_post();
                                    global $post_id;
                                    $post_id = get_the_ID();
                                    ?>
                                    <div class="col-sm-4 col-xs-6 col-md-3">
                                        <?php
                                          include(locate_template('template-parts/product.php'));
                                        ?>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-sm-5 col-md-4">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- end main-->
<?php
get_footer();
