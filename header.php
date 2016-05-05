<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="@harapeko_wktk">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/wp-content/themes/harapeko_theme_2016/css/app.css">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" href="/favicon.ico">
<?php wp_head(); ?>
</head>

<body class="l_body">
<?php if( is_active_sidebar( 'ga' ) ): ?>
	<?php dynamic_sidebar( 'ga' ); ?>
<?php endif; ?>

<header class="l_header" role="banner">
	<nav class="l_navbar" role="navigation">
		<ul class="navbar">
			<li class="navbar_item_home">
				<?php if ( is_front_page() && is_home() ): ?>
					<h1><a href="/" role="home">
						<i class="fa fa-home icon fa-3x"></i>
						<p class="navbar_item_site_title">はらぺこ屋</p>
					</a></h1>
				<?php else: ?>
					<a href="/" role="home">
						<i class="fa fa-home icon fa-3x"></i>
						<p class="navbar_item_site_title">はらぺこ屋</p>
					</a>
				<?php endif; ?>
			</li>
			<li class="navbar_item_bycycle"><a href="/category/自転車">
				<i class="fa fa-bicycle icon fa-3x"></i>
				<p class="title">自転車</p>
			</a></li>
			<li class="navbar_item_cat"><a href="/category/ねこ">
				<i class="fa fa-github-alt icon fa-3x"></i>
				<p class="title">ねこ</p>
			</a></li>
		</ul>
	</nav>
</header><!-- /.l_header -->
