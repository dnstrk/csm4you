<?php
/*
Template Name: Medical
*/
get_header();

//Footer data
$num_footer1 = get_theme_mod('num_footer1');
$num_footer2 = get_theme_mod('num_footer2');
$mail_footer = get_theme_mod('mail_footer');
$address_foot = get_theme_mod('address_foot');
$working_hours_clinic = get_theme_mod('working_hours_clinic');
$working_hours_lab = get_theme_mod('working_hours_lab');
$copyright = get_theme_mod('copyright');
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

//секция doctors
$doctors_h3 = get_post_meta( get_the_ID(), 'doctors_h3', true );

//секция Price-list
$priceList_h3 = get_post_meta( get_the_ID(), 'priceList_h3', true );

//Секция Online-register

//Секция Review
$review_h3 = get_post_meta( get_the_ID(), 'review_h3', true );


?>

<!--первая секция-->
<section class="top">
	<div class="h-lg-100 container">
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
			<div class="blobs">
				<img class="blob6" src="<?php echo get_template_directory_uri()?>/assets/img/blob6.png">
			</div>
            <div class="splide__track" id="banner-track">
				<?php 
				$query = new WP_Query(array(
					'post_type' => 'doctor', // Кастомный тип записей
					'posts_per_page' => -1, // Выводим все отзывы
				));
				if ($query->have_posts()) : ?>
                <ul class="splide__list" id="banner-list">
					<?php while ($query->have_posts()) : $query->the_post(); ?>
					<li class="splide__slide">
						<div class="card doctor-card">
							<div class="doctor-card__img">
								<?php the_post_thumbnail() ?>
							</div>
							<div class="doctor-card__content">
								<h4><?php the_title()  ?></h4>
								<p><?php the_excerpt(); ?></p>
							</div>
							<div class="doctor-card__footer">
								<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
								<a
								href="#doctor"
								data-bfmodal="#doctor"
								data-id="<?php echo the_ID(); ?>"
								class="link info modal_spec"
								data-title="<?php the_title(); ?>"
								data-content="<?php echo esc_attr(get_the_content()); ?>"
								data-image="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
								data-excerpt="<?php echo esc_attr(get_the_excerpt()); ?>"
								>О специалисте</a>
							</div>
						</div>
					</li>
					
					<?php endwhile; ?>
					<?php
						// Восстановить глобальные данные поста
						wp_reset_postdata();
					else : ?>
						<p><?php _e('No reviews found.', 'your-text-domain'); ?></p>
					<?php endif; ?>
					<!--конец цикла все li что ниже можно удалять-->
							
				</ul>
			</div>
		</div>
	</div>
</section>
<!--третья секция-->

<section id="price" class="price">
	<div class="container">
		<div class="row">
			<div class="col-md-8 card-price">
				<h2><?php echo $priceList_h3 ?></h2>
				<div class="price-table">
				<?php
				$category_slugs = array('priem-speczialista', 'uzi');
				foreach ($category_slugs as $category_slug) {
					// Получение объекта категории по слагу
					$category = get_term_by('slug', $category_slug, 'service_category');
					// Проверка, что категория существует
					if ($category) :
						// Параметры запроса
						$args = array(
							'post_type' => 'service', // Кастомный тип записей
							'tax_query' => array(
								array(
									'taxonomy' => 'service_category', // Таксономия
									'field'    => 'slug',
									'terms'    => $category_slug, // Слаг категории
								),
							),
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :?>
				<!--Тип поста услуги, заголовок - категория услуг, цикл запускаем с фильтром по категории в аргументах-->
					<h3><?php echo $category->name ?></h3>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="d-flex price-table__row">
						<p><?php the_title(); ?></p>
						<h4><?php the_content(); ?></h4>
						<a href="#post" data-bfmodal="#post" class="btn btn--defoult btn--rounded btn--primary">Записаться</a>
					</div>
					<?php endwhile; ?>
					<?php
						wp_reset_postdata();
       			 	else : ?>
						<p><?php _e('No services found in this category.', 'your-text-domain'); ?></p>
        			<?php endif;
   				else : ?>
        			<p><?php _e('Category not found.', 'your-text-domain'); ?></p>
 				<?php endif;}?>
				</div>
				<a href="#" class="arrow-right">Смотреть полный прайс-лист</a>
			</div>
			<div class="offset-lg-1 col-lg-3 col-md-4">
				<div class="hot-spot blue mb-5">
					<img src="<?php echo get_template_directory_uri()?>/assets/img/hotspotblue.png"/>
					<div class="hot-spot__content">
					<h3>Доктор знает</h3>
					<p>Блог доктора и ученого Павловой. Полезные советы, разоблачение мифов и многое другое</p>
					<ul class="sotials">
						<li><a href="#" class="ok" ></a></li>
						<li><a href="#" class="tg" ></a></li>
						<li><a href="#" class="wk" ></a></li>
					</ul>
					</div>
				</div>
				<div class="hot-spot green">
					<img src="<?php echo get_template_directory_uri()?>/assets/img/hotspotgreen.png"/>
					<div class="hot-spot__content">
						<h3>Запишитесь <a href="#" data-bfmodal="#post" >онлайн</a></h3>
						<p>Выберите услугу/врача, дату и свободное время.</p>
						<a href="#post" class="btn btn--big btn--rounded btn--primary" data-bfmodal="#post">Записаться</a>
						<p><small>Подавая заявку вы даёте <a href="#">согласие на обработку данных</a></small></p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
<section id="review" class="review">
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">
			<h2><?php echo $review_h3 ?></h2>
			<div class="splide__arrows">
				<button id ="arrow-reviews--prev" class="splide__arrow splide__arrow--prev" type="button" aria-controls="banner-track" aria-label="Go to last slide">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"><path d="M7.5 3.75L13.75 10L7.5 16.25"></path></svg>
				</button>
				<button id="arrow-reviews--next" class="splide__arrow splide__arrow--next" type="button" aria-controls="banner-track" aria-label="Next slide">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"><path d="M7.5 3.75L13.75 10L7.5 16.25"></path></svg>
				</button>
			</div>
		</div>
	</div>

	<div class="splide splide--reviews" id="splide-reviews">
		<div class="splide__track" id="banner-track">
			<ul class="splide__list" id="banner-list">
			<?php
			// Новый WP_Query
			$query = new WP_Query(array(
				'post_type' => 'review', // Кастомный тип записей
				'posts_per_page' => -1, // Выводим все отзывы
			));
			if ($query->have_posts()) : ?>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<!--слайд. Слайды это уже цикл-->
				<li class="splide__slide">
					<div class="card-review">
						<div class="post-data"><?php the_excerpt(); ?></div>
						<h4><?php the_title(); ?></h4>
						<div class="cardReview__content">
							<?php $content = get_the_content(); ?>
							<p class="cardReview__content cardReview__content_cut"><?php echo wp_trim_words($content, 20, '...'); ?></p>
							<p class="cardReview__content cardReview__content_full review__content_hidden"><?php echo $content ?></p>
							<a href="#">Развернуть</a>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
			<?php
				// Восстановить глобальные данные поста
				wp_reset_postdata();
			else : ?>
				<p><?php _e('No reviews found.', 'your-text-domain'); ?></p>
			<?php endif; ?>
			</ul>
		</div>
	</div>
</section>
<section id="news" class="news">
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">
			<h2>Новости клиники</h2>
			<div class="d-flex align-items-center justify-content-between">
			<div class="splide__arrows splide__arrows--news">
				<button id ="arrow-news--prev" class="splide__arrow splide__arrow--prev" type="button" aria-controls="banner-track" aria-label="Go to last slide">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"><path d="M7.5 3.75L13.75 10L7.5 16.25"></path></svg>
				</button>
				<button id="arrow-news--next" class="splide__arrow splide__arrow--next" type="button" aria-controls="banner-track" aria-label="Next slide">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"><path d="M7.5 3.75L13.75 10L7.5 16.25"></path></svg>
				</button>
			</div>
			<a href="#" class="btn btn--big btn--rounded btn--transparent" >Все новости</a>
			</div>
		</div>
		<div class="splide splide--news" id="splide-news">
            <div class="splide__track" id="banner-track">
				<?php
				// Новый WP_Query
				$query = new WP_Query(array(
					'post_type' => 'post', // Кастомный тип записей
					'posts_per_page' => -1, // Выводим все отзывы
				));
				if ($query->have_posts()) : ?>
                <ul class="splide__list" id="banner-list">
				<?php while ($query->have_posts()) : $query->the_post(); ?>
				<?php $news_date = get_post_meta(get_the_ID(), 'news_date', true); ?>
				<!--слайд. Слайды это уже цикл-->
					<li class="splide__slide">
					<!--карточка новости-->
						<a href="#" class="card news-card">
							<div class="news-card__img">
								<?php the_post_thumbnail() ?>
							</div>
							<div class="news-card__content">
								<div class="post-data"><?php echo $news_date ?></div>
								<h4><?php the_title() ?></h4>
								<p><?php echo esc_attr(get_the_excerpt()) ?></p>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
					<?php
						// Восстановить глобальные данные поста
						wp_reset_postdata();
					else : ?>
						<p><?php _e('No reviews found.', 'your-text-domain'); ?></p>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<section id="contacts" class="contacts">
	<div class="container">
		<div class="contacts-card">
		<h3>Контакты</h3>
		<div class="contacts-card__contacts">
			<a href="tel:<?php echo $num_footer1 ?>" class="phone"><?php echo $num_footer1 ?></a>
			<a href="tel:<?php echo $num_footer2 ?>" class="phone"><?php echo $num_footer2 ?></a>
			<a href="mailto:<?php echo $mail_footer ?>" class="email"><?php echo $mail_footer ?></a>
			<p class="adress"><?php echo $address_foot ?></a>
		</div>
		<div class="contacts-card__content">
			<h5>Время работы клиники</h5>
			<p><?php echo $working_hours_clinic ?></p>
		</div>
		<div class="contacts-card__content">
			<h5>Время работы лаборатории</h5>
			<p><?php echo $working_hours_lab ?></p>
		</div>
		<a href="#post" data-bfmodal="#post" class="btn btn--big btn--rounded btn--primary btn-shadow">Записаться</a>
	</div>
	<div class="map">
		<span class="xs-hidden"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0b06614e806b736acbc5e523f37c4b677c7eeb7396defa69a43605e5e5a93e00&amp;width=100%25&amp;height=539&amp;lang=ru_RU&amp;scroll=false"></script></span>
		<span class="xs-visiblity"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0b06614e806b736acbc5e523f37c4b677c7eeb7396defa69a43605e5e5a93e00&amp;width=100%25&amp;height=285&amp;lang=ru_RU&amp;scroll=true"></script></span>
	</div>

	</div>
</section>
<?php
get_footer();
?>
