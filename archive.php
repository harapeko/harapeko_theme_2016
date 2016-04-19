<?php get_header(); ?>

<div class="l_contents">
  <main class="l_main" role="main">
    
    <?php if( !empty( get_query_var('category_name') ) ): //カテゴリの場合 ?>
      <?php the_archive_title( '<h1 class="ttl_category">', '</h1>' ); ?>
    <?php elseif( !empty( get_query_var('tag') ) ): //タグの場合 ?>
      <?php the_archive_title( '<h1 class="ttl_tag">', '</h1>' ); ?>
    <?php endif; ?>
    
    <?php if( !have_posts() ): // 投稿なし ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php else: // 投稿あり ?>
      <div class="post_articles">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
        <?php endwhile; ?>
      </div><!-- /.post_articles -->
    <?php endif; ?>
    
    <?php the_posts_pagination(); ?>
  </main><!-- .l_main -->

  <?php get_sidebar(); ?>
</div><!-- /.l_contents -->

<?php get_footer(); ?>
