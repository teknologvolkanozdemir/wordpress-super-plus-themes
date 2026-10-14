<?php
if (!defined('ABSPATH')) {
	exit;
}

function superplus_setup()
{
	load_theme_textdomain('superplus', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'superplus'),
			'footer'  => __('Footer Menu', 'superplus'),
		)
	);
}
add_action('after_setup_theme', 'superplus_setup');

function superplus_content_width()
{
	$GLOBALS['content_width'] = 800;
}
add_action('after_setup_theme', 'superplus_content_width', 0);

function superplus_widgets_init()
{
	$areas = array(
		array('Header Top', 'header-top-widget-area', 'h2'),
		array('Header Right', 'header-right-widget-area', 'h2'),
		array('Before Content', 'before-content-widget-area', 'h2'),
		array('Primary Sidebar', 'primary-sidebar', 'h2'),
		array('After Content', 'after-content-widget-area', 'h2'),
		array('Footer 1', 'footer-1', 'h2'),
		array('Footer 2', 'footer-2', 'h2'),
		array('Footer 3', 'footer-3', 'h2'),
		array('Footer 4', 'footer-4', 'h2'),
		array('Footer Bottom', 'footer-bottom-widget-area', 'h2'),
	);

	foreach ($areas as $area) {
		register_sidebar(
			array(
				'name'          => $area[0],
				'id'            => $area[1],
				'description'   => sprintf(__('Widgets added here appear in the %s area.', 'superplus'), $area[0]),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<' . $area[2] . ' class="widget-title">',
				'after_title'   => '</' . $area[2] . '>',
			)
		);
	}
}
add_action('widgets_init', 'superplus_widgets_init');

function superplus_scripts()
{
	wp_enqueue_style('superplus-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'superplus_scripts');
