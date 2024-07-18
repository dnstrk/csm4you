
<?php
/*
Template Name: Telegram Подтверждение
*/
get_header();
?>

<div class="tg-page_confirm">
    <div class="tg-container">
        <div class="tg-page_confirm-wrap">
            <div class="confirm-wrap__frame">
                <h3>Подтверждение записи</h3>
                <p class="par14">Мы отправили код подтверждения на телефон <span>+798765443210</span></p>
                <div class="confirm-wrap__frame__SMSArea">
                    <form id="form">
                        <div class="form__group form__pincode">
                            <input class="pincode-input" type="tel" name="pincode-1" maxlength="1" pattern="[\d]*" tabindex="1" placeholder="·" autocomplete="off">
                            <input disabled class="pincode-input" type="tel" name="pincode-2" maxlength="1" pattern="[\d]*" tabindex="2" placeholder="·" autocomplete="off">
                            <input disabled class="pincode-input" type="tel" name="pincode-3" maxlength="1" pattern="[\d]*" tabindex="3" placeholder="·" autocomplete="off">
                            <input disabled class="pincode-input" type="tel" name="pincode-4" maxlength="1" pattern="[\d]*" tabindex="4" placeholder="·" autocomplete="off">
                            <input disabled class="pincode-input" type="tel" name="pincode-5" maxlength="1" pattern="[\d]*" tabindex="5" placeholder="·" autocomplete="off">
                            <input disabled class="pincode-input" type="tel" name="pincode-6" maxlength="1" pattern="[\d]*" tabindex="6" placeholder="·" autocomplete="off">
                        </div>
                    </form>
                    <p class="par14">Повторно код можно получить через <span>47</span> секунд</p>
                </div>
                <button class="btn-blue-def" id="tg-btn-confirm">Подтвердить</button>
            </div>
        </div>
    </div>
</div>
</main>
<?php
get_footer();
?>