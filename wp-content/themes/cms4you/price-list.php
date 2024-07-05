<?php
/*
Template Name: Price-list
*/
get_header();
?>
<div class="container">
	<article>
		<div class="row stkey-parent">
				<h2><?php the_title() ?></h2>

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
				<aside>
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
				</aside>
			</div>
		</div>
	</article>
	<div class="bottom-block">
	</div>
</div>
<?php get_footer(); ?>