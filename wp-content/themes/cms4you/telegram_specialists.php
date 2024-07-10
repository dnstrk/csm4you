
<?php
/*
Template Name: Telegram Специалисты
*/
get_header();
?>

<div class="tg-page_specialists">
    <div class="tg-container">
        <div class="tg-page_specialists-wrap">
           <h4>Наши специалисты</h4>
           <?php 
            $query = new WP_Query(array(
                'post_type' => 'doctor', // Кастомный тип записей
                'posts_per_page' => -1, // Выводим все отзывы
            ));
            if ($query->have_posts()) : ?>
            <ul class="specialists-wrap__list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="specialists-wrap__list-item">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                    <div class="specialists-wrap__list-item__info">
                        <h5><?php the_title() ?></h5>
                        <p class="par14"><?php echo esc_attr(get_the_excerpt()) ?></p>
                    </div>
                    <a href="#">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 4.5L16.5 12L9 19.5" stroke="#098DEE" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

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
</main>
<?php
get_footer();
?>