
</main>
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
				<ul class="footer-menu d-flex align-items-center">
							<li><a class="" href="#">О клинике</a></li>
							<li><a class="" href="#">Врачи</a></li>
							<li><a class="" href="#">Прайс-лист</a></li>
							<li><a class="" href="#">Отзывы</a></li>
							<li><a class="" href="#">Новости</a></li>
							<li><a class="" href="#">Контакты</a></li>
				</ul>
			</div>
		
		</div>
	</div>
</footer>
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
			<ul class="bfmodal-cards-list">
				<li class="bfmodal-cards-list__item">
					<!--карточка врача-->
					<div class="card-mobile active selected">
						<div class="card-mobile__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/pavlova.png"/>
						</div>
						<div class="card-mobile__content">
							<p class="card-mobile__title">Павлова З.Ш.</p>
							<span class="card-mobile__position">Эндокринолог-андролог</span>
						</div>
					</div>
				</li>
				<li class="bfmodal-cards-list__item">
					<!--карточка врача-->
					<div class="card-mobile active">
						<div class="card-mobile__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/terehova.png"/>
						</div>
						<div class="card-mobile__content">
							<p class="card-mobile__title">Терехова А.Л..</p>
							<span class="card-mobile__position">Эндокринолог</span>
						</div>
					</div>
				</li>
				<li class="bfmodal-cards-list__item">
					<!--карточка врача-->
					<div class="card-mobile">
						<div class="card-mobile__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/ryabseva.png"/>
						</div>
						<div class="card-mobile__content">
							<p class="card-mobile__title">Рябцева О.Ю.</p>
							<span class="card-mobile__position">Эндокринолог</span>
						</div>
					</div>
				</li>
				<li class="bfmodal-cards-list__item">
					<!--карточка врача-->
					<div class="card-mobile">
						<div class="card-mobile__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/dolgushin.png"/>
						</div>
						<div class="card-mobile__content">
							<p class="card-mobile__title">Долгушин Г.О.</p>
							<span class="card-mobile__position">Эндокринолог</span>
						</div>
					</div>
				</li>
				<li class="bfmodal-cards-list__item">
					<!--карточка врача-->
					<div class="card-mobile active">
						<div class="card-mobile__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/tishuk.png"/>
						</div>
						<div class="card-mobile__content">
							<p class="card-mobile__title">Тишук А.В.</p>
							<span class="card-mobile__position">Врач УЗИ</span>
						</div>
					</div>
				</li>
				<li class="bfmodal-cards-list__item">
					<!--карточка врача-->
					<div class="card-mobile">
						<div class="card-mobile__img">
							<img src="<?php echo get_template_directory_uri()?>/assets/img/gorbunov.png"/>
						</div>
						<div class="card-mobile__content">
							<p class="card-mobile__title">Горбунов Р.М.</p>
							<span class="card-mobile__position">Врач УЗИ</span>
						</div>
					</div>
				</li>
			</ul>
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