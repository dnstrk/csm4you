<?php
add_action( 'cmb2_init', 'landing_block' );

function landing_block() {
    //создание метабокса
    $theam_meta = new_cmb2_box( array(
        'id' => 'home_block',
        'title' => __( 'Главная', 'pg' ),
        'object_types' => array('page'), // Post type

        'context'     => 'after_title',
        'priority'   => 'default',
        'description' => __( '', 'cmb2' ),
        'show_names'   => true,
        'show_on'      => array( 'key' => 'page-template', 'value' => 'home-page.php' ),
        ) );

    //СЕКЦИЯ HOME
    $theam_meta->add_field( array(
        'name' => 'Настройки секции HOME',
        'type' => 'title1',
        'id'   => 'home_title'
    ) );
    }
?>