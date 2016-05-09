<?php get_header(); ?>

<div class="l_contents">
	<main class="l_main" role="main">

		<section class="box_404_error">
			<h1 class="box_404_error_ttl">
				<span class="box_404_error_ttl_hoge">そんなページ</span>
				<span class="box_404_error_ttl_fuga">ありませんのニャ</span>
			</h1>
			<img src="https://placekitten.com/g/670/300" width="100%" class="box_404_error_img">
		</section><!-- .error-404 -->
		
		<a href="/">▶トップページに戻る</a>
		
		<?php get_template_part( 'template-parts/btn-share' ); ?>

	</main><!-- ./l_main-main -->
	
	<?php get_sidebar(); ?>
</div><!-- ./l_contents -->

<?php get_footer(); ?>
