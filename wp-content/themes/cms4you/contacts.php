<?php
/*
Template Name: Contacts
*/
get_header();

$num_footer1 = get_theme_mod('num_footer1');
$num_footer2 = get_theme_mod('num_footer2');
$mail_footer = get_theme_mod('mail_footer');
$address_foot = get_theme_mod('address_foot');
$working_hours_clinic = get_theme_mod('working_hours_clinic');
$working_hours_lab = get_theme_mod('working_hours_lab');
?>
<div id="contacts" class="contacts">
	<div class="container">
        <article>
            <div class="row stkey-parent">
                <h2><?php the_title() ?></h2>
                <div class=" col-xl-8 col-md-9">
                    <div class="contacts-card__contacts">
                    <div class='d-flex'>
                        <a href="tel:<?php echo $num_footer1 ?>" class="phone"><?php echo $num_footer1 ?></a>
                        <a href="tel:<?php echo $num_footer2 ?>" class="phone"><?php echo $num_footer2 ?></a>
                        <a href="mailto:<?php echo $mail_footer ?>" class="email"><?php echo $mail_footer ?></a>
                    </div>
                    <p class="adress"><?php echo $address_foot ?></a>
                    </div>
                    <div class="contacts-card__content">
                        <h5>Время работы клиники</h5>
                        <p class="contacts-card__content_page"><?php echo $working_hours_clinic ?></p>
                    </div>
                    <div class="contacts-card__content">
                        <h5>Время работы лаборатории</h5>
                        <p class="contacts-card__content_page"><?php echo $working_hours_lab ?></p>
                    </div>
                </div>
                <div class="offset-xl-1 col-md-3 sticky">
                    <aside>
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
    </div>
    <div class="">
		<span class="xs-hidden"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0b06614e806b736acbc5e523f37c4b677c7eeb7396defa69a43605e5e5a93e00&amp;width=100%25&amp;height=539&amp;lang=ru_RU&amp;scroll=false"></script></span>
		<span class="xs-visiblity"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0b06614e806b736acbc5e523f37c4b677c7eeb7396defa69a43605e5e5a93e00&amp;width=100%25&amp;height=285&amp;lang=ru_RU&amp;scroll=true"></script></span>
	</div>
</div>
<?php get_footer(); ?>