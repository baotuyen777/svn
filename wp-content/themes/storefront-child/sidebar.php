<div class="side-bar">
    <?php dynamic_sidebar('sidebar-1'); ?> 

    <div class="side-bar-2">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/fruit-1.png" class="pull-right">
        <div class="content">
            <h3><a href="">Bạn đã thử chưa ?</a></h3>
            <div class="products-sidebar products">
                <?php
                $arrFeature = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'desc',
                    'meta_query' => array(array(
                            'key' => '_featured',
                            'value' => 'yes',
                            'compare' => '=',
                        ))
                );
                $featureProduct = new WP_Query($arrFeature);
                if ($featureProduct->have_posts()):while ($featureProduct->have_posts()):$featureProduct->the_post();
                        ?>
                        <div class="product">
                            <div class="row">
                                <div class="col-xs-6">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pro-1.png" class="full-width">
                                </div>
                                <div class="col-xs-6">
                                    <a class="title" href="<?php the_permalink()?>"> <?php the_title() ?> </a>
                                    <span class="price">
                                        <del><span class="amount"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?>&nbsp;₫</span></del> 
                                        <ins><span class="amount"><?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?>&nbsp;₫</span></ins>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
                <br>
            </div>
        </div>
    </div>
</div>