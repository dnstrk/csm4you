<?php
/* Template Name: Страница пользователя */

get_header(); ?>
<?php
$name = get_the_author_meta('nam', $current_user->ID);
$fam = get_the_author_meta('fam', $current_user->ID);
$lastnam = get_the_author_meta('lastnam', $current_user->ID);
$bdr = get_the_author_meta('bdr', $current_user->ID);
$sex = get_the_author_meta('sex', $current_user->ID);
$phone = get_the_author_meta('phone', $current_user->ID);
$phone = get_the_author_meta('phone', $current_user->ID);
?>
<div class="container">
    <article> 
    <div id="user-dashboard">
        <?php
        // Проверка, вошел ли пользователь
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            ?>
            <h2>Личный кабинет</h2>
            <div class="tab user-wrapper">
                <div class="row mb-5">
                    <div class="col-md-10">
                        <h3><?php _e('Мои данные', 'textdomain'); ?></h3></div>
                    <div class="col-md-2">
                        <a href="" class="edit">Редактировать</a>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <span class="label"><?php _e('Имя:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php if($name) {echo esc_attr($name);}else{ echo '-';} ?></p>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <span class="label"><?php _e('Фамилия:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php echo esc_attr(get_the_author_meta('fam', $current_user->ID)); ?></p>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <span class="label"><?php _e('Отчество:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php echo esc_attr(get_the_author_meta('lastnam', $current_user->ID)); ?></p>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <span class="label"><?php _e('Дата рождения:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php echo esc_attr(get_the_author_meta('bdr', $current_user->ID)); ?></p>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <span class="label"><?php _e('Пол:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php echo esc_attr(get_the_author_meta('sex', $current_user->ID)); ?></p>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <span class="label"><?php _e('Телефон:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php echo esc_attr(get_the_author_meta('phone', $current_user->ID)); ?></p>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <span class="label"><?php _e('Email:', 'textdomain'); ?></span>
                            <p class="user-prorerty"><?php echo esc_attr(get_the_author_meta('email', $current_user->ID)); ?></p>
                        </div>
                    </div>
                   

            </div>
            <!-- Добавьте форму редактирования профиля -->
            <h3><?php _e('Edit Profile', 'textdomain'); ?></h3>
            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="update_user_profile">
                <input type="hidden" name="user_id" value="<?php echo esc_attr($current_user->ID); ?>">
                
                <p>
                    <label for="phone"><?php _e('Phone', 'textdomain'); ?></label>
                    <input type="text" name="phone" id="phone" value="<?php echo esc_attr(get_the_author_meta('phone', $current_user->ID)); ?>" class="regular-text">
                </p>
                
                <p>
                    <label for="address"><?php _e('Address', 'textdomain'); ?></label>
                    <input type="text" name="address" id="address" value="<?php echo esc_attr(get_the_author_meta('address', $current_user->ID)); ?>" class="regular-text">
                </p>
                
                <p>
                    <input type="submit" value="<?php _e('Update Profile', 'textdomain'); ?>">
                </p>
            </form>
            <?php
        } else {
            ?>
            <p><?php _e('You need to log in to view this page.', 'textdomain'); ?></p>
            <?php
        }
        ?>
    </div>
    </article>
</div>
<?php get_footer(); ?>