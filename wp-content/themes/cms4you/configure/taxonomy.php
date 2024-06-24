<?php 

function create_doctor_post_type() {
    $labels = array(
        'name' => __( 'Доктора' ),
        'singular_name' => __( 'Доктор' ),
        'add_new' => __( 'Создать' ),
        'add_new_item' => __( 'Создание карточки врача' ),
        'edit_item' => __( 'Редактировать карточку' ),
        'new_item' => __( 'Новый доктор' ),
        'view_item' => __( 'Просмотр доктора' ),
        'search_items' => __( 'Поиск доктора' ),
        'not_found' => __( 'Доктора не найдены' ),
        'not_found_in_trash' => __( 'Доктора в корзине отсутствуют' ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Доктора' )
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'doctor' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail' ),
    );

    register_post_type( 'doctor', $args );
}
add_action( 'init', 'create_doctor_post_type' );

function create_review_post_type() {
    $labels = array(
        'name' => __( 'Отзывы' ),
        'singular_name' => __( 'Отзыв' ),
        'add_new' => __( 'Создать' ),
        'add_new_item' => __( 'Добавить новый отзыв' ),
        'edit_item' => __( 'Редактировать отзыв' ),
        'new_item' => __( 'Новый отзыв' ),
        'view_item' => __( 'Просмотр отзыва' ),
        'search_items' => __( 'Поиск отзыва' ),
        'not_found' => __( 'Отзывы не найдены' ),
        'not_found_in_trash' => __( 'Отзывы в корзине отсутствуют' ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Отзывы' )
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'review' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'excerpt' ),
    );

    register_post_type( 'review', $args );
}
add_action( 'init', 'create_review_post_type' );

function create_service_post_type() {
    $labels = array(
        'name' => __( 'Услуги' ),
        'singular_name' => __( 'Услуга' ),
        'add_new' => __( 'Создать' ),
        'add_new_item' => __( 'Создать услугу' ),
        'edit_item' => __( 'Редактировать услугу' ),
        'new_item' => __( 'Новая услуга' ),
        'view_item' => __( 'Просмотр услуги' ),
        'search_items' => __( 'Поиск услуг' ),
        'not_found' => __( 'Услуги не найдены' ),
        'not_found_in_trash' => __( 'Услуги в корзине отсутствуют' ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Услуги' )
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'service' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'create_service_post_type' );

?>