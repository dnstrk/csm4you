
</main>
<?php 
$home = is_page_template('telegram_home-page.php');
$profile = is_page_template('telegram_tg-profile.php');
$auth = is_page_template('telegram_tg-auth.php');
$confirm = is_page_template('telegram_tg-confirm.php');
$specialists = is_page_template('telegram_specialists.php');
$specialist = is_page_template('telegram_specialist.php');
?>
<?php if(!is_page_template('telegram_tg-home-page.php')&&!is_page_template('telegram_tg-profile.php')&&!is_page_template('telegram_tg-auth.php')&&!is_page_template('telegram_tg-confirm.php')&&!is_page_template('telegram_tg-records.php')&&!is_page_template('telegram_tg-specialists.php')&&!is_page_template('telegram_tg-specialist.php')&&!is_singular('doctor')&&!is_page_template('telegram_tg-about.php')&&!is_page_template('telegram_tg-success.php')&&!is_page_template('telegram_tg-price-list.php')) { ?>
<footer>
	<div class="container">
		<div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
			<div class="footer__left-part">
				<div class="d-flex">
				 <a href="/" class="footer__logo">
					<img class="footer__img" src="<?php echo get_template_directory_uri()?>/assets/img/logo-fixed.svg">
				 </a>
				 <p>© 2018-2024. Клиника системной медицины.<br> Лицензия №ЛО-77-01-010748 от 11.08.2015 </p>
				 
				</div>
				<a href="/soglashenie-po-obrabotke-personalnyh-dannyh/">Соглашение по обработке персональных данных</a>
			</div>
			<div class="footer__right-part">
			<?php 
			wp_nav_menu( [
					'theme_location'  => 'main-menu',
					'menu'            => '',
					'container'       => 'ul',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'nav nav-ul main-nav__list',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="footer-menu d-flex align-items-center">%3$s </ul>',
					'depth'           => 0,
				] );
			?>
				<!-- <ul class="footer-menu d-flex align-items-center">
							<li><a class="" href="#">О клинике</a></li>
							<li><a class="" href="#">Врачи</a></li>
							<li><a class="" href="#">Прайс-лист</a></li>
							<li><a class="" href="#">Отзывы</a></li>
							<li><a class="" href="#">Новости</a></li>
							<li><a class="" href="#">Контакты</a></li>
				</ul> -->
			</div>
		
		</div>
	</div>
</footer>
<?php } ?>
<div class="bfmodal" id="post" aria-hidden="true">
	<div class="bfmodal__wrap">
		<div class="bfmodal__window bfmodal__window--post" role="dialog" aria-modal="true">
		<div class="bfmodal__header">
			<div>
				<h2>Онлайн запись</h2>
				<p>Выберите дату или врача</p>
			</div>
			<button class="bfmodal__close" data-hystclose="">Закрыть</button>
		</div>
		<div class="bfmodal__content">
		<div class="bfmodal-cards-wrapper">
		<form class="online-form">
			<div class="row">
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
                        <div id="order-modal" class="order">

						</div>
						<input type="hidden" id="orderInputModal"/>
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
								<input type="tel" placeholder="Номер телефона" id="online-form-phone-modal"/>
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
				
		</div>
		</div>
		</div>
	</div>
</div>
<div class="bfmodal" id="lk" aria-hidden="true">
	<div class="bfmodal__wrap">
		<div class="bfmodal__window " role="dialog" aria-modal="true">
		<div class="bfmodal__header">
		<div class="w-100 d-flex">
			<h3>Вход в личный кабинет</h3>
			<button class="bfmodal__close" data-hystclose="">Закрыть</button>
		</div>
		</div>
		<div class="bfmodal__content bfmodal__content--alt">
			<h4>Введите свой номер телефона</h4>
				<form id="loginForm" class="lg" action="wp-content/themes/cms4you/configure/login.php" target="ifr">
					<div class="input-wrapper">
						<input type="tel" id="register_phone" name="register_phone" required>
						<span>Номер телефона</span>
					</div>
					<div class="checkbox-wrapper">
						<input type="checkbox" class="checkbox noempty-input" name="ch1" id="ch1">
						<label for="ch1">Даю&nbsp;   <a href="/soglashenie-po-obrabotke-personalnyh-dannyh/">согласие на обработку данных</a></label>
					</div>
					<input type="submit" name="sendsms" class="w-100 btn btn--defoult btn--primary btn--rounded" value="Далее" disabled>
					<div id="verifycation" class="verifycation">
						<input type="text" name="code" size="6">
						<input type="submit" name="ok" class="w-100 btn btn--defoult btn--primary btn--rounded" value="Далее">
						<span id="_out"></span>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="bfmodal" id="doctor" aria-hidden="true">
	<div class="bfmodal__wrap">
		<div class="bfmodal__window" role="dialog" aria-modal="true">
			<div class="bfmodal__header">
				<div class="d-flex">
					<div class="card-mobile__img card-mobile__img--big">
						<img id="modalImage" src="" alt="Doctor Image"/>
					</div>
					<div class="pt-3">
						<h3 id="modalTitle"></h3>
						<span id="modalExcerpt" class="card-mobile__position">Эндокринолог-андролог, научный руководитель клиники, врач, дмн</span>
					</div>
				</div>
				<button class="bfmodal__close" data-hystclose="">Закрыть</button>
			</div>
			<div id="modalContent" class="bfmodal__content bfmodal__content--alt">
				
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>