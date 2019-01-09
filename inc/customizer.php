<?php   

function customizer_register($wp_customize){
    //Rodapé
    $wp_customize -> add_section('footer', array(
        'title' => __('Rodapé', 'Bootstrap 4 + wordpress'),
        'description' => sprintf(__('Opções para o rodapé', 'Bootstrap 4 + wordpress')),
        'priority' => 20
    ));

    $wp_customize -> add_setting('footer_title', array(
        'default' => __('Meu Primeiro Tema de Wordpress', 'Bootstrap 4 + wordpress'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('footer_title', array(
        'label' => __('Título do rodapé', 'Bootstrap 4 + wordpress'),
        'section' => 'footer', 
        'priority' => 1
    ));

       $wp_customize -> add_setting('footer_text', array(
        'default' => __('Feito por mim com muita dedicação e esforço', 'Bootstrap 4 + wordpress'),
        'type' => 'theme_mod'
    ));

    $wp_customize -> add_control('footer_text', array(
        'label' => __('Texto do rodapé', 'Bootstrap 4 + wordpress'),
        'section' => 'footer', 
        'priority' => 2
    ));
  }
add_action('customize_register', 'customizer_register');