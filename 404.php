<?php get_header(); ?>

<div class="l_contents">
	<main class="l_main" role="main">

		<section class="box_404_error">
			<h1 class="box_404_error_ttl">
				<span class="box_404_error_ttl_hoge">そんなページ</span>
				<span class="box_404_error_ttl_fuga">ありませんのニャ</span>
			</h1>
			<img src="http://lorempixel.com/680/296/cats/" width="100%" class="box_404_error_img">
		</section><!-- .error-404 -->
		
		<a href="/">▶トップページに戻る</a>
		
		<?php get_search_form(); ?>

	</main><!-- ./l_main-main -->
	
	<?php get_sidebar(); ?>
</div><!-- ./l_contents -->

<?php get_footer(); ?>
