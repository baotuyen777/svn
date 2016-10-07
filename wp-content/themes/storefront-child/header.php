<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
        <!--<link rel="icon" type="image/png" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/owl-carousel/owl.theme.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/override.css">

    </head>
    <?php
        global $woocomerce;
        ob_start();
    ?>
    <body <?php body_class(); ?>>
    <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div id="page" class="hfeed site">
            <?php do_action('storefront_before_header'); ?>

            <header id="masthead" class="site-header1" role="banner" >

                <div class="header-pc hidden-xs">
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="size-16 text-white">Hotline đặt hàng: <?php echo get_field('phone_header', PAGE_HOME) ?></p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="menu-top">
                                        <?php
                                        $client_id = get_option('qsoft_facebook_app_id');
                                        $redirect_uri = admin_url('admin-ajax.php?action=qsoft_facebook_callback');
                                        if (!is_user_logged_in()):
                                            ?>
                                            <a href="https://www.facebook.com/dialog/oauth?client_id=<?php echo $client_id ?>&redirect_uri=<?php echo $redirect_uri ?>">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>Đăng nhập bằng facebook 
                                            </a>
                                            <?php
                                        else:
                                            $current_user = wp_get_current_user();
                                            ?>

                                            <div class="dropdown dropdown_cart">
                                                <button class=" dropdown-toggles btn_cart" type="button" data-toggle="dropdowns">
                                                    <a >Xin chào: <?php echo $current_user->display_name ?></a>
                                                   <!--  <span class="caret"></span> -->
                                                </button>
                                                <!-- <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo get_permalink(PAGE_MY_ACCOUNT) ?>">My account</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo wp_logout_url(home_url()) ?>">logout</a>
                                                    </li>
                                                    
                                                </ul> -->
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?php echo get_permalink(PAGE_ABOUT_US) ?>"><i class="fa fa-users" aria-hidden="true"></i>Về chúng tôi </a>
                                        <!--<a href="#"></a>-->
                                        <div class="dropdown dropdown_cart">
                                            <button class=" dropdown-toggle btn_cart" type="button" data-toggle="dropdown">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Giỏ hàng
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php woocommerce_mini_cart( ); ?>
                                                <!-- <li>
                                                    <?php //the_widget('WC_Widget_Cart', 'title='); ?>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-mid">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="<?php echo home_url() ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png"></a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-search">
                                        <?php
                                        wc_get_template('product-searchform.php');
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="container">
                            <nav class="navbar navbar-defaults">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'navbar-collapse collapse text-white',
                                        'container_id' => 'navbar',
                                        'menu_class' => 'no-padding list-style-none font-blow'
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="header-mobile visible-xs">
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="size-16 text-center text-white">Hotline đặt hàng: <?php echo get_field('phone_header', PAGE_HOME) ?></p>
                                </div>
                                <div class="col-xs-12 padding-0">
                                    <div class="menu-top text-center">
                                        <?php
                                        $client_id = get_option('qsoft_facebook_app_id');
                                        $redirect_uri = admin_url('admin-ajax.php?action=qsoft_facebook_callback');
                                        if (!is_user_logged_in()):
                                            ?>
                                            <a href="https://www.facebook.com/dialog/oauth?client_id=<?php echo $client_id ?>&redirect_uri=<?php echo $redirect_uri ?>">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>Đăng nhập
                                            </a>
                                            <?php
                                        else:
                                            $current_user = wp_get_current_user();
                                            ?>

                                            <div class="dropdown dropdown_cart">
                                                <button class=" dropdown-toggles btn_cart" type="button" data-toggle="dropdowns">
                                                    <a ><?php echo $current_user->display_name ?></a>
                                                   <!--  <span class="caret"></span> -->
                                                </button>
                                                <!-- <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo get_permalink(PAGE_MY_ACCOUNT) ?>">My account</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo wp_logout_url(home_url()) ?>">logout</a>
                                                    </li>
                                                    
                                                </ul> -->
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?php echo get_permalink(PAGE_ABOUT_US) ?>"><i class="fa fa-users" aria-hidden="true"></i>Về chúng tôi </a>
                                        <!--<a href="#"></a>-->
                                        <div class="dropdown dropdown_cart">
                                            <button class=" dropdown-toggle btn_cart" type="button" data-toggle="dropdown">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Giỏ hàng
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-mid">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="<?php echo home_url() ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png"></a>
                                </div>
                                <div class="col-xs-6">
                                    <div class="dropdown">
                                        <button type="button" class="dropdown-toggle pull-right" data-toggle="dropdown">
                                            <i class="fa fa-bars text-white size-22" aria-hidden="true"></i>
                                        </button>
                                        <div id="navbar-mobile" class="dropdown-menu">
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary',
                                                    'menu_class' => 'no-padding list-style-none text-uppercase font-blow'
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="form-search">
                            <?php
                                wc_get_template('product-searchform.php');
                            ?>
                        </div>
                    </div>
                </div>
            </header><!-- #masthead -->

            <?php
            /**
             * Functions hooked in to storefront_before_content
             *
             * @hooked storefront_header_widget_region - 10
             */
//            do_action('storefront_before_content');
            ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">

                    <?php
                    /**
                     * Functions hooked in to storefront_content_top
                     *
                     * @hooked woocommerce_breadcrumb - 10
                     */
                    do_action('storefront_content_top');
                    