<!DOCTYPE HTML>
<html <?php language_attributes(); ?> <?php if(is_404()){echo 'class="page-404"';} ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
	<!-- <script>
		// Функция для проверки устройства
		function isMobileDevice() {
		return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent);
		}

		// Функция для предотвращения перехода
		function preventDesktopAccess() {
		if (/tg-auth|tg-main/.test(document.location.href) && !isMobileDevice()) {
			document.body.innerHTML = '<h5>Access denied.</h5>';
			window.stop();
		}
		}

		// Выполнить проверку при загрузке страницы
		document.addEventListener('DOMContentLoaded', preventDesktopAccess);
	</script> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>
<?php 
$num_wa = get_theme_mod('num_wa');
$num_mobile = get_theme_mod('num_mobile');
$mail = get_theme_mod('mail');
$address_head = get_theme_mod('address_head');



// Переменные для определения шаблона и скрытия хедера если шаблоны ТГ
$home = is_page_template('telegram_home-page.php');
$profile = is_page_template('telegram_tg-profile.php');
$auth = is_page_template('telegram_tg-auth.php');
$confirm = is_page_template('telegram_tg-confirm.php');
$specialists = is_page_template('telegram_tg-specialists.php');
$specialist = is_page_template('telegram_tg-specialist.php');
$specialist = is_page_template('telegram_tg-specialist.php');
?>

<body class="<?php if(is_front_page()){echo "home-page";} ?>">
<?php if(!is_page_template('telegram_tg-home-page.php')&&!is_page_template('telegram_tg-profile.php')&&!is_page_template('telegram_tg-auth.php')&&!is_page_template('telegram_tg-confirm.php')&&!is_page_template('telegram_tg-records.php')&&!is_page_template('telegram_tg-specialists.php')&&!is_page_template('telegram_tg-specialist.php')&&!is_singular('doctor')&&!is_page_template('telegram_tg-about.php')&&!is_page_template('telegram_tg-success.php')&&!is_page_template('telegram_tg-price-list.php')) { ?>
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
				<nav  id="header-nav">
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
							'items_wrap'      => '<ul id="%1$s" class="header-menu d-md-flex flex-column flex-md-row align-items-center">%3$s </ul>',
							'depth'           => 0,
						] );
					?>
					<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
					<a href="#lk" data-bfmodal="#lk" class="btn circle--btn  user"></a>
				</nav>
			</div>
		</div>
	</div>
</header>
<?php } ?>
<main class="<?php if(is_page_template('telegram_tg-home-page.php')||is_page_template('telegram_tg-profile.php')||is_page_template('telegram_tg-auth.php')||is_page_template('telegram_tg-confirm.php')||is_page_template('telegram_tg-records.php')||is_page_template('telegram_tg-specialists.php')||is_page_template('telegram_tg-specialist.php')||is_singular('doctor')||is_page_template('telegram_tg-about.php')||is_page_template('telegram_tg-success.php')||is_page_template('telegram_tg-price-list.php')) {echo "main-tg";} ?>">
