<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-template
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" >
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/site/css/module.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/site/css/common.css">

	<?php
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="l-header container">
		<div class="l-header_inner">
			<div class="l-header_logo"><a href="/"><i class="sprite01"></i></a></div>
			<div class="l-header_info">
				<div class="l-header_search">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="l-header_gnav container">
		<ul class="clearfix">
			<?php get_template_part('gnav'); ?>
		</ul>
	</div>
