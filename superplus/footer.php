<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
	$superplus_footer_areas = array('footer-1', 'footer-2', 'footer-3', 'footer-4');
	$superplus_has_footer_widgets = false;
	foreach ($superplus_footer_areas as $superplus_area) {
		if (is_active_sidebar($superplus_area)) {
			$superplus_has_footer_widgets = true;
			break;
		}
	}
	?>
	<?php if ($superplus_has_footer_widgets) : ?>
		<div class="site-container footer-widgets">
			<?php foreach ($superplus_footer_areas as $superplus_area) : ?>
				<?php if (is_active_sidebar($superplus_area)) : ?>
					<div class="footer-column <?php echo esc_attr($superplus_area); ?>">
						<?php dynamic_sidebar($superplus_area); ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if (has_nav_menu('footer')) : ?>
		<nav class="footer-navigation" role="navigation" aria-label="Alt Menü">
			<div class="site-container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'depth'          => 1,
					)
				);
				?>
			</div>
		</nav>
	<?php endif; ?>

	<?php if (is_active_sidebar('footer-bottom-widget-area')) : ?>
		<div class="footer-bottom">
			<div class="site-container">
				<?php dynamic_sidebar('footer-bottom-widget-area'); ?>
			</div>
		</div>
	<?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
