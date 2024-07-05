<?php
/*
Template Name: News
*/
get_header();
?>
<div class="container">
    <article class="d-flex flex-column">
        <h2><?php the_title() ?></h2>

        <ul class="news__list col-md-12">

        <?php
            // Новый WP_Query
            $query = new WP_Query(array(
                'post_type' => 'post', // Кастомный тип записей
                'posts_per_page' => -1, // Выводим все отзывы
            ));
            if ($query->have_posts()) : ?>
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
        <a class='more' href="#">Показать еще</a>
    </article>
</div>
<?php
get_footer();
?>