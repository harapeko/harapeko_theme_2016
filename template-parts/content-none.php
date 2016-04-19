<section class="no-results not-found">
	<section class="box_404_error">
		<h1 class="box_404_error_ttl">
			<span class="box_404_error_ttl_hoge">検索結果は</span>
			<span class="box_404_error_ttl_fuga">ありませんのニャ</span>
		</h1>
		<img src="https://placekitten.com/g/670/300" width="100%" class="box_404_error_img">
	</section><!-- .error-404 -->
	
	<a href="/">▶トップページに戻る</a>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>投稿がありません</p>
		<?php elseif ( is_search() ) : ?>
			<p>検索条件に合う投稿がありませんでした。<br>他のキーワードで検索を試してください。</p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p>お探しのページは見つかりませんでした。<br>検索をお試しください。</p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
