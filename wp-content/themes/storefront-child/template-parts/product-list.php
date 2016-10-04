<?php
     global $post_id;
?>
<div class=" product item">
    <?php echo get_the_post_thumbnail($post_id, 'thumbnail', array('class' => 'full-width')) ?>
    <div class="header-item display-block">
        <div class="pull-left">
            <a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            <span class="price">
                <del><span class="amount"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?>&nbsp;₫</span></del> 
                <ins><span class="amount"><?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?>&nbsp;₫</span></ins>
            </span>
        </div>
        <div class="pull-right ">
            <form class="cart margin-top-20" method="post" enctype="multipart/form-data">
                <input type="hidden" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID() ?>">
                <button type="submit" class="button btn-tw-add-cart product_type_simple add_to_cart_button ajax_add_to_cart pull-left">Mua ngay</button>
            </form>
            <!--<p class=" "><a rel="nofollow" href="#" class="button btn-tw-add-cart product_type_simple add_to_cart_button ajax_add_to_cart">Mua ngay</a></p>-->
        </div>
    </div>
    <p class=" margin-top-10">
        <?php the_excerpt(); ?>
    </p>
</div>