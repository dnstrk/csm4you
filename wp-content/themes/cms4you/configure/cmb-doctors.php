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
        $theam_meta->add_field(array(
            'name'       => __('Календарь приема доктора', 'cmb2'),
            'id'         => 'custom_dates_times',
            'type'       => 'text', 
            'repeatable' => true,   
        ));
    
}
    