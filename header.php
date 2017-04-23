<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yummy_Gummy_Opening
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background-image:url(http://i.imgur.com/UKQJ3xV.png); background-attachment:fixed" >

<div id="page" class="site">

	<?php if ( is_front_page()) : ?>
	<div style="position: relative;" class="header-container">
		<figure class="header-image">
			<img src="http://svgshare.com/i/1J2.svg" alt="">
		</figure>
		<div style="position: absolute;">
			<?php echo file_get_contents("./wp-content/themes/candyland/images/logosvg.svg"); ?>
		</div>
	</div>
	<?php endif; // End header image check. ?>

		<header class="main_h">
			<div class="row">
	        <a class="logo" href="#">P/F</a>

	        <div class="mobile-toggle">
	            <span></span>
	            <span></span>
	            <span></span>
	        </div>

	        <nav class="sticky-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav>

	    </div> <!-- / row -->
	</header>


	<div id="content" class="site-content">
