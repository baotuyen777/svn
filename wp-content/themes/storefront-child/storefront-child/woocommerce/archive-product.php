<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
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
            <div class="content-page">
                <?php do_action('storefront_content_top'); ?>
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
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="col-sm-4 col-xs-6 col-md-3">
                                        <?php
                                        global $post_id;
                                        $post_id = get_the_id();
                                        include(locate_template('template-parts/product-list.php'));
                                        ?>
                                    </div>
                                    <?php
                                    if ($i % 4 == 0) {
                                        echo '</div></div></div>';
                                        echo '<div class="block-producsss">
                                            <div class="container">
                                            <div class="row">';
                                    }
                                    $i++;
                                    ?>
                                <?php endwhile; // end of the loop.  ?>
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
