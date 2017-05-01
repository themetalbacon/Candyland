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
	<div style="position: relative;">
		<figure class="header-image">
			<img src="http://svgshare.com/i/1J2.svg" alt="">
		</figure>
			<?php echo file_get_contents("./wp-content/themes/candyland/images/logosvg.svg"); ?>
	</div>
	<?php endif; // End header image check. ?>

	<nav id="ygsnav" class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
				<a href="/" id="it-text" class="navbar-brand">
					YG Scans</a>
	  </div>
	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php
			wp_nav_menu( array
			(
			'menu_class' => 'nav navbar-nav navbar-right',
			'theme_location' => 'primary',
			'menu_id' => 'primary-menu' ) );
			?>
	  </div>
	</nav>


	<div id="content" class="site-content animated fadeIn">
