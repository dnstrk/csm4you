
<?php
/*
Template Name: Telegram Главная
*/
get_header();
?>

<div class="tg-page">
    <div class="tg-container">
        <div class="tg-page-wrap">
            <div class="user-data">
                <div class="user-data__card">
                    <img class="user-data__card_img" src="<?php echo get_template_directory_uri()?>/assets/img/lk_avatar.png" alt="avatar">
                    <div class="user-data__card_info">
                        <span class="card_infoName par12">Имя Фамилия</span>
                        <span class="card_infoNumber head5">+7 987 654 32 10</span>
                    </div>
                    <a href="/tg-profile">
                        <img class="user-data__card_edit" src="<?php echo get_template_directory_uri()?>/assets/img/Pencil.png" alt="">
                    </a>
                </div>
                <div class="user-data__record">
                    <div class="user-data__record_head">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/aboutCard2.png" alt="">
                        <div class="user-data__record_headInfo">
                            <h5 class="user-data__record_headInfo_title head5">Мои записи</h5>
                            <!-- <span class="user-data__record_headInfo_text par14">нет активных</span> -->
                            <span class="user-data__record_headInfo_text par14">У вас 2 активные записи</span>
                        </div>
                        <a class href="/tg-records">Все</a>
                    </div>
                    <a class="user-data__record_btn" href="#">Записаться</a>
                    <div class="splitter"></div>
                    <!-- список активных записей -->
                    <ul class="record__posts">
                        <!-- запись -->
                        <li class='record__post'>
                            <div class="record__post_timing">
                                <p class="record__post_timing-date">12.12.2024</p>
                                <p class="record__post_timing-time">09:00-10:00</p>
                            </div>
                            <div class="record__post_doctor">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/pavlova-min.png" alt="">
                                <p class="par14">Павлова З.Ш.</p>
                            </div>
                        </li>
                        <li class='record__post'>
                            <div class="record__post_timing">
                                <p class="record__post_timing-date">12.12.2024</p>
                                <p class="record__post_timing-time">09:00-10:00</p>
                            </div>
                            <div class="record__post_doctor">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/pavlova-min.png" alt="">
                                <p class="par14">Павлова З.Ш.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clinic-info">
                <a href="/tg-specialists" class="clinic-info__spec">
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/aboutCard3.png" alt="">
                    <h5>Специалисты</h5>
                    <div class="clinic-info__spec_doctorsImg">
                        <img class="doctorsImgAbs doctorsImg1" src="<?php echo get_template_directory_uri()?>/assets/img/pavlova-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg2" src="<?php echo get_template_directory_uri()?>/assets/img/terehova-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg3" src="<?php echo get_template_directory_uri()?>/assets/img/ryabseva-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg4" src="<?php echo get_template_directory_uri()?>/assets/img/dolgushin-min.png" alt="">
                        <img class="doctorsImgAbs doctorsImg5" src="<?php echo get_template_directory_uri()?>/assets/img/tishuk-min.png" alt="">
                    </div>
                </a>
                <div class="clinic-info__about">
                    <img src="<?php echo get_template_directory_uri()?>/assets/img/aboutCard4.png" alt="">
                    <h5>О клинике</h5>
                    <span class="par10">Описание направлений, прайс-лист</span>
                </div>
            </div>
            <div class="doctor-blog">
                <h5>Доктор знает</h5>
                <p class="par14">Блог доктора и ученого Павловой. Полезные советы, разоблачение мифов и многое другое</p>
                <div class="doctor-blog__social">
                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/OK_white.png" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/Telegram_white.png" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/img/VK_white.png" alt=""></a>
                </div>
            </div>
            
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>