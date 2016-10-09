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
    <div class="detail-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-8">
                <?php do_action('storefront_content_top'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                             $_product = $_pf->get_product(get_the_id());
                             $product_id = get_the_id();
                        ?>
                        <div class="row margin-top-20">
                            <div class="col-sm-6">
                                <h1 class=" text-orange font-blow text-uppercase"><?php the_title(); ?></h1>
                                <?php echo get_the_post_thumbnail(get_the_id(),array('class' => 'full-width')); ?>
                            </div>
                            <div class="col-sm-6 margin-top-60">

                                <p><?php echo $_product->post->post_excerpt; ?></p>
                                <div class="pull-right ">
                                    <form class="cart margin-top-20" method="post" enctype="multipart/form-data">
                                        <input type="hidden" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                                        <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID() ?>">
                                        <button type="submit" class="button btn-tw-add-cart product_type_simple add_to_cart_button ajax_add_to_cart pull-left"><strong>Mua ngay</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr class="bold margin-top-45">
                        <div class="margin-top-20">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; // end of the loop. ?>

                    <section class="margin-top-45 homepage">
                    <?php 
                        $terms = get_the_terms($post->ID, 'product_cat');
                    ?>
                        <h3 class="inline-block ">SẢN PHẨM TƯƠNG TỰ </h3><a href="<?php echo get_category_link($terms[0]->term_id) ?>">xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
