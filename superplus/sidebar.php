<?php
if (!is_active_sidebar('primary-sidebar')) {
	return;
}
?>
<aside id="secondary" class="widget-area primary-sidebar" role="complementary" aria-label="Kenar Çubuğu">
	<?php dynamic_sidebar('primary-sidebar'); ?>
</aside>
