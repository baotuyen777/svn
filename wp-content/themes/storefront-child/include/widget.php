<?php

// Creating the widget 
class wpb_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'show_product',
// Widget name will appear in UI
                __('Show product', 'wpb_widget_domain'),
// Widget description
                array('description' => __('Show one product'),)
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget($args, $instance) {
        $product_id = apply_filters('widget_product_id', $instance['product_id']);
        $product = get_post($product_id);
        if ($product):
            ?>
            <div class="feature-product products">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pro-1.png">
                <div class="content product">
                    <h3><a href="<?php echo get_permalink($product_id) ?>"><?php echo $product->post_title ?></a></h3>
                    <p class="margin-top-20"> <?php echo $product->post_excerpt ?></p>
                    <span class="price display-block">
                        <del><span class="amount size-14"><?php echo get_post_meta($product_id, '_regular_price', true); ?>&nbsp;₫</span></del> - 
                        <ins><span class="amount size-16"><?php echo get_post_meta($product_id, '_sale_price', true); ?>&nbsp;₫</span></ins>
                    </span>
                    <p class="margin-top-20 ">
                    <form class="cart" method="post" enctype="multipart/form-data">
                        <input type="hidden" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                        <input type="hidden" name="add-to-cart" value="<?php echo $product_id ?>">
                        <button type="submit" class="button btn-tw-add-cart product_type_simple add_to_cart_button ajax_add_to_cart pull-left">Mua ngay</button>
                    </form>
                </div>
            </div>
            <?php
        endif;
    }

// Widget Backend 
    public function form($instance) {
        if (isset($instance['product_id'])) {
            $product_id = $instance['product_id'];
        } else {
            $product_id = __('10', 'wpb_widget_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('product_id'); ?>"><?php _e('Input product id'); ?></label> 
            <input type="number" class="widefat" id="<?php echo $this->get_field_id('product_id'); ?>" name="<?php echo $this->get_field_name('product_id'); ?>" type="text" value="<?php echo esc_attr($product_id); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['product_id'] = (!empty($new_instance['product_id']) ) ? strip_tags($new_instance['product_id']) : '';
        return $instance;
    }

}

// Class wpb_widget ends here
// Register and load the widget
function wpb_load_widget() {
    register_widget('wpb_widget');
}

add_action('widgets_init', 'wpb_load_widget');
