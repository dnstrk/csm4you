
<?php
/*
Template Name: Telegram Успешная запись
*/
get_header();
?>

<div class="tg-page_success">
    <div class="tg-container">
        <div class="tg-page_success-wrap">
            <img src="<?php echo get_template_directory_uri()?>/assets/img/record_success.png" alt="">
            <h3>Вы успешно записались!</h3>
            <span class="par14">Наш менеджер свяжется с вами для подтверждения записи</span>
            <div class="success-wrap__specialist">
                <img src="<?php echo get_template_directory_uri()?>/assets/img/pavlova.png" alt="">
                <p class="par14">Павлова З.Ш.</p>
                <p class="success-wrap__specialist_spec par12">Эндокринолог-андролог</p>
                <div class="success-wrap__specialist-timing">
                    <p class="success-wrap__specialist-timing_date">10.07.2024</p>
                    <p class="success-wrap__specialist-timing_time">10:00 - 11:00</p>
                </div>
            </div>
            <a class="success-wrap_btn btn-blue-def">Отлично!</a>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>