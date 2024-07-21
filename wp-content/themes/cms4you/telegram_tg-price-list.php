<?php
/*
Template Name: Telegram Прайс-лист
*/
get_header();
?>

<div class="tg-page_price">
    <div class="tg-container">
        <div class="tg-page_price-wrap">
        <article>
		<div class="row stkey-parent">
				<h2><?php echo get_post_meta( get_the_ID(), 'tg-price-list-title', true ); ?></h2>

                <div class="col-xl-8 col-md-8 card-price">
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
                    </div>
                    <div class="offset-xl-1 col-md-3 sticky">
                        
                    </div>
                    </div>
                </article>
                <div class="bottom-block">
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>