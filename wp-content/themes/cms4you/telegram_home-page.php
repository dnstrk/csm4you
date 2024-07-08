
<?php
/*
Template Name: Telegram Medical
*/
get_header();
?>

<div class="tg-page">
    <div class="tg-container">
        <div class="tg-page-wrap">
            <div class="user-data">
                <div class="user-data__card">
                    <img class="user-data__card_img" src="<?php echo get_template_directory_uri()?>/assets/img/lk_avatar.png" alt="avatar">
                    <div class="user-data__card_info">
                        <span class="card_infoName par12">Имя Фамилия</span>
                        <span class="card_infoNumber head5">+7 987 654 32 10</span>
                    </div>
                    <a href="/tg-profile">
                        <img class="user-data__card_edit" src="<?php echo get_template_directory_uri()?>/assets/img/Pencil.png" alt="">
                    </a>
                </div>
                <div class="user-data__record">
                    <div class="user-data__record_head">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/aboutCard2.png" alt="">
                        <div class="user-data__record_headInfo">
                            <h5 class="user-data__record_headInfo_title head5">Мои записи</h5>
                            <span class="user-data__record_headInfo_text par14">нет активных</span>
                        </div>
                        <a class href="#">Все</a>
                    </div>
                    <a class="user-data__record_btn" href="#">Записаться</a>
                </div>
            </div>
            <div class="clinic-info">
                <div class="clinic-info__spec">
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/aboutCard3.png" alt="">
                    <h5>Специалисты</h5>
                    <div class="clinic-info__spec_doctorsImg">
                        <img class="doctorsImgAbs doctorsImg1" src="<?php echo get_template_directory_uri()?>/assets/img/pavlova-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg2" src="<?php echo get_template_directory_uri()?>/assets/img/terehova-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg3" src="<?php echo get_template_directory_uri()?>/assets/img/ryabseva-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg4" src="<?php echo get_template_directory_uri()?>/assets/img/dolgushin-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg5" src="<?php echo get_template_directory_uri()?>/assets/img/tishuk-min.png" alt="">
                    </div>
                </div>
                <div class="clinic-info__about">
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/aboutCard4.png" alt="">
                    <h5>О клинике</h5>
                    <span class="par10">Описание направлений, прайс-лист</span>
                </div>
            </div>
            <div class="doctor-blog">
                <h5>Доктор знает</h5>
                <p class="par14">Блог доктора и ученого Павловой. Полезные советы, разоблачение мифов и многое другое</p>
                <div class="doctor-blog__social">
                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/OK_white.png" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/Telegram_white.png" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/VK_white.png" alt=""></a>
                </div>
            </div>
            <div class="sectionNews">
                <div class="sectionNews__top">
                    <h3 class="sectionNews_title">Новости клиники</h3>
                    <div class="splide__arrows splide__arrows--news">
                        <button id ="arrow-news--prev-tg" class="splide__arrow splide__arrow--prev" type="button" aria-controls="banner-track" aria-label="Go to last slide">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"><path d="M7.5 3.75L13.75 10L7.5 16.25"></path></svg>
                        </button>
                        <button id="arrow-news--next-tg" class="splide__arrow splide__arrow--next" type="button" aria-controls="banner-track" aria-label="Next slide">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20"><path d="M7.5 3.75L13.75 10L7.5 16.25"></path></svg>
                        </button>
			        </div>
                </div>
                <div class="splide splide--news-tg" id="splide-tg-news">
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
					<li class="splide__slide">
					<!--карточка новости-->
						<a href="<?php the_permalink() ?>" class="card news-card-tg">
							<div class="news-card-tg__img">
								<?php the_post_thumbnail() ?>
							</div>
							<div class="news-card-tg__content">
								<div class="post-data"><?php echo $news_date ?></div>
								<h4><?php the_title() ?></h4>
								<p><?php echo wp_trim_words(esc_attr(get_the_excerpt()), 5, '...') ?></p>
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
                <a class="sectionNews__btn" href="/news">Все новости</a>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>