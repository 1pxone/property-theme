<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
$container = get_theme_mod( 'understrap_container_type' );
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css?v=0.4" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/animate.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/css/flaticon.css" rel="stylesheet">
	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css"/>
	<!--  SCRIPTS-->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.query.js"></script>
	<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
	<script src="https://yastatic.net/share2/share.js" async="async"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="hfeed site" id="page">
	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">
		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content','understrap' ); ?></a>
		<nav class="navbar navbar-expand-md navbar-white bg-white">
				<button class="navbar-toggler" type="button" id="toggleMenu">
					<i class="ion-navicon h3"></i>
				</button>

				<!-- Your site title as branding in the menu -->
				<?php if ( ! has_custom_logo() ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

					<?php endif; ?>

				<?php } else { the_custom_logo(); } ?><!-- end custom logo -->
				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse d-none d-md-block',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>



				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdownMobile',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu-mobile',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>




					<ul class="navbar-nav my-2 my-lg-0" id="createBtn">
						<li class="nav-item active mr-2">
							<a tabindex="0" class="nav-link btn circled btn-secondary-outline fw-100 pb-0 px-0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-popover-content="#a1">
								<i class="ion-ios-telephone h4"></i>
							</a>
			      </li>

			      <li class="nav-item active">
			        <a class="nav-link btn circled btn-c-primary fw-100 px-3" href="/create">Разместить объявление <i class="ion-plus h6"></i></a>
			      </li>
	    		</ul>

					<div class="hidden d-none" id="a1">
					  <div class="popover-body pt-3">
							<p>Телефон: <a href="tel:+88009991122">+88009991122</a></p>
					    <p>Email: <a href="mailto:help@bestnest.ru">help@bestnest.ru</a></p>
					  </div>
					</div>
			</div>


		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
