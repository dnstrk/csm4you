<?php
/*
Template Name: Telegram О клинике
*/
get_header();
?>

<div class="tg-page_about">
    <div class="tg-container">
        <div class="tg-page_about-wrap">
            <!--сдайдер клиники-->
            <div class="ms-auto me-auto carousel-wrapper carousel-wrapper-tg">
                <ul class="carousel">
                    <li class="carusel__item carusel__item-tg left-pos" id="5">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/slide5.jpg"/>
                    </li>
                    <li class="carusel__item carusel__item-tg  main-pos" id="1">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/slide1.jpg"/>
                    </li>
                    <li class="carusel__item carusel__item-tg right-pos" id="2">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/slide2.jpg"/>
                    </li>
                    <li class="carusel__item carusel__item-tg back-pos" id="3">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/slide3.jpg"/>
                    </li>
                    <li class="carusel__item carusel__item-tg back-pos" id="4">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/slide4.jpg"/>
                    </li>
                </ul>
                <ul class="paginate-tg">
                    <li class="paginate__item-tg" data-id="5"></li>
                    <li class="paginate__item-tg active" data-id="1"></li>
                    <li class="paginate__item-tg" data-id="2"></li>
                    <li class="paginate__item-tg" data-id="3"></li>
                    <li class="paginate__item-tg" data-id="4"></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>