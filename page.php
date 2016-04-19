<?php get_header(); ?>

<div class="l_contents">
	<main class="l_main post_articles" role="main">
		<div class="post_articles">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div><!-- /.post_articles -->
	</main><!-- ./l_main-main -->
	
	<?php get_sidebar(); ?>
</div><!-- ./l_contents -->

<?php get_footer(); ?>