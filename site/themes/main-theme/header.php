<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( '', '' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<div id="wrapper">
<header>
    <nav id="header" class="navbar navbar-expand-md <?php echo esc_attr($navbar_scheme); if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' fixed-top'; elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' fixed-bottom'; endif; if (is_home() || is_front_page()) : echo ' home'; endif; ?>">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                <?php
                $header_logo = get_theme_mod('header_logo');
                if (!empty($header_logo)) :
                ?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
                <?php
                else :
                    echo esc_attr(get_bloginfo('name', 'display'));
                endif;
                ?>
            </a>

            <!-- Toggle for Mobile -->
            <button class="navbar-toggler d-md-none" type="button" id="mobileMenuToggle" aria-label="<?php esc_attr_e('Toggle navigation', 'wp_bootstrap_starter'); ?>">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff" width="24" height="24">
                    <path d="M4 6H20M4 12H14M4 18H9" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <!-- Desktop Navbar -->
            <div id="navbar" class="navbar-collapse d-none d-md-flex">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container'      => '',
                    'menu_class'     => 'navbar-nav me-auto',
                    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'         => new WP_Bootstrap_Navwalker(),
                ));

                if ('1' === $search_enabled) :
                ?>
                    <form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="input-group">
                            <input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search', 'wp_bootstrap_starter'); ?>" title="<?php esc_attr_e('Search', 'wp_bootstrap_starter'); ?>" />
                            <button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e('Search', 'wp_bootstrap_starter'); ?></button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div><!-- /.container -->

        <!-- Mobile Fullscreen Slide Menu -->
        <div id="mobile-navbar" class="mobile-slide-menu d-md-none">
            <div class="mobile-nav-inner">
                <button id="mobileMenuClose" aria-label="Close Menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container'      => '',
                    'menu_class'     => 'navbar-nav mobile-nav',
                    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'         => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </div>
    </nav>
</header>



	<main id="main" class="container-fluid p-0"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 100px;"'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>
		 
<a href="https://wa.me/971555056625" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>