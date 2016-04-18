<?php get_header(); ?>

<div class="l_contents">
	<main class="l_main post_articles" role="main">

	<?php if ( have_posts() ) : ?>

		<h1 class="ttl_01">『<?php echo get_search_query(); ?>』で検索しました</h1>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>

	</main><!-- ./l_main-main -->
	
	<?php get_sidebar(); ?>
</div><!-- ./l_contents -->

<?php get_footer(); ?>
