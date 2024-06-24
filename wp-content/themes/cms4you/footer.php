
</main>
<footer>

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
		<button class="bfmodal__close" data-hystclose="">Закрыть</button>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>