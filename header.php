<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/wp-content/themes/harapeko_2016/css/app.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body class="l_body">

<header class="l_header" role="banner">
	<nav class="l_navbar" role="navigation">
		<ul class="navbar">
			<li class="navbar_item_bycycle"><a href="/category/bycycle">
				<i class="fa fa-bicycle icon is-large"></i>
				<p class="title">自転車</p>
			</a></li>
			<li class="navbar_item_cat"><a href="/category/cat">
				<i class="fa fa-github-alt icon is-large"></i>
				<p class="title">ねこ</p>
			</a></li>
			<li class="navbar_item_home">
				<?php if ( is_front_page() && is_home() ): ?>
					<h1><a href="/" role="home">
						<p class="navbar_item_site_title">はらぺこ屋</p>
						<p class="navbar_item_site_desc">猫と自転車の足跡</p>
					</a></h1>
				<?php else: ?>
					<a href="/" role="home">
						<p class="site_title">はらぺこ屋</p>
						<p class="site_desc">猫と自転車の足跡</p>
					</a>
				<?php endif; ?>
			</li>
			<li class="navbar_item_game"><a href="/category/game">
				<i class="fa fa-gamepad icon is-large"></i>
				<p class="title">ゲーム</p>
			</a></li>
			<li class="navbar_item_programming"><a href="/category/programming">
				<i class="fa fa-code icon is-large"></i>
				<p class="title">プログラミング</p>
			</a></li>
		</ul>
	</nav>
</header><!-- /.l_header -->
