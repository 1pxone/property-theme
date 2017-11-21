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
	<link href="<?php echo get_template_directory_uri(); ?>/style.css?v=0.1" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/animate.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/ion.rangeSlider.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/css/flaticon.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
	<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css"/>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/ion.rangeSlider.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/dropzone.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/moment.js" type="text/javascript"></script>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-white bg-white">


			<!-- <div class="container"> -->


				<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> -->
				<button class="navbar-toggler" type="button" id="toggleMenu">
					<!-- <span class="navbar-toggler-icon"></span> -->
					<i class="ion-navicon h3"></i>

				</button>



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





				<!-- Your site title as branding in the menu -->
				<?php if ( ! has_custom_logo() ) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

					<?php endif; ?>

				<?php } else { the_custom_logo(); } ?><!-- end custom logo -->

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
			        <a class="nav-link btn circled btn-secondary-outline fw-100 pb-0 px-0 " href="/create"><i class="ion-ios-telephone h4"></i></a>
			      </li>
			      <li class="nav-item active">
			        <a class="nav-link btn btn-sm circled btn-more fw-100 px-3" href="/create">Разместить объявление <i class="ion-plus h6"></i></a>
			      </li>
	    		</ul>

			</div>


		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
<script>
$( window ).resize(function() {
  $('#navbarNavDropdownMobile').attr('style', 'display: none !important');
	if($("#toggleMenu i").hasClass("ion-android-close")){
		$("#toggleMenu i").toggleClass("ion-navicon")
		$("#toggleMenu i").toggleClass("ion-android-close")
	}
});
$('#navbarNavDropdownMobile').attr('style', 'display: none !important');
$('#toggleMenu').on('click', function(){
	$("#toggleMenu i").toggleClass("ion-navicon")
	$("#toggleMenu i").toggleClass("ion-android-close")
	$('#navbarNavDropdownMobile').slideToggle();
});
</script>
