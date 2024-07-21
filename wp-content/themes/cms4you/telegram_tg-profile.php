
<?php
/*
Template Name: Telegram Профиль
*/
get_header();
?>

<div class="tg-page_profile">
    <div class="tg-container">
        <div class="tg-page_profile-wrap">
            <img src="<?php echo get_template_directory_uri()?>/assets/img/lk_avatar-big.png" alt="">
            <div class="profile-wrap__action_input">
                <div class="profile-wrap__action_input_phone">
                    <input type="text" id="tg-profile-phone" placeholder="+71234567890">
                    <label>Номер телефона</label>
                </div>
                <div class="profile-wrap__action_input_name">
                    <input type="text" id="tg-profile-name">
                    <label>Имя</label>
                </div>
                <div class="profile-wrap__action_input_surname">
                    <input type="text" id="tg-profile-surname">
                    <label>Фамилия</label>
                </div>
            </div>
            <div class="profile-wrap__action_btn">
                <button class="btn-blue-def" id="tg-btn-save">Сохранить</button>
                <a href="/tg-main"><button id="tg-btn-discard">Отмена</button></a>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>