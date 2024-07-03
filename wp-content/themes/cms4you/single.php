<?php
/*
Template Name: Single
*/
get_header();
?>
<div class="container">
	<article>
		<div class="row stkey-parent">
			<div class=" col-xl-8 col-md-9">
				<h2><?php the_title() ?></h2>
				<?php if( has_post_thumbnail() ) { ?>
						<?php $image_id = get_post_thumbnail_id(); ?>
						<?php $image_attributes = wp_get_attachment_image_src( $image_id, 'full');  ?>
						<img class="post-img" src="<?php echo $image_attributes[0]; ?>" width="100%">
				<?php }?>
				<?php the_content() ?>
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
		<h3>Другие новости</h3>
		<div class="row">
			<div class="col-md-4">
				<!--карточка новости-->
				<a href="#" class="card news-card">
					<div class="news-card__img">
						<img src="<?php echo get_template_directory_uri()?>/assets/img/new1.png"/>
					</div>
					<div class="news-card__content">
						<div class="post-data">09.06.2024</div>
						<h4>График работы клиники в праздники</h4>
						<p>Уважаемые клиенты, клиника начала работать в праздничном режиме! Ознакомьтесь...</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" class="card news-card">
					<div class="news-card__img">
						<img src="<?php echo get_template_directory_uri()?>/assets/img/new2.png"/>
					</div>
					<div class="news-card__content">
						<div class="post-data">09.06.2024</div>
						<h4>Инновационная диагностика «ImmunoHealth»</h4>
						<p>Метод «ImmunoHealth» определяет вашу индивидуальную пищевую непереносимость по биологическим маркерам, находящимся...</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" class="card news-card">
					<div class="news-card__img">
						<img src="<?php echo get_template_directory_uri()?>/assets/img/new3.png"/>
					</div>
					<div class="news-card__content">
						<div class="post-data">09.06.2024</div>
						<h4>Клиника на карантине</h4>
						<p>Уважаемые клиенты, клиника начала работать в праздничном режиме! Ознакомьтесь...</p>
					</div>
				</a>
			</div>
	</div>
</div>
<?php
get_footer();
?>