<!DOCTYPE HTML>
<html <?php language_attributes(); ?> <?php if(is_404()){echo 'class="page-404"';} ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body class="<?php if(is_front_page()){echo "home-page";} ?>">
<header id="header" class="header hidden">
    <div class="container">
        <div class="header-wrapper">
            <nav class="header__nav">
                <?php 
                    wp_nav_menu( [
                            'theme_location'  => 'main-menu',
                            'menu'            => '',
                            'container'       => 'ul',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'nav nav-ul main-nav__list',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s" class="nav-ul main-nav__list">%3$s </ul>',
                            'depth'           => 0,
                        ] );
                    ?>
            </nav>
        </div>
    </div>
</header>
<main>
