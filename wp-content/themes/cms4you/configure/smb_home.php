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

    //Секция Banner
    $theam_meta->add_field( array(
        'name' => 'Настройки секции Banner',
        'type' => 'title1',
        'id'   => 'home_title'
    ) );

    $theam_meta->add_field( array(
        'name'    => 'Баннер: Заголовок',
        'default' => 'Клиника Системной Медицины',
        'id'      => 'banner_h1',
        'type'    => 'text',
    ) );
    $theam_meta->add_field( array(
        'name'    => 'Баннер: Текст',
        'default' => 'Уникальная клиника в Москве, подходящая к организму человека, как к целостной живой системе',
        'id'      => 'banner_p',
        'type'    => 'text',
    ) );


    
    $group_field_id = $theam_meta->add_field( array(
        'id'          => 'banner_cards',
        'type'        => 'group',
        'description' => __( 'Баннер: карточки', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $theam_meta->add_group_field( $group_field_id, array(
        'name' => 'Заголовок',
        'id'   => 'banner_card_h5',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    
    $theam_meta->add_group_field( $group_field_id, array(
        'name' => 'Описание',
        'id'   => 'banner_card_p',
        'type' => 'textarea_small',
    ) );
    
    $theam_meta->add_group_field( $group_field_id, array(
        'name' => 'Изображение',
        'id'   => 'banner_card_img',
        'type' => 'file',
    ) );



    //Секция About
    $theam_meta->add_field( array(
        'name' => 'Настройки секции "О клинике"',
        'type' => 'title1',
        'id'   => 'about_title'
    ) );
    
    $theam_meta->add_field( array(
        'name'    => 'О клинике: Заголовок',
        'default' => 'О нашей клинике',
        'id'      => 'about_h3',
        'type'    => 'text',
    ) );

    $theam_meta->add_field( array(
        'name'    => 'О клинике: Текст',
        'default' => 'Уникальное медицинское учреждение в Москве, которое подходит к организму человека как к целостной живой системе. Здесь работают высококвалифицированные врачи, кандидаты и доктора наук, имеющие многолетний опыт медицинской практики. Клиника предлагает комплексное решение медицинских проблем пациента и индивидуальный подход к каждому человеку. Врачи выявляют и воздействуют на скрытые нарушения в организме, являющиеся истинной причиной всех симптомов и жалоб пациента. В клинике используются глубокое знание основ медицины и системныйподход для устранения причин плохого самочувствия и приведения организма в порядок.',
        'id'      => 'about_p',
        'type'    => 'text',
    ) );
    $theam_meta->add_field( array(
        'name'    => 'О клинике: Документ',
        'desc'    => 'Прикрепите документ',
        'id'      => 'about_file',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
            // 'type' => array(
            // 	'image/gif',
            // 	'image/jpeg',
            // 	'image/png',
            // ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );



    //Секция Doctors
    $theam_meta->add_field( array(
        'name' => 'Настройки секции "Врачи клиники"',
        'type' => 'title1',
        'id'   => 'doctors_title'
    ) );

    $theam_meta->add_field( array(
        'name'    => 'О клинике: Заголовок',
        'default' => 'Врачи клиники',
        'id'      => 'doctors_h3',
        'type'    => 'text',
    ) );



    //Секция Price-list
    $theam_meta->add_field( array(
        'name' => 'Настройки секции "Прайс-лист"',
        'type' => 'title1',
        'id'   => 'price-list_title'
    ) );

    $theam_meta->add_field( array(
        'name'    => 'Прайс-лист: Заголовок',
        'default' => 'Прайс-лист',
        'id'      => 'price-list_h3',
        'type'    => 'text',
    ) );



    //Секция Online-register
    $theam_meta->add_field( array(
        'name' => 'Настройки секции "Онлайн запись"',
        'type' => 'title1',
        'id'   => 'online-register_title'
    ) );

    $theam_meta->add_field( array(
        'name'    => 'Онлайн запись: Заголовок',
        'default' => 'Онлайн запись',
        'id'      => 'online-register_h3',
        'type'    => 'text',
    ) );
    
    $theam_meta->add_field( array(
        'name'    => 'Онлайн запись: Текст',
        'default' => 'Выберите дату или врача',
        'id'      => 'online-register_span',
        'type'    => 'text',
    ) );



    //Секция Review
    $theam_meta->add_field( array(
        'name' => 'Настройки секции "Отзывы клиентов"',
        'type' => 'title1',
        'id'   => 'review_title'
    ) );

    $theam_meta->add_field( array(
        'name'    => 'Отзывы клиентов: Заголовок',
        'default' => 'Отзывы клиентов',
        'id'      => 'review_h3',
        'type'    => 'text',
    ) );
    
    
    
    //Секция News
    $theam_meta->add_field( array(
        'name' => 'Настройки секции "Новости клиники"',
        'type' => 'title1',
        'id'   => 'news_title'
    ) );

    $theam_meta->add_field( array(
        'name'    => 'Новости клиники: Заголовок',
        'default' => 'Новости клиники',
        'id'      => 'news_h3',
        'type'    => 'text',
    ) );


    }
?>