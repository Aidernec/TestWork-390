<!DOCTYPE html>
<html>

<head>
	<title><?php echo get_bloginfo( 'name' ); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>

</head>

<body>

	<div class="preloader d-none">
		<div class="lds-ring">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>

	<header class="header mb-5">
		<div class="container">
			<div class="header__inner">
				<a href="<?php echo home_url(); ?>" class="header__logo">wp_shop</a>
				<nav class="header__menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header_menu',
							'menu_class'     => 'header__menu__list',
							'container'      => 'ul',
							'walker'         => new My_menu(),
						)
					);
					?>
				</nav>
			</div>
		</div>
	</header>
