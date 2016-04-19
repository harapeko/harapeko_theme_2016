<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wp-content/themes/harapeko_theme_2016/css/app.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body class="l_body">

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
			<li class="navbar_item_bycycle"><a href="/category/bycycle">
				<i class="fa fa-bicycle icon fa-3x"></i>
				<p class="title">自転車</p>
			</a></li>
			<li class="navbar_item_cat"><a href="/category/cat">
				<i class="fa fa-github-alt icon fa-3x"></i>
				<p class="title">ねこ</p>
			</a></li>
		</ul>
	</nav>
</header><!-- /.l_header -->
