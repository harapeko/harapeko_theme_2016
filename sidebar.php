<aside class="l_side" role="complementary">
    <?php if( is_active_sidebar( 'sidebar-1' ) ): ?>
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
    
    <?php if( is_active_sidebar( 'sidebar-2' ) ): ?>
    	<?php dynamic_sidebar( 'sidebar-2' ); ?>
    <?php endif; ?>
</aside>
