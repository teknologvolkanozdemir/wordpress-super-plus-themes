<?php get_header(); ?>

<div class="site-container site-body<?php echo is_active_sidebar('primary-sidebar') ? ' has-sidebar' : ''; ?>">
	<div class="content-column">
		<?php if (is_active_sidebar('before-content-widget-area')) : ?>
			<div class="before-content">
				<?php dynamic_sidebar('before-content-widget-area'); ?>
			</div>
		<?php endif; ?>

		<main id="primary" class="site-main" role="main">
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta">
							<time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
							<span class="byline"><?php the_author(); ?></span>
						</div>
					</header>
					<?php if (has_post_thumbnail()) : ?>
						<div class="post-thumbnail"><?php the_post_thumbnail('large'); ?></div>
					<?php endif; ?>
					<div class="entry-content">
						<?php
						the_content();
						wp_link_pages(
							array(
								'before' => '<nav class="page-links" aria-label="Sayfalar">',
								'after'  => '</nav>',
							)
						);
						?>
					</div>
					<footer class="entry-footer">
						<?php the_category(', '); ?>
						<?php the_tags('<p class="tags">', ', ', '</p>'); ?>
					</footer>
				</article>

				<?php the_post_navigation(array('screen_reader_text' => 'Yazı gezintisi')); ?>

				<?php if (comments_open() || get_comments_number()) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</main>

		<?php if (is_active_sidebar('after-content-widget-area')) : ?>
			<div class="after-content">
				<?php dynamic_sidebar('after-content-widget-area'); ?>
			</div>
		<?php endif; ?>
	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
