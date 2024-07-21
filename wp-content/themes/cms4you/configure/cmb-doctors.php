<?php
add_action( 'cmb2_init', 'doctor_page' );

function doctor_page() {
    //карточка доктора
    $theam_meta = new_cmb2_box( array(
        'id' => 'doctor_page',
        'title' => __( 'Данные доктора', 'pg' ),
        'object_types' => array('doctor'), // Post type
        'context'     => 'after_title',
        'priority'   => 'default',
        'description' => __( '', 'cmb2' ),
        'show_names'   => true,
      
        ) );
        $theam_meta->add_field( array(
            'name' => 'Фамилия, инициалы',
            'type' => 'text',
            'id'   => 'fio'
        ) );
        $theam_meta->add_field( array(
            'name' => 'Специальность',
            'type' => 'text',
            'id'   => 'position'
        ) );
        $theam_meta->add_field( array(
            'name' => 'Миниатюра',
            'type' => 'file',
            'id'   => 'photo_mini'
        ) );
    
}

function add_doctor_schedule_metabox() {
    add_meta_box(
        'doctor_schedule_metabox',
        __('Расписание приема врачей', 'textdomain'),
        'render_doctor_schedule_metabox',
        'doctor',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_doctor_schedule_metabox');

function render_doctor_schedule_metabox($post) {
    wp_nonce_field('save_doctor_schedule', 'doctor_schedule_nonce');

    $saved_time_slots = get_post_meta($post->ID, '_doctor_schedule_time_slots', true);
    echo '<div class="d-flex doctor-schedule-calendar">';
    echo '<div id="doctor-schedule-calendar"></div>';
    echo '<div id="months-container"></div>'; 
    echo '</div>';
    echo '<script type="text/template" id="month-template">';
    echo '<div id="month-id" class="time-slots-container">';
    echo '<p>Month Year</p>';
    echo '<div class="slots"></div>';
 
    echo '</div>';
    echo '</script>';

    echo '<script type="text/javascript">';
    echo 'var savedTimeSlots = ' . json_encode($saved_time_slots) . ';';
    echo '</script>';
}

function save_doctor_schedule($post_id) {
    if (!isset($_POST['doctor_schedule_nonce']) || !wp_verify_nonce($_POST['doctor_schedule_nonce'], 'save_doctor_schedule')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('doctor' != $_POST['post_type'] || !current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $time_slots = isset($_POST['time_slots']) ? $_POST['time_slots'] : array();

    update_post_meta($post_id, '_doctor_schedule_time_slots', $time_slots);
}

add_action('save_post', 'save_doctor_schedule');