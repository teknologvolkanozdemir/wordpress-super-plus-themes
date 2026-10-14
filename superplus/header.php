<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary">İçeriğe Atla</a>

<?php if (is_active_sidebar('header-top-widget-area')) : ?>
	<div class="header-top">
		<div class="site-container">
			<?php dynamic_sidebar('header-top-widget-area'); ?>
		</div>
	</div>
<?php endif; ?>

<header id="masthead" class="site-header" role="banner">
	<div class="site-container site-header-inner">
		<div class="site-branding">
			<?php if (is_front_page() && is_home()) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
			<?php endif; ?>
			<?php if (get_bloginfo('description', 'display')) : ?>
				<p class="site-description"><?php bloginfo('description'); ?></p>
			<?php endif; ?>
		</div>
		<?php if (is_active_sidebar('header-right-widget-area')) : ?>
			<div class="header-right">
				<?php dynamic_sidebar('header-right-widget-area'); ?>
			</div>
		<?php endif; ?>
	</div>
</header>

<?php if (has_nav_menu('primary')) : ?>
	<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Ana Menü">
		<div class="site-container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'depth'          => 2,
				)
			);
			?>
		</div>
	</nav>
<?php endif; ?>
