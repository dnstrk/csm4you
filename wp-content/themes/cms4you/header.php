<!DOCTYPE HTML>
<html <?php language_attributes(); ?> <?php if(is_404()){echo 'class="page-404"';} ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body class="<?php if(is_front_page()){echo "home-page";} ?>">
	<header id="header" class="header">
		
		<div class="header__top-block">
			<div class="container">
				<div class="d-flex flex-column flex-md-row justify-content-end">
					<ul class="top-menu d-flex flex-column flex-md-row align-items-center">
						<li><a class="whatsup" href="#">8 (926) 077-58-16</a></li>
						<li><a class="phone" href="#">8 (499) 705-96-97</a></li>
						<li><a class="email" href="mailto:clinic@csm4you.ru">clinic@csm4you.ru</a></li>
						<li><a class="adress" href="#">Москва, 2-я Фрунзенская, д. 2/36, м. Фрунзенская</a></li>
					<ul>
				</div>
			</div>
		</div>
		<div class="header__bottom-block">
			
			<div class="container">
			
				<div class="d-flex  w100 flex-row justify-content-between justify-content-md-end header__bottom-block-content">
				<div id="hamburger" class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
					<a href="/" class="logo">
						<img class="header__img" src="<?php echo get_template_directory_uri()?>/assets/img/logo.svg">
						<img class="header__img--fixed" src="<?php echo get_template_directory_uri()?>/assets/img/logo-fixed.svg">
					</a>
					<nav id="header-nav">
						<ul class="header-menu d-md-flex flex-column flex-md-row align-items-center">
							<li><a class="" href="#">О клинике</a></li>
							<li><a class="" href="#">Врачи</a></li>
							<li><a class="" href="#">Прайс-лист</a></li>
							<li><a class="" href="#">Отзывы</a></li>
							<li><a class="" href="#">Новости</a></li>
							<li><a class="" href="#">Контакты</a></li>
						</ul>
						<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
						<a href="#lk" data-bfmodal="#lk" class="btn circle--btn  user"></a>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<main>
