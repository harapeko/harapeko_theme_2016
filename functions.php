<?php

if ( ! function_exists( 'harapeko_2016__setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function harapeko_2016__setup() {
	// wp_head()が生成する不要なタグを削除する
	// 絵文字使わない
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	// ブログ投稿ツール使わない
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// バージョン出さない
	remove_action('wp_head', 'wp_generator');
	// admin bar 出さない
	add_filter( 'show_admin_bar', '__return_false' );
	// w.api 出さない
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Harapeko_2016_, use a find and replace
	 * to change 'harapeko_2016_' to the name of your theme in all the template files.
	 */
	// load_theme_textdomain( 'harapeko_2016_', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	// アイキャッチ画像 使用可能 670x300
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	// register_nav_menus( array(
	// 	'primary' => esc_html__( 'Primary', 'harapeko_2016_' ),
	// ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	// add_theme_support( 'html5', array(
	// 	'search-form',
	// 	'comment-form',
	// 	'comment-list',
	// 	'gallery',
	// 	'caption',
	// ) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'harapeko_2016__custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif;
add_action( 'after_setup_theme', 'harapeko_2016__setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function harapeko_2016__content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'harapeko_2016__content_width', 640 );
// }
// add_action( 'after_setup_theme', 'harapeko_2016__content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function harapeko_2016__widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar1', 'harapeko_2016_' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar2', 'harapeko_2016_' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'GA', 'harapeko_2016_' ),
		'id'            => 'ga',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'harapeko_2016__widgets_init' );

// add_action( 'widgets_init', 'my_remove_recent_comments_style' );
// function my_remove_recent_comments_style() {
// 	global $wp_widget_factory;
// 	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
// }

/**
 * Enqueue scripts and styles.
 */
// function harapeko_2016__scripts() {
// 	wp_enqueue_style( 'harapeko_2016_-style', get_stylesheet_uri() );

// 	wp_enqueue_script( 'harapeko_2016_-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

// 	wp_enqueue_script( 'harapeko_2016_-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'harapeko_2016__scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';

// アイキャッチ画像のwidth、heightを削除
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function meks_disable_srcset( $html ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );


// 最近の投稿
function recent_posts() {
}


// 記事用JSON-LD
add_action('wp_footer','insert_json_ld_article');
function insert_json_ld_article (){
    if (have_posts()) : while (have_posts()) : the_post();

        // 設定
        $permalink      = get_the_permalink();
        $headline       = get_the_title();
        $datePublished  = get_the_date('c');
        $dateModified   = get_the_modified_time('c');

        $category_info  = get_the_category();
        $articleSection = $category_info[0]->name;

        $description = get_the_excerpt();

        // サムネイル
        $thumbnail_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
        $imageurl = $image[0];
        // サムネイルが取れなかった場合に、文中の最初の写真をセット
        if(!$imageurl){
            $imageurl = catch_that_image();
        }
        // 文中の最初の画像も取れなかった場合に、ダミー画像をセット
        if(!$imageurl){
            $imageurl = 'https://placekitten.com/g/700/300';
        }

        // 画像の大きさを取得する
        $imginfo = getimagesize($imageurl);
        $imagewidth = $imginfo[0];
        $imageheight = $imginfo[1];

        $json= "
        \"@context\" : \"http://schema.org\",
        \"@type\" : \"BlogPosting\",
        \"mainEntityOfPage\" : {
            \"@type\" : \"WebPage\",
            \"url\" : \"{$permalink}\"
        },
        \"headline\" : \"{$headline}\",
        \"author\" : {
            \"@type\" : \"Person\",
            \"name\" : \"@harapeko_wktk\"
        },
        \"datePublished\" : \"{$datePublished}\",
        \"dateModified\" : \"{$dateModified}\",
        \"image\" : {
            \"@type\" : \"imageObject\",
            \"url\" : \"{$imageurl}\",
            \"width\" : {$imagewidth},
            \"height\" : {$imageheight}
        },
        \"articleSection\" : \"{$articleSection}\",
        \"publisher\" : {
            \"@type\" : \"Organization\",
            \"name\" : \"はらぺこ屋\",
            \"logo\" : {
                \"@type\" : \"imageObject\",
                \"url\" : \"http://harapeko.wktk.so/wp-content/uploads/2016/04/publisher_logo.jpg\",
                \"width\" : 600,
                \"height\" : 60
            }
        },
        \"description\": \"{$description}\"
        ";

        echo '<script type="application/ld+json">{'.$json.'}</script>';
    endwhile; endif;
    rewind_posts();
}

/**
 * 文中の最初の画像を返却する
 */
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    if($output){
        $first_img = $matches[1][0];
    }else{
        $first_img = false;
    }

    return $first_img;
}