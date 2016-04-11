<?php get_header(); ?>

<div class="l_contents">
  <main class="l_main post_articles" role="main">
    <?php the_archive_title( '<h1 class="ttl_01">', '</h1>' ); ?>
    
    <?php if( !have_posts() ): // 投稿なし ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php else: // 投稿あり ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
      <?php endwhile; ?>
    <?php endif; ?>
    
    <?php the_posts_navigation(); ?>
  </main><!-- .l_main -->

  <?php get_sidebar(); ?>
</div><!-- /.l_contents -->

<?php get_footer(); ?>
