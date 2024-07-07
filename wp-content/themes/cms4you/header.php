<!DOCTYPE HTML>
<html <?php language_attributes(); ?> <?php if(is_404()){echo 'class="page-404"';} ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<?php 
$num_wa = get_theme_mod('num_wa');
$num_mobile = get_theme_mod('num_mobile');
$mail = get_theme_mod('mail');
$address_head = get_theme_mod('address_head');
?>

<body class="<?php if(is_front_page()){echo "home-page";} ?>">
<?php if(!is_page('91')) { ?>
<header id="header" class="header">
	<div class="header__top-block">
		<div class="container">
			<div class="d-flex flex-column flex-md-row justify-content-end">
				<ul class="top-menu d-flex flex-column flex-md-row align-items-center">
					<li><a class="whatsup" href="#"><?php echo $num_wa ?></a></li>
					<li><a class="phone" href="#"><?php echo $num_mobile ?></a></li>
					<li><a class="email" href="mailto:<?php echo $mail ?>"><?php echo $mail ?></a></li>
					<li><a class="adress" href="#"><?php echo $address_head ?></a></li>
				<ul>
			</div>
		</div>
	</div>
	<div class="header__bottom-block">
		<div class="container">
			<div class="d-flex flex-column w100 flex-md-row justify-content-end header__bottom-block-content">
				<a href="/" class="logo">
					<img class="header__img" src="<?php echo get_template_directory_uri()?>/assets/img/logo.svg">
					<img class="header__img--fixed" src="<?php echo get_template_directory_uri()?>/assets/img/logo-fixed.svg">
				</a>
				<nav>
					<?php 
					wp_nav_menu( [
							'theme_location'  => 'main-menu',
							'menu'            => '',
							'container'       => 'ul',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav nav-ul main-nav__list',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="header-menu d-flex flex-column flex-md-row align-items-center">%3$s </ul>',
							'depth'           => 0,
						] );
					?>
					<!-- <ul class="header-menu d-flex flex-column flex-md-row align-items-center">
						<li><a class="" href="#">О клинике</a></li>
						<li><a class="" href="#">Врачи</a></li>
						<li><a class="" href="#">Прайс-лист</a></li>
						<li><a class="" href="#">Отзывы</a></li>
						<li><a class="" href="#">Новости</a></li>
						<li><a class="" href="#">Контакты</a></li>
					</ul> -->
					<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
					<a href="#lk" data-bfmodal="#lk" class="btn circle--btn  user"></a>
				</nav>
			</div>
		</div>
	</div>
</header>
<?php } ?>
	<main>