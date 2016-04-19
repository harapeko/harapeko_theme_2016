<?php
  $category_data = get_the_category();
  $tag_data = get_the_tags();
?>

<article class="post_article <?php echo ( is_page() || ( !is_admin() && ($wp_query->current_post === 0) ) ) ? "post_hero": "post_entry";//frontページは1件目、2件目以降でclass分岐する ?>">
	<?php the_title( '<h2 class="post_ttl"><a href="' . ( ( is_single() || is_page() ) ? "javascript:void(0)": esc_url( get_permalink() ) ) . '" rel="bookmark">', '</a></h2>' ); ?>
	
	<figure class="post_figure">
		<a href="<?php echo ( is_single() || is_page() ) ? "javascript:void(0)": esc_url( get_permalink() ); ?>">
			<?php echo has_post_thumbnail() ? the_post_thumbnail( '', array('class' => 'post_img') ) : '<img class="post_img" src="https://placekitten.com/g/670/300">'; ?>
		</a>
	</figure>

	<div class="post_info">
		<div class="post_date"><?php the_time('Y/m/d(D)') ?></div>
		<?php if( !is_page() && $category_data[0] && $tag_data[0] ): ?>
		<ul class="post_li_genre">
			<?php if( $category_data[0] ): ?>
	  			<li class="post_category" rel="category"><a href="<?php echo get_category_link( $category_data[0]->term_id ); ?>"><i class="fa fa-map-signs"></i><?php echo $category_data[0]->name; ?></a></li>
	  		<?php endif; ?>
	  		<?php if( $tag_data[0] ): ?>
	  			<li class="post_tag" rel="tag"><a href="<?php echo get_tag_link( $tag_data[0]->term_id ); ?>"><i class="fa fa-tag"></i><?php echo $tag_data[0]->name; ?></a></li>
	  		<?php endif; ?>
		</ul>
		<?php endif; ?>
	</div>
	
	<?php if( is_page() || is_single() || ( !is_admin() && ($wp_query->current_post === 0) ) ): //固定ページ or シングル or 1件目なら本文表示する ?>
		<div class="<?php echo ( is_page() || is_single() ) ? "post_content": "post_beginning"; ?>">
			<?php the_content(false); ?>
		</div>
	<?php endif; ?>
</article><!-- /.post_article -->