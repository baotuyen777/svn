</div>

<!--    footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo-footer.png" class="logo-footer">
                <div class="row margin-top-45">
                    <div class="col-sm-6">
                        <h4 class="margin-bottom-0">Đặt hàng online:</h4>
                        <?php echo get_field('phone_footer',PAGE_HOME)?>
                        
                    </div>
                    <div class="col-sm-6">
                        <h4 class="margin-bottom-0">Đại chỉ:</h4>
                        <p class="size-18"><?php echo get_field('address',PAGE_HOME)?></p>
                    </div>
                </div>
                <div class="line-footer"></div>
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="margin-bottom-0 margin-top-0">Chia sẻ cùng bạn bè</h4>
                    </div>
                    <div class="col-sm-8">
                        <img class="full-width" src="<?php echo get_stylesheet_directory_uri() ?>/images/layer-footer-1.png">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <h4 class="margin-bottom-0 margin-top-45">Savina Fanpage</h4>
                <?php echo (get_field('fanpage',PAGE_HOME));?>
            </div>
        </div>
    </div>
</footer>
<div class="block-bottom"></div>

<div id="back-to-top"><i class="fa fa-angle-up"></i></div>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery-1.12.4.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/css/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/imgLiquid-min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/app.js"></script>
</body>
</html>
<?php wp_footer(); ?>