<?php

function custom_setup() {

  // поддержка функций темы
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'editor-style' );
  add_theme_support( 'html5', array( 'search-form', 'navigation-widgets', 'gallery', 'caption', 'script', 'style' ) );
  add_theme_support('title-tag');

##Языки
  load_theme_textdomain('textdomaintomodify', get_template_directory() . '/languages');


##Удалить глобальные стили и всякий мусор
  remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
  remove_action('wp_body_open', 'wp_global_styles_render_svg_filters' );
  remove_action( 'wp_head', 'wp_generator'); 
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'index_rel_link' );
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
  remove_action('wp_head', 'previous_post_rel_link', 10, 0);
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  remove_action('wp_head', '_ak_framework_meta_tags');
  
## Удалить Meta Generators
ini_set('output_buffering', 'on'); // turns on output_buffering
function remove_meta_generators($html) {
    $pattern = '/<meta name(.*)=(.*)"generator"(.*)>/i';
    $html = preg_replace($pattern, '', $html);
    return $html;
}

add_action('wp_footer', function(){ ob_end_flush(); }, 100);


##Удалить хуки wp_footer, которые добавляют глобальные встроенные стили.
  remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

##Удалить фильтры render_block,
  remove_filter('render_block', 'wp_render_duotone_support');
  remove_filter('render_block', 'wp_restore_group_inner_container');
  remove_filter('render_block', 'wp_render_layout_support_flag');

##Удалить ненужные размеры изображений
  remove_image_size( '1536x1536' );
  remove_image_size( '2048x2048' );

##Кастомные размеры изображений
  // add_image_size( '424x424', 424, 424, true );
  // add_image_size( '1920', 1920, 9999 );
}
add_action('after_setup_theme', 'custom_setup');

##Удалить хуки wp_footer, которые добавляют глобальные встроенные стили.
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

##Удалить фильтры render_block,
  remove_filter('render_block', 'wp_render_duotone_support');
  remove_filter('render_block', 'wp_restore_group_inner_container');
  remove_filter('render_block', 'wp_render_layout_support_flag');

##Удалить ненужные размеры изображений
  remove_image_size( '1536x1536' );
  remove_image_size( '2048x2048' );

##Кастомные размеры изображений
  // add_image_size( '424x424', 424, 424, true );
  // add_image_size( '1920', 1920, 9999 );
  
add_action('after_setup_theme', 'custom_setup');

## удалить размеры изображений по умолчанию, чтобы избежать перегрузки сервера
  function remove_default_image_sizes( $sizes) {
    unset( $sizes['large']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    return $sizes;
  }
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

##Отключить большой размер изображений
  add_filter( 'big_image_size_threshold', '__return_false' );

## Убираем комментарии
function callback($buffer) {
    $buffer = preg_replace('/<!--(.|\s)*?-->/', '', $buffer);
    return $buffer;
}
function buffer_start() {
    ob_start("callback");
}
function buffer_end() {
    ob_end_flush();
}
add_action('get_header', 'buffer_start');
add_action('wp_footer', 'buffer_end');

## Удалить эмоджи
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

## удалить wp-embed.js из футера
function my_deregister_scripts() {
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


## закроем возможность публикации через xmlrpc.php
add_filter('xmlrpc_enabled', 'return_false');
add_action('after_setup_theme', function(){
  if ( ! is_admin() && ! current_user_can('manage_options') )
    show_admin_bar( false );
});

## поддержка mime типов
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
  $mimes['svg']  = 'image/svg';
  return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

  // WP 5.1 +
  if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
    $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
  }
  else {
    $dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
  }

  // mime тип был обнулен, поправим его
  // а также проверим право пользователя
  if( $dosvg ){

    // разрешим
    if( current_user_can('manage_options') ){

      $data['ext']  = 'svg';
      $data['type'] = 'image/svg+xml';
    }
    // запретим
    else {
      $data['ext']  = false;
      $data['type'] = false;
    }

  }

  return $data;
}

## отключить обновления по электронной почте
add_filter( 'auto_plugin_update_send_email', '__return_false' );
add_filter( 'auto_theme_update_send_email', '__return_false' );

## Схема
function pg_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . $schema . $type . '"';
}
add_filter( 'nav_menu_link_attributes', 'pg_schema_url', 10 );
function pg_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'pg_wp_body_open' ) ) {
function pg_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'pg_skip_link', 5 );
function pg_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html( 'Перейти к содержанию', 'pg' ) . '</a>';
}
add_filter( 'the_content_more_link', 'pg_read_more_link' );
function pg_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'pg' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}

## Отключу wlwmanifest
remove_action( 'wp_head', 'wlwmanifest_link' );
## Прячем X-Pingback
function remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'remove_x_pingback');


## менюшечки

register_nav_menus( array( 'main-menu' => esc_html__( 'Главное меню', 'pg' ) ) );
register_nav_menus( array( 'news-menu' => esc_html__( 'Меню новостей', 'pg' ) ) );
register_nav_menus( array( 'home-menu' => esc_html__( 'Меню на главной странице', 'pg' ) ) );


## поля в настройках страницы
add_action('customize_register', 'dco_customize_register');

function dco_customize_register($wp_customize) {
  $wp_customize->add_section('header', array(
    'title' => 'Данные компании',
    'priority' => 1,
));
$wp_customize->add_section('footer', array(
    'title' => 'Подвал сайта',
    'priority' => 2,
));

/*
административное поле по смене номера
*/

//header
$header_num_wa = 'num_wa';

$wp_customize->add_setting($header_num_wa, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($header_num_wa, array(
  'section' => 'header',
  'type' => 'text',
  'label' => 'Header: Номер телеграм',
));



$header_num_mobile = 'num_mobile';

$wp_customize->add_setting($header_num_mobile, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($header_num_mobile, array(
  'section' => 'header',
  'type' => 'text',
  'label' => 'Header: Мобильный номер',
));



$header_mail = 'mail';

$wp_customize->add_setting($header_mail, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($header_mail, array(
  'section' => 'header',
  'type' => 'text',
  'label' => 'Header: Почта',
));



$header_address = 'address_head';

$wp_customize->add_setting($header_address, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($header_address, array(
  'section' => 'header',
  'type' => 'text',
  'label' => 'Header: Адрес',
));



//footer
$footer_num_1 = 'num_footer1';

$wp_customize->add_setting($footer_num_1, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_num_1, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Номер 1',
));



$footer_num_footer2 = 'num_footer2';

$wp_customize->add_setting($footer_num_footer2, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_num_footer2, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Номер 2',
));



$footer_mail = 'mail_footer';

$wp_customize->add_setting($footer_mail, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_mail, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Почта',
));



$footer_address_foot = 'address_foot';

$wp_customize->add_setting($footer_address_foot, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_address_foot, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Адрес',
));



$footer_working_hours_clinic = 'working_hours_clinic';

$wp_customize->add_setting($footer_working_hours_clinic, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_working_hours_clinic, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Рабочие часы клиники',
));



$footer_working_hours_lab = 'working_hours_lab';

$wp_customize->add_setting($footer_working_hours_lab, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_working_hours_lab, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Рабочие часы лаборатории',
));



$footer_copyright = 'copyright';

$wp_customize->add_setting($footer_copyright, array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage'
));
$wp_customize->add_control($footer_copyright, array(
  'section' => 'footer',
  'type' => 'text',
  'label' => 'Footer: Copyright',
));
}








add_action( 'current_screen', 'my_theme_add_editor_styles' );

function my_theme_add_editor_styles() {
	add_editor_style( '/assets/css/editor-styles.css' );
}

add_action("wp_ajax_load_more", "load_posts");
add_action("wp_ajax_nopriv_load_more", "load_posts");

function load_posts() {
  $args = json_decode(stripslashes($_POST["query"]), true);
  
  $args = array(  "post_type"=> $_POST["tpl"],   "post_status" => "publish",  "posts_per_page" => 2, );
    $args["paged"] = $_POST["page"] + 2;
    $posts = new WP_Query($args);
    $html = '';
    if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); ?>
   
  <?php  if ($_POST["tpl"] === "project") {       
    get_template_part("templates/loop-project");
    } ?>
  <?php
  endwhile;
  endif;
  wp_reset_postdata();
  die($html);
}
function ajax_login() {
    check_ajax_referer('ajax-nonce', 'security');

    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon($info, false);
    if (is_wp_error($user_signon)) {
        echo json_encode(array('success' => false, 'message' => __('Login failed, please check your username and password.', 'textdomain')));
    } else {
        echo json_encode(array('success' => true, 'message' => __('Login successful, redirecting...', 'textdomain')));
    }
    wp_die();
}
add_action('wp_ajax_nopriv_ajax_login', 'ajax_login');

function ajax_register() {
    check_ajax_referer('ajax-nonce', 'security');

    $userdata = array(
        'user_login' => $_POST['username'],
        'user_email' => $_POST['email'],
        'user_pass' => $_POST['password'],
    );

    $user_id = wp_insert_user($userdata);

    if (is_wp_error($user_id)) {
        echo json_encode(array('success' => false, 'message' => $user_id->get_error_message()));
    } else {
        echo json_encode(array('success' => true, 'message' => __('Registration successful, you can now log in.', 'textdomain')));
    }
    wp_die();
}
add_action('wp_ajax_nopriv_ajax_register', 'ajax_register');


