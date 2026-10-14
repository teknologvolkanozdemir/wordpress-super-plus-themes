<?php get_header(); ?>

<div class="site-container site-body<?php echo is_active_sidebar('primary-sidebar') ? ' has-sidebar' : ''; ?>">
	<div class="content-column">
		<?php if (is_active_sidebar('before-content-widget-area')) : ?>
			<div class="before-content">
				<?php dynamic_sidebar('before-content-widget-area'); ?>
			</div>
		<?php endif; ?>

		<main id="primary" class="site-main" role="main">
			<?php if (is_archive()) : ?>
				<header class="page-header">
					<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
					<?php the_archive_description('<div class="archive-description">', '</div>'); ?>
				</header>
			<?php elseif (is_search()) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php printf(esc_html__('Search results for: %s', 'superplus'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
				</header>
			<?php endif; ?>

			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
						<header class="entry-header">
							<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
							<div class="entry-meta">
								<time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
							</div>
						</header>
						<?php if (has_post_thumbnail()) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php the_post_thumbnail('large'); ?></a>
							</div>
						<?php endif; ?>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</article>
				<?php endwhile; ?>
				<?php the_posts_pagination(array('screen_reader_text' => 'Sayfalama')); ?>
			<?php else : ?>
				<section class="no-results">
					<h1 class="page-title"><?php esc_html_e('Nothing found', 'superplus'); ?></h1>
					<p><?php esc_html_e('No content matched your request. Try searching instead.', 'superplus'); ?></p>
					<?php get_search_form(); ?>
				</section>
			<?php endif; ?>
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
