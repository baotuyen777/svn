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
            <?php 
                if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) || is_checkout()) {
                    echo '<div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">';
                }else {
                    echo ' <div class="col-sm-7 col-md-8">';
                }
             ?>
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
                    if(is_cart()) { ?>
                        <section class="margin-top-45 cart-page">
                                <h3 class="inline-block ">SẢN PHẨM TƯƠNG TỰ </h3><a href="<?php echo get_category_link(get_terms( 'product_cat')[0]->term_id) ?>">xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            <div class="block-items products">
                                <div class="row">
                                    <?php
                                    $arrRelatedProducts = array(
                                        'orderby' => 'rand',
                                        'post__not_in' => array($post->ID),
                                        'posts_per_page' => 8,
                                        'post_type' => 'product',
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
                        <?php
                    }
                    ?>
                </div>
                <?php 
                if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) || is_checkout()) {
                   
                }else { ?>
                        <div class="col-sm-5 col-md-4">
                            <?php if(is_cart()) {
                                    echo '
                                    <br><br><br><div class="hotline">
                                        <p  class="size-14  margin-top-0 margin-bottom-0 text-center text-white">HOTLINE ĐẶT HÀNG</p>
                                        <p class="size-28 margin-top-0 text-white text-center "><strong>'.get_field('phone_header',PAGE_HOME).'</strong></p>
                                    </div>
                                    <p class="text-orange margin-top-20 size-16"><strong>100% sản phẩm sạch</strong></p>
                                    <p>Chúng tôi cam kết nói không với sản phẩm bẩn, không rõ nguồn gốc xuất xứ.</p>
                                    <p>Các sản phẩm trên website savina.com đảm bảo chất lượng và dịch vụ như những gì đã cam kết.</p>
                                    ';
                                }else{
                                    do_action('storefront_sidebar');      
                                }
                            ?>
                        </div>
                   <?php }
                 ?>
            </div>
        </div>
    </div>
</div><!-- end main-->
<?php
// do_action('storefront_sidebar');
get_footer();
