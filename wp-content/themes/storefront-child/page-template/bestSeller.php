<?php
/**
 * Template Name: Bán chạy
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>
<div class="main">
    <div class="list-products">
        <div class="container">
            <span class="breadcrumbs">
                <div class="breadcrumbs  size-20 " xmlns:v="http://rdf.data-vocabulary.org/#">
                    <a href="<?php echo get_home_url(); ?>"">Home</a> / <span class="current"><?php the_title(); ?></span>
                </div><!-- .breadcrumbs -->
            </span>
            <div class="content-page">
                <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                    <h2 class="title seze-20 text-orange font-blow text-uppercase"><?php woocommerce_page_title(); ?> </h2>
                <?php endif; ?>
                <p>
                    <?php
                    do_action('woocommerce_archive_description');
                    ?>
                </p>
            </div>
        </div>
        <div class="">
            <div class="block-items products">
                <?php $i = 1; ?>
                <?php if (have_posts()) : ?>
                    <?php
                    do_action('woocommerce_before_shop_loop');
                    ?>

                    <?php woocommerce_product_loop_start(); ?>

                    <?php woocommerce_product_subcategories(); ?>

                    <div class="block-producsss">
                        <div class="container">
                            <div class="row">
                                <?php
                                $atts = shortcode_atts(array(
                                    'per_page' => '-1',
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

                    <?php woocommerce_product_loop_end(); ?>
                <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                    <?php wc_get_template('loop/no-products-found.php'); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div><!-- end main-->
<?php get_footer('shop'); ?>
