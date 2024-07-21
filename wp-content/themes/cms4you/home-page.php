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
	<div class="row h-lg-100">
			<div class="offset-lg-1 order-lg-2 offset-lg-1 col-md-6 offset-md-6 col-lg-4">
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
			<div class="h-lg-100 col-lg-7 d-flex order-lg-1 flex-column justify-content-center">
				<h1><?php echo $banner_h1 ?></h1>
				<p class="subtitle"><?php echo $banner_p ?></p>
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
								<img class="about-card__img" src="<?php echo $card['banner_card_img'] ?>"/>
								<h4 class="about-card__title"><?php echo $card['banner_card_h5'] ?></h4>
							</div>
							<p class="about-card__content"><?php echo $card['banner_card_p'] ?></p>
						</div>
					</div>
				<?php }?>
			<?php } ?>
		</div>
		<div class="about-content">
			<div class="row">
				<div class="col-md-6 ">
					<h2><?php echo $aboutContent_h3 ?></h2>
					<a href="/tg-auth">tg</a>
					<p><?php echo $aboutContent_p1 ?></p>
					<p><?php echo $aboutContent_p2 ?></p>
					<a target="_blank" href="<?php echo $aboutContent_file ?>" class="btn btn--light pdf">Лицензия №ЛО-77-01-010748 от 11.08.2015</a>
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
					'posts_per_page' => -1, 
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
				<a href="/price-list" class="arrow-right">Смотреть полный прайс-лист</a>
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
<div class="home-bg">
<section id="home-form" class="home-form">
	<div class="container">
		<form class="online-form">
			<div class="row">
				<div class="col-12">
					<h2>Онлайн запись</h2>
					<p>Выберите дату или врача</p>
				</div>
				<div class="col-12">
				<ul class="page-cards-list scrollMouse">
						
						<?php
						$query = new WP_Query(array(
							'post_type' => 'doctor', 
							'posts_per_page' => -1, 
						));
						?>
						<?php while ($query->have_posts()) : $query->the_post(); 
						$fio = get_post_meta( get_the_ID(), 'fio', true );
						$position = get_post_meta( get_the_ID(), 'position', true );
						$photo_mini = get_post_meta( get_the_ID(), 'photo_mini', true );
						$schedule = get_post_meta(get_the_ID(), '_doctor_schedule_time_slots', true);
						?>
					
						<li class="bfmodal-cards-list__item active" 
							<?php if ($schedule && is_array($schedule)) : ?>
								<?php foreach ($schedule as $date => $slots) : ?>
									data-date-<?php echo esc_attr($date); ?>="true" 
									<?php foreach ($slots as $slot) : ?>
										data-slot-<?php echo esc_attr($slot); ?>="true"
									<?php endforeach; ?>
								<?php endforeach; ?>
								data-alltime="<?php foreach ($schedule as $date => $slots) : ?><?php foreach ($slots as $slot) : ?><?php echo esc_attr($date); ?>-<?php echo esc_attr($slot); ?>,<?php endforeach; ?><?php endforeach; ?>"
							<?php endif; ?>>
							<!--карточка врача-->
							<div class="card-mobile card-mobile--big">
								<div class="card-mobile__img">
									<img src="<?php  echo $photo_mini ?>"/>
								</div>
								<div class="card-mobile__content">
									<p class="card-mobile__title"><?php echo $fio; ?></p>
									<input type="hidden" name="doctor-name" value="<?php echo $fio; ?>"/>
									<span class="card-mobile__position"><?php echo $position; ?></span>
									<div class="data-dates">
										<?php if ($schedule && is_array($schedule)) : ?>
											<?php foreach ($schedule as $date => $slots) : ?>
												<?php foreach ($slots as $slot) : ?>
													<span class="data-date"><?php echo esc_html($date); ?></span>
												<?php endforeach; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</li>
					
						<?php endwhile; ?>
						<div class='message message--purple'>Мы не нашли расписание для докторов на этот день.</div>
					</ul>
				</div>
			</div>
			<div class="row gx-md-5">
				<div class="col-md-6 p-md-5">
                     <div class="calendar__wrapper">
                        <div id="order" class="order">

						</div>
						<input type="hidden" id="orderInput"/>
					 </div>
				</div>
				<div class="col-md-6 p-md-5">
					<div class="form-title__wrapper">
						<h3>Выберите время</h3>
					</div>
					<ul class="select-time">
						<li class="active">
							<div class="select-time__item" data-date="" data-time="08:00">
								<span>08:00 - 09:00</span>
								<input type="radio" name="time" id="time1" value="08:00"/>
							</div>
						</li>
						<li class="active">
							<div class="select-time__item" data-date="" data-time="10:00">
								<span>10:00 - 11:00</span>
								<input type="radio" name="time" id="time1" value="10:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="11:00">
								<span>11:00 - 12:00</span>
								<input type="radio" name="time" id="time1" value="11:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="12:00">
								<span>12:00 - 13:00</span>
								<input type="radio" name="time" id="time1" value="12:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="13:00">
								<span>13:00 - 14:00</span>
								<input type="radio" name="time" id="time1" value="13:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="14:00 ">
								<span>14:00 - 15:00</span>
								<input type="radio" name="time" id="time1" value="14:00"/>
							</div>
						</li>
						<li class="active">
							<div class="select-time__item" data-date="" data-time="15:00">
								<span>15:00 - 16:00</span>
								<input type="radio" name="time" id="time1" value="15:00 - 16:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="16:00">
								<span>16:00 - 17:00</span>
								<input type="radio" name="time" id="time1" value="16:00 - 17:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="17:00">
								<span>17:00 - 18:00</span>
								<input type="radio" name="time" id="time1" value="17:00 - 18:00"/>
							</div>
						</li>
						<li class="active">
							<div class="select-time__item" data-date="" data-time="18:00">
								<span>18:00 - 19:00</span>
								<input type="radio" name="time" id="time1" value="15:00 - 16:00"/>
							</div>
						</li>
						<li>
							<div class="select-time__item" data-date="" data-time="19:00">
								<span>19:00 - 20:00</span>
								<input type="radio" name="time" id="time1" value="19:00 - 20:00"/>
							</div>
						</li>
					</ul>
					<div class="form-content__wrapper">
						<h3>Ваши данные:</h3>
						<div class="row">
							<div class="col-sm-6 p-3">
								<input type="tel" placeholder="Номер телефона" id="online-form-phone"/>
							</div>
							<div class="col-sm-6 p-3">
								<input type="text" placeholder="Ваше имя"/>
							</div>
							<div class="col-12 p-3">
								<textarea placeholder="Опишите вашу проблему"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		<form>
	</form>

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
							<p class="cardReview__content cardReview__content_full review__content_hidden"><?php echo esc_attr($content) ?></p>
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
</div>
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
						<a href="<?php the_permalink() ?>" class="card news-card">
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
		<!--<span class="xs-hidden"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0b06614e806b736acbc5e523f37c4b677c7eeb7396defa69a43605e5e5a93e00&amp;width=100%25&amp;height=539&amp;lang=ru_RU&amp;scroll=false"></script></span>
		<span class="xs-visiblity"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0b06614e806b736acbc5e523f37c4b677c7eeb7396defa69a43605e5e5a93e00&amp;width=100%25&amp;height=285&amp;lang=ru_RU&amp;scroll=true"></script></span>
					--></div>

	</div>
</section>
<?php
get_footer();
?>
