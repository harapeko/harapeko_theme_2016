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
      <div class="post_beginning">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum at possimus inventore adipisci nihil atque asperiores error? Necessitatibus, magnam, in</div>
      <div class="post_content">
        <?php get_template_part('template-parts/dummy_post_content'); ?>
      </div>
    </article>


  	<?php while ( have_posts() ) : the_post(); ?>
  
  		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
  
  		<?php the_post_navigation(); ?>
  
  		<?php if ( comments_open() || get_comments_number() ) : ?>
  			<?php comments_template(); ?>
  		<?php endif; ?>
  
  	<?php endwhile; ?>
  </main><!-- .l_main -->

  <?php get_sidebar(); ?>
</div><!-- /.l_contents -->

<?php get_footer(); ?>
