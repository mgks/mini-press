<?php

// listing allowed functions
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo', array(
    'height' => 300,
    'width'  => 720,
));

function mini_press_customization( $wp_customize ) {
    $wp_customize->get_section('title_tagline')->priority = 2;
    $wp_customize->add_panel( 'mini_press_panel', 
        array(
            //'priority'       => 100,
            'title'            => __( 'Theme Options', 'mini_press' ),
            'description'      => __( 'Custom settings and changes', 'mini_press' ),
        ) 
    );
    $wp_customize->add_section( 'mini_press_text',
        array(
            'title'         => __( 'Text Options', 'mini_press' ),
            'priority'      => 1,
            'panel'         => 'mini_press_panel'
        ) 
    );
    $wp_customize->add_setting( 'mini_press_foot_text',
        array(
            'default'           => __( '<span class="mini-press-footer">Get a <a href="https://github.com/mgks/mini-press"><b>mini-press</b></a> for yourself.</span>', 'mini_press' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    // Control for Copyright text
    $wp_customize->add_control( 'mini_press_foot_text', 
        array(
            'type'        => 'text',
            'priority'    => 10,
            'section'     => 'mini_press_text',
            'label'       => 'Footer text',
            'description' => 'Text put here will be outputted in the footer',
        ) 
    );
    $wp_customize->add_section( 'mini_press_colors' ,
        array(
            'title'      => __( 'Color Options', 'mini_press' ),
            'priority'   => 2,
            'panel'      => 'mini_press_panel'
        )
    );
    $wp_customize->add_setting( 'mini_press_bg_color' , array(
        'default'     => '#ffffff',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_color', array(
        'label'      => __( 'Background Color', 'mini_press' ),
        'section'    => 'mini_press_colors',
        'settings'   => 'mini_press_bg_color',
    ) ) );
}
add_action( 'customize_register', 'mini_press_customization' );

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
add_action( 'init', 'register_my_menu' );

function custom_theme_assets() {
	wp_enqueue_style( 'css/main', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );

function mini_press_bg_color(){
    echo '<style type="text/css">body { background-color: '.get_theme_mod('mini_press_bg_color', '#ffffff').' }</style>';
}
add_action( 'wp_head', 'mini_press_bg_color');

get_theme_mod( 'setting_id', 'default_value' );
?>