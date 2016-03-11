<?php get_header(); ?>

<div class="l_contents">
  <main class="l_main post_articles" role="main">

    <article class="post_article post_hero">
      <h1 class="post_ttl"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis quis illum molestias ipsum tempore dolorum!</a></h1>
      <figure class="post_figure"><a href="#"><img class="post_img" src="https://placekitten.com/680/296"></a></figure>
      <div class="post_info">
        <div class="post_date">2016/2/26(金)</div>
        <ul class="post_li_genre">
          <li class="post_category" rel="category"><a href="#"><i class="fa fa-map-signs"></i>ねこ</a></li>
          <li class="post_tag" rel="tag"><a href="#"><i class="fa fa-tag"></i>おもちゃ</a></li>
        </ul>
      </div>
      <div class="post_beginning">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum at possimus inventore adipisci nihil atque asperiores error? Necessitatibus, magnam, in</a></div>
    </article>
    
    <?php for($i = 0; $i < 9 ; $i++): ?>
    <article class="post_article post_entry">
      <h2 class="post_ttl"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis quis illum molestias ipsum tempore dolorum!</a></h2>
      <figure class="post_figure"><a href="#"><img class="post_img" src="https://placekitten.com/680/296"></a></figure>
      <div class="post_info">
        <div class="post_date">2016/2/26(金)</div>
        <ul class="post_li_genre">
          <li class="post_category" rel="category"><a href="#"><i class="fa fa-map-signs"></i>ねこ</a></li>
          <li class="post_tag" rel="tag"><a href="#"><i class="fa fa-tag"></i>おもちゃ</a></li>
        </ul>
      </div>
    </article>
    <?php endfor; ?>
    

    <div>
    <?php if( !have_posts() ): //見出し 投稿なし ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php else: //見出し 投稿あり ?>
    	<?php if( is_home() && ! is_front_page() ): ?>
    		<header>
    			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    		</header>
    	<?php endif; ?>

    	<?php while ( have_posts() ) : the_post(); ?>
        <?php echo has_post_thumbnail() ? the_post_thumbnail('thumbnail') : '<img src="https://placekitten.com/g/150/150">'; ?>
    		<?php/*
    		 * Include the Post-Format-specific template for the content.
    		 * If you want to override this in a child theme, then include a file
    		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    		 */
    		?>
    		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
    	<?php endwhile; ?>
    
    	<?php the_posts_navigation(); ?>
    <?php endif; ?>
    </div>

  </main>
  
  <aside class="l_side" role="complementary">
  	asideあとで↓に入替え
  	<img src="http://placehold.jp/24/cc9999/993333/250x250.png?text=Ad_area">
  	<?php dynamic_sidebar( 'sidebar-1' ); ?>
  	<?php get_sidebar(); ?>
  </aside>
</div><!-- /.l_contents -->


<?php get_footer(); ?>
