<?php
/*
Template Name: Medical
*/
get_header();

//секция top
$banner_h1 = get_post_meta( get_the_ID(), 'banner_h1', true );
$banner_p = get_post_meta( get_the_ID(), 'banner_p', true );

//секция about
$banner_cards = get_post_meta( get_the_ID(), 'banner_cards', true );


//секция about-content
$aboutContent_h3 = get_post_meta( get_the_ID(), 'aboutContent_h3', true );
$aboutContent_p1 = get_post_meta( get_the_ID(), 'aboutContent_p1', true );
$aboutContent_p2 = get_post_meta( get_the_ID(), 'aboutContent_p2', true );
$aboutContent_file = get_post_meta( get_the_ID(), 'aboutContent_file', true );

//секция about-content
$doctors_h3 = get_post_meta( get_the_ID(), 'doctors_h3', true );

?>

<!--первая секция-->
<section class="top">
	<div class="h-100 container">
	<img class="top_bg" src="<?php echo get_template_directory_uri()?>/assets/img/top_bg.png"/>
	<div class="blobs">
		<img class="blob1" src="<?php echo get_template_directory_uri()?>/assets/img/blob1.png"/>
		<img class="blob2" src="<?php echo get_template_directory_uri()?>/assets/img/blob2.png"/>
		<img class="blob3" src="<?php echo get_template_directory_uri()?>/assets/img/blob3.png"/>
		<img class="blob4" src="<?php echo get_template_directory_uri()?>/assets/img/blob4.png"/>
		<img class="blob5" src="<?php echo get_template_directory_uri()?>/assets/img/blob5.png"/>
	</div>
	<div class="row h-100">
			<div class="h-100 col-md-7 d-flex flex-column justify-content-center">
				<h1><?php echo $banner_h1 ?></h1>
				<p class="subtitle"><?php echo $banner_p ?></p>
			</div>
			<div class="offset-lg-1 col-md-4">
				<div class="top-card">
					<div class="top-card__header">
						<div class="top-card__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/pavlova.png"/>
						</div>
						<div class="top-card__title">
							<p>Павлова З.Ш.</p>
							<span>Эндокринолог-андролог</span>
						</div>
					</div>
					<div class="top-card__content">
						<p>Мы устраняем не диагнозы-следствия, а приводим в порядок весь организм путем излечения причины плохого самочувствия, что делает практику эффективной.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--вторая секция-->
<section id="about" class="about">
	<div class="container">
		<div class="row">
			<!--Здесь у тебя цикл с карточками-->
			<?php if($banner_cards){?>
				<?php foreach ( (array) $banner_cards as $key => $card ) { ?>
					<div class="col-md-4">
						<div class="about-card">
							<div class="about-card__header">
								<div class="about-card__img">
									<img src="<?php echo $card['banner_card_img'] ?>"/>
									
								</div>
								<div class="about-card__title">
									<h4><?php echo $card['banner_card_h5'] ?></h4>
								</div>
							</div>
							<div class="about-card__content">
								<p><?php echo $card['banner_card_p'] ?></p>
							</div>
						</div>
					</div>
				<?php }?>
			<?php } ?>
		</div>
		<div class="about-content">
			<div class="row">
				<div class="col-md-6 ">
					<h2><?php echo $aboutContent_h3 ?></h2>
					<p><?php echo $aboutContent_p1 ?>
					</p>
					<p><?php echo $aboutContent_p2 ?>
					</p>
					<a href="#" class="btn btn--light pdf">Лицензия №ЛО-77-01-010748 от 11.08.2015</a>
				</div>
				<div class="col-md-6 ">
					<!--сдайдер клиники-->
					<div class="ms-auto me-auto carousel-wrapper">
						 <ul class="carousel">
							<li class="carusel__item left-pos" id="5">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/slide5.jpg"/>
							</li>
							<li class="carusel__item  main-pos" id="1">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/slide1.jpg"/>
							</li>
							<li class="carusel__item right-pos" id="2">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/slide2.jpg"/>
							</li>
							<li class="carusel__item back-pos" id="3">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/slide3.jpg"/>
							</li>
							<li class="carusel__item back-pos" id="4">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/slide4.jpg"/>
							</li>
							
						 </ul>
						<ul class="paginate">
							<li class="paginate__item" data-id="5"></li>
							<li class="paginate__item active" data-id="1"></li>
							<li class="paginate__item" data-id="2"></li>
							<li class="paginate__item" data-id="3"></li>
							<li class="paginate__item" data-id="4"></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--третья секция-->
<section id="doctors" class="doctors">
<img class="bg1" src="<?php echo get_template_directory_uri()?>/assets/img/bg1.jpg"/>
	<div class="container">
	<h2><?php echo $doctors_h3 ?></h2>
		<div class="splide splide--doctors" id="splide-doctors">
            <div class="splide__track" id="banner-track">
                <ul class="splide__list" id="banner-list">
				<!--слайд. Слайды это уже цикл-->
					<li class="splide__slide">
					<!--карточка врача-->
						<div class="card doctor-card">
							<div class="doctor-card__img">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/pavlova-big.png"/>
							</div>
							<div class="doctor-card__content">
								<h4>Павлова Зухра Шариповна</h4>
								<p>Эндокринолог-андролог, научный руководитель клиники, врач, дмн</p>
							</div>
							<div class="doctor-card__footer">
								<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
								<a href="#doctor" data-bfmodal="#doctor" class="link info">О специалисте</a>
							</div>
						</div>
					</li>
					<!--конец цикла все li что ниже можно удалять-->
					<li class="splide__slide">
						<!--карточка врача-->
							<div class="card doctor-card">
								<div class="doctor-card__img">
									<img src="<?php echo get_template_directory_uri()?>/assets/img/terehova-big.png"/>
								</div>
								<div class="doctor-card__content">
									<h4>Терехова Анна Леонтьевна</h4>
									<p>Врач-эндокринолог, врач превентивной и Anti-Age медицины, кмн</p>
								</div>
								<div class="doctor-card__footer">
									<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
									<a href="#doctor" data-bfmodal="#doctor" class="link info">О специалисте</a>
								</div>
							</div>
					</li>
					<li class="splide__slide">
						<!--карточка врача-->
						<div class="card doctor-card">
							<div class="doctor-card__img">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/ryabseva-big.png"/>
							</div>
							<div class="doctor-card__content">
								<h4>Рябцева Ольга Юрьевна</h4>
								<p>Эндокринолог, врач, кмн</p>
							</div>
							<div class="doctor-card__footer">
								<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
								<a href="#doctor" data-bfmodal="#doctor" class="link info">О специалисте</a>
							</div>
						</div>
					</li>
					<li class="splide__slide">
						<!--карточка врача-->
						<div class="card doctor-card">
							<div class="doctor-card__img">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/dolgushin-big.png"/>
							</div>
							<div class="doctor-card__content">
								<h4>Долгушин Григорий Олегович</h4>
								<p>Эндокринолог, врач</p>
							</div>
							<div class="doctor-card__footer">
								<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
								<a href="#doctor" data-bfmodal="#doctor" class="link info">О специалисте</a>
							</div>
						</div>
					</li>
					<li class="splide__slide">
					<!--карточка врача-->
					<div class="card doctor-card">
							<div class="doctor-card__img">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/tishuk-big.png"/>
							</div>
							<div class="doctor-card__content">
								<h4>Тишук Анастасия Васильевна</h4>
								<p>Врач УЗИ</p>
							</div>
							<div class="doctor-card__footer">
								<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
								<a href="#doctor" data-bfmodal="#doctor" class="link info">О специалисте</a>
							</div>
						</div>
					</li>
					<li class="splide__slide">
					<!--карточка врача-->
					<div class="card doctor-card">
							<div class="doctor-card__img">
								<img src="<?php echo get_template_directory_uri()?>/assets/img/gorbunov-big.png"/>
							</div>
							<div class="doctor-card__content">
								<h4>Горбунов Роман Михайлович</h4>
								<p>Врач УЗИ</p>
							</div>
							<div class="doctor-card__footer">
								<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
								<a href="#doctor" data-bfmodal="#doctor" class="link info">О специалисте</a>
							</div>
						</div>
					</li>					
				</ul>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>