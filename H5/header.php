<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>


		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">

		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

		<meta name="description" content="<?php bloginfo('description'); ?>">



		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">

		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">

		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">



		<?php wp_enqueue_script('jquery'); ?>

		<?php wp_head(); ?>



		<script src="<?php bloginfo('template_directory'); ?>/javascript/h5.js"></script>



	</head>

	<body <?php body_class(); ?>>

		<div class="wrapper">