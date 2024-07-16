<?php
function _add_javascript() {
    //отключение стандартных действий wp_head из head
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    //подключение собственных скриптов
  wp_enqueue_script('splide', get_template_directory_uri().'/assets/js/splide.min.js', null, null, true );
  wp_enqueue_script('air-datepicker', get_template_directory_uri().'/assets/js/air-datepicker.js', null, null, true );
  wp_enqueue_script('custom-cmb2-js', get_template_directory_uri() . '/assets/js/custom-cmb2.js', array('jquery', 'air-datepicker-js'), null, true);
  wp_enqueue_script('theme', get_template_directory_uri().'/assets/js/app.min.js', array( 'jquery' ), null, true );
  
}
//подключение вышеуказанной функции
add_action('wp_enqueue_scripts', '_add_javascript');

//подключаем календарь для админки
function enqueue_custom_scripts() {
  // Подключаем стили и скрипты Air Datepicker
  wp_enqueue_style('air-datepicker-css', 'https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/3.0.0/css/datepicker.min.css');
  wp_enqueue_script('air-datepicker-js', '/assets/js/air-datepicker.js', array('jquery'), null, true);

  // Подключаем наш кастомный скрипт
  wp_enqueue_script('custom-cmb2-js', get_template_directory_uri() . '/assets/js/custom-cmb2.js', array('jquery', 'air-datepicker-js'), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_custom_scripts');


function _add_stylesheets() {
    //отключение стандартного редактора Гуттенберг
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
    //Подключение собственных стилей 
  wp_enqueue_style('normalise', get_template_directory_uri().'/assets/css/normalise.css', null, null, 'all' );
  wp_enqueue_style('splide', get_template_directory_uri().'/assets/css/splide.css', null, null, 'all' );
  wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap-grid.css', null, null, 'all' ); 
  wp_enqueue_style('air-datepicker', get_template_directory_uri().'/assets/css/air-datepicker.css', null, null, 'all' ); 
  wp_enqueue_style('theme', get_template_directory_uri(). '/assets/css/app.min.css', null, null, 'all' );

}
//подключение вышеуказанной функции
add_action('wp_enqueue_scripts', '_add_stylesheets');
