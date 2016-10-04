<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
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
<?php
    $_pf = new WC_Product_Factory();
?>
<div class="main">
    <div class="detail">
        <div class="container">
            <div class="breadcrumbs">
                <div class="breadcrumbs size-18 ">
                    <a href>Home</a> - <span class="current">Hoa qua sấy</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 col-md-8">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                             $_product = $_pf->get_product(get_the_id());
                             var_dump(the_post_thumbnail(get_the_id()));
                        ?>

                    <?php endwhile; // end of the loop. ?>

                    <section>
                        <h3 class="inline-block">SẢN PHẨM TƯƠNG TỰ </h3><a href="#">xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    <div class="block-items products">
                        <div class="row">
                            <?php
                            $terms = get_the_terms($post->ID, 'product_cat');
                            $arr_product_cat_id = array();
                            foreach ($terms as $term) {
                                $arr_product_cat_id[] = $term->term_id;
                            }
                            $arrRelatedProducts = array(
                                'orderby' => 'rand',
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => 4,
                                'post_type' => 'product',
//                        'fields' => 'ids',
                                // 'meta_query' => $meta_query,
                                'tax_query' => array(
                                    'relation' => 'OR',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'id',
                                        'terms' => $arr_product_cat_id
                                    )
                                )
                            );
                            $queryRelatedProduct = new WP_Query($arrRelatedProducts);
                            if ($queryRelatedProduct->have_posts()):while ($queryRelatedProduct->have_posts()):$queryRelatedProduct->the_post();
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
                    </section>
                </div>
                <div class="col-sm-5 col-md-4">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- end main-->
<?php get_footer('shop'); ?>
