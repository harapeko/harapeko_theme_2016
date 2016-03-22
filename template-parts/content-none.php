<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">404 Nothing Found</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>投稿がありません</p>
		<?php elseif ( is_search() ) : ?>
			<p>検索条件に合う投稿がありませんでした。他のキーワードで検索を試してください。</p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p>お探しのページは見つかりませんでした。検索をお試しください。</p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
