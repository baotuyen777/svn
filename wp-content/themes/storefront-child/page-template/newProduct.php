<?php
/**
 * Template Name: NewProduct
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
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
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
