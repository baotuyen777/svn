
<?php
	global $post_id;
?>
<div class="item product">
    <?php echo get_the_post_thumbnail($post_id, 'thumbnail', array('class' => 'full-width')) ?>
    <a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    <span class="price">
        <del><span class="amount"><?php echo get_post_meta(get_the_ID(), '_regular_price', true); ?>&nbsp;₫</span></del> 
        <ins><span class="amount"><?php echo get_post_meta(get_the_ID(), '_sale_price', true); ?>&nbsp;₫</span></ins>
    </span>
</div>