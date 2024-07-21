<?php
/*
Plugin Name: Плагин записи к врачу
Description: Плагин для записи на прием к врачу.
Version: 1.0
Author: Uldalex
*/

// Регистрация кастомного типа записи 'patient'
// Регистрация кастомного типа записи 'patient'
function doctor_appointment_enqueue_scripts() {
    wp_enqueue_script('doctor-appointment-script', plugins_url('scripts.js', __FILE__), ['jquery'], null, true);
}

add_action('wp_enqueue_scripts', 'doctor_appointment_enqueue_scripts');
function register_patient_post_type() {
    register_post_type('patient', [
        'labels' => [
            'name' => 'Записи к врачу',
            'singular_name' => 'Записи к врачу',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title',  'custom-fields'],
    ]);
}

add_action('init', 'register_patient_post_type');

// Добавление метабоксов
function add_patient_metaboxes() {
    add_meta_box('patient_details', 'Детали приёма', 'patient_details_metabox', 'patient', 'normal', 'high');
}

function patient_details_metabox($post) {
    $appointment_date = get_post_meta($post->ID, 'appointment_date', true);
    $appointment_time = get_post_meta($post->ID, 'appointment_time', true);
    $doctor_name = get_post_meta($post->ID, 'doctor_name', true);
    $doctor_post_id = get_post_meta($post->ID, 'doctor_post_id', true);
    $patient_user_id = get_post_meta($post->ID, 'patient_user_id', true);
    $user = get_userdata($patient_user_id);
    $doctor_post = get_post($doctor_post_id);
    ?>
    <p>
        <label for="appointment_date">Дата приёма:</label>
        <input type="text" id="appointment_date" name="appointment_date" value="<?php echo esc_attr($appointment_date); ?>" />
    </p>
    <p>
        <label for="appointment_time">Время приёма:</label>
        <input type="text" id="appointment_time" name="appointment_time" value="<?php echo esc_attr($appointment_time); ?>" />
    </p>
    <p>
        <label for="doctor_name">Имя врача:</label>
        <input type="text" id="doctor_name" name="doctor_name" value="<?php echo esc_attr($doctor_name); ?>" />
    </p>
    <p>
        <label for="doctor_post_id">ID записи врача:</label>
        <input type="text" id="doctor_post_id" name="doctor_post_id" value="<?php echo esc_attr($doctor_post_id); ?>" readonly />
        <br/>
        <?php if ($doctor_post): ?>
            <label>Имя врача:</label>
            <span><?php echo esc_html($doctor_post->post_title); ?></span>
        <?php endif; ?>
    </p>
    <p>
        <label for="patient_user_id">ID пользователя пациента:</label>
        <input type="text" id="patient_user_id" name="patient_user_id" value="<?php echo esc_attr($patient_user_id); ?>" readonly />
        <br/>
        <?php if ($user): ?>
            <label>Имя пользователя:</label>
            <span><?php echo esc_html($user->display_name); ?></span>
            <br/>
            <label>Телефон:</label>
            <span><?php echo esc_html($user->user_login); ?></span>
        <?php endif; ?>
    </p>
    <?php
}

function save_patient_metaboxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['appointment_date'])) {
        update_post_meta($post_id, 'appointment_date', sanitize_text_field($_POST['appointment_date']));
    }
    if (isset($_POST['appointment_time'])) {
        update_post_meta($post_id, 'appointment_time', sanitize_text_field($_POST['appointment_time']));
    }
    if (isset($_POST['doctor_name'])) {
        update_post_meta($post_id, 'doctor_name', sanitize_text_field($_POST['doctor_name']));
    }
    if (isset($_POST['doctor_post_id'])) {
        update_post_meta($post_id, 'doctor_post_id', sanitize_text_field($_POST['doctor_post_id']));
    }
    if (isset($_POST['patient_user_id'])) {
        update_post_meta($post_id, 'patient_user_id', sanitize_text_field($_POST['patient_user_id']));
    }
}

add_action('add_meta_boxes', 'add_patient_metaboxes');
add_action('save_post', 'save_patient_metaboxes');
// Обработка AJAX-запроса
function submit_appointment() {
    $orderInput = sanitize_text_field($_POST['orderInput']);
    $doctorName = sanitize_text_field($_POST['doctorName']);
    $time = sanitize_text_field($_POST['time']);
    $phone = sanitize_text_field($_POST['phone']);
    $name = sanitize_text_field($_POST['name']);
    $message = sanitize_textarea_field($_POST['message']);

    // Проверка наличия пользователя по номеру телефона
    $user = get_user_by('login', $phone);

    if (!$user) {
        // Создание нового пользователя
        $password = wp_generate_password(8);
        $user_id = wp_create_user($phone, $password, $phone . '@example.com');
        wp_update_user([
            'ID' => $user_id,
            'display_name' => $name,
            'role' => 'subscriber',
        ]);
        add_user_meta($user_id, 'phone', $phone);
        // Отправка SMS с паролем (реализация зависит от выбранного SMS API)
        // send_sms($phone, "Ваш пароль: $password");
    } else {
        $user_id = $user->ID;
    }

    // Получение ID записи доктора по его имени
    $doctor_post = get_posts([
        'post_type' => 'doctor',
        'meta_query' => [
            [
                'key' => 'fio',
                'value' => $doctorName,
                'compare' => '='
            ]
        ]
    ]);

    $doctor_post_id = !empty($doctor_post) ? $doctor_post[0]->ID : 0;

    // Создание записи о приёме в кастомный тип записи 'patient'
    $appointment_data = [
        'post_title' => "Приём $name у $doctorName",
        'post_status' => 'publish',
        'post_type' => 'patient',
        'meta_input' => [
            'appointment_date' => $orderInput,
            'appointment_time' => $time,
            'doctor_name' => $doctorName,
            'patient_user_id' => $user_id,
            'doctor_post_id' => $doctor_post_id,  // Связываем пост пациента с постом доктора
        ],
    ];

    wp_insert_post($appointment_data);

    wp_send_json_success('Запрос обработан успешно.');
}

add_action('wp_ajax_submit_appointment', 'submit_appointment');
add_action('wp_ajax_nopriv_submit_appointment', 'submit_appointment');