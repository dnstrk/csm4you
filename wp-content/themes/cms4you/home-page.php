<?php
/*
Template Name: Medical
*/
get_header();
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
				<h1>Клиника Системной Медицины</h1>
				<p class="subtitle">Уникальная клиника в Москве, подходящая к организму человека, как к целостной живой системе</p>
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
			<div class="col-md-4">
				<div class="about-card">
					<div class="about-card__header">
						<div class="about-card__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/icon1.svg"/>
						</div>
						<div class="about-card__title">
							<h4>Системный подход</h4>
						</div>
					</div>
					<div class="about-card__content">
						<p>Глубокое, фундаментальное знание основ медицины и такой системный подход позволяют выявить и воздействовать на скрытые нарушения в организме, которые и являются истинной причиной всех симптомов и жалоб пациента.</p>
					</div>
				</div>
			</div>
			<!--Здесь у тебя конец цикла, две нижние карточки удаляем-->
			<div class="col-md-4">
				<div class="about-card">
					<div class="about-card__header">
						<div class="about-card__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/icon2.svg"/>
						</div>
						<div class="about-card__title">
							<h4>Комплексное решение</h4>
						</div>
					</div>
					<div class="about-card__content">
						<p>Ключевым принципом нашей концепции является комплексное решение медицинских проблем пациента и индивидуальный подход к каждому человеку. Для наших пациентов мы создали максимально удобный и комфортный механизм получения медицинской помощи в короткие сроки в одном месте.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="about-card">
					<div class="about-card__header">
						<div class="about-card__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/icon3.svg"/>
						</div>
						<div class="about-card__title">
							<h4>Квалифицированные врачи</h4>
						</div>
					</div>
					<div class="about-card__content">
						<p>В нашей Клинике работают высококвалифицированные врачи, ведущие специалисты своих областей, кандидаты и доктора наук, у каждого из которых за плечами имеется успешный многолетний опыт медицинской практики.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="about-content">
			<div class="row">
				<div class="col-md-6 ">
					<h2>О нашей клинике</h2>
					<p>Уникальное медицинское учреждение в Москве, которое подходит к организму человека как к целостной живой системе. <br>Здесь работают высококвалифицированные врачи, кандидаты и доктора наук, имеющие многолетний опыт медицинской практики.
					</p>
					<p>Клиника предлагает комплексное решение медицинских проблем пациента и индивидуальный подход к каждому человеку. Врачи выявляют и воздействуют на скрытые нарушения в организме, являющиеся истинной причиной всех симптомов и жалоб пациента. В клинике используются глубокое знание основ медицины и системный подход для устранения причин плохого самочувствия и приведения организма в порядок.
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
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> 814b84c416a90dbe1dffe7dce2a96ab1072ceda3

<!--третья секция-->
<section id="doctors" class="doctors">
<img class="bg1" src="<?php echo get_template_directory_uri()?>/assets/img/bg1.jpg"/>
	<div class="container">
	<h2>Врачи клиники</h2>
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