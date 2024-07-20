
<?php
/*
Template Name: Telegram Специалисты
*/
get_header();
?>

<div class="tg-page_specialists">
    <div class="tg-container">
        <div class="tg-page_specialists-wrap">
            <div class="specialists-wrap_head">
                <h4>Наши специалисты</h4>
                <svg onclick="redirect()" width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.610352 10.0068C0.615885 9.81315 0.654622 9.63607 0.726562 9.47559C0.798503 9.3151 0.90918 9.16016 1.05859 9.01074L9.37598 0.958984C9.61393 0.721029 9.90723 0.602051 10.2559 0.602051C10.4883 0.602051 10.6986 0.657389 10.8867 0.768066C11.0804 0.878743 11.2326 1.02816 11.3433 1.21631C11.4595 1.40446 11.5176 1.61475 11.5176 1.84717C11.5176 2.19027 11.3875 2.49186 11.1274 2.75195L3.60693 9.99854L11.1274 17.2534C11.3875 17.519 11.5176 17.8206 11.5176 18.1582C11.5176 18.3962 11.4595 18.6092 11.3433 18.7974C11.2326 18.9855 11.0804 19.1349 10.8867 19.2456C10.6986 19.3618 10.4883 19.4199 10.2559 19.4199C9.90723 19.4199 9.61393 19.2982 9.37598 19.0547L1.05859 11.0029C0.903646 10.8535 0.790202 10.6986 0.718262 10.5381C0.646322 10.3721 0.610352 10.195 0.610352 10.0068Z" fill="#007AFF"/>
                </svg>
            </div>
           
           
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
                    <a href="<?php the_permalink() ?>" data-tg="true" class="specialists-wrap__list-item__link">
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
<script>
    function redirect() {
        document.location.href='http://csm4you/tg-main/'
        }
</script>
</main>
<?php
get_footer();
?>