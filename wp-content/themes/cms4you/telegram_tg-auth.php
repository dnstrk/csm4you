
<?php
/*
Template Name: Telegram Authentication
*/
get_header();
?>

<div class="tg-page_register">
    <div class="tg-container">
        <div class="tg-page_register-wrap">
            <div class="register-wrap__info">
                <span class="head4">Войдите в личный кабинет, используя свой номер телефона</span>
            </div>
            <div class="register-wrap__action">
                <div class="register-wrap__action_phone">
                    <input type="tel" id="tg-auth-phone">
                    <label>Ваш номер телефона</label>
                </div>
                <button class="btn-blue-def" id="tg-btn-auth">Авторизоваться</button>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>