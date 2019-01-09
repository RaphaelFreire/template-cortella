<?php 
    //Chamar a tag Title e adicionar o formato de post
    function theme_support(){
        //Chamar a tag Title
        add_theme_support('title-tag');
        // Adicionar os formatos de posts
        add_theme_support('post-formats', array('aside', 'image'));
        //Adicionar logo ao tema
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'theme_support');

    //Previnir o erro na tag title em versões antigas
    if (!function_exists('_wp_render_title_tag')) {
        function render_title() {
            ?>
            <title><?php wp_title('|', true, 'right'); ?></title>
            <?php
        }
        add_action('wp_head', 'render_title');
     }

    // Registra o Custom Navigation Walker
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    // Registrar os menus
    register_nav_menus(array(
        'principal' => __('Menu Principal', 'bs4wp')
    ));
    
    //Definir as miniaturas dos post
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 1000, 600, true);
    add_image_size( 'banner', 1200, 600, true);


    //Definir o tamanho do resumo
    add_filter( 'excerpt_length' , function($lenght){
        return 54;
    });

    //adicionar leia mais no resumo
    function excerpt_more( $more ) {
        if ( ! is_single() ) {
            $more = sprintf( '... <a class="badge badge-my-color-1 text-uppercase" href="%1$s">%2$s</a>',
                get_permalink( get_the_ID() ),
                __( 'Leia Mais', 'textdomain' )
            );
        }
        return $more;
    }
    add_filter( 'excerpt_more', 'excerpt_more' );

    //Definir o estilo da paginação
    add_filter('next_posts_link_attributes' , 'posts_link_attributes' );
    add_filter('previous_posts_link_attributes' , 'posts_link_attributes' );

    function posts_link_attributes(){
        return ' class="btn btn-outline-my-color-1 text-uppercase" ';
    };

    //Criar a Barra Lateral
    register_sidebar(
        array(
            'name' => 'Barra Lateral',
            'id' => 'sidebar',
            'before_widget' => '<div class="card mb-4">',
            'after_widget' => '</div></div>',
            'before_title' => '<h5 class="card-header">',
            'after_title' => '</h5><div class="card-body">',    
    ));

    //Criar o campo de busca
    register_sidebar(
        array(
            'name' => 'Busca',
            'id' => 'busca',
            'before_widget' => '<div class="blog-search">',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',    
    ));

    // Ativar o formulário para respostas nos comentários
    function theme_queue_js(){
        if((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
    }
    add_action('wp_print_scripts', 'theme_queue_js');


    //Personalizar os comentários
    function format_comment($comment, $args, $depth){
        $GLOBALS['comment'] = $comment; ?>

        <div <?php comment_class('ml-4');?> id="comment-<?php comment_ID(); ?>">
            <div class="card mb-3">
            <div class="card-body">
            <div class="comment-intro">
                <h5 class="card-title"><?php printf(__('%s'), get_comment_author_link()) ?></h5>
                <h6 class="card-subtitle mb-3 text-muted">Comentou em <?php printf(__('%1$s'), get_comment_date('d/m/y'), get_comment_time()) ?> </h6>
            </div>
            <?php comment_text(); ?>
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            
            </div>
        </div>
        <?php          
    }

    //Criar o tipo de post para o banner
    function create_post_type(){
        register_post_type('banners', array(
            'labels' => array(
                'name' => __('Banners'),
                'singular_name' => __('Banners')
            ),
            'supports' => array(
                'title', 'editor', 'thumbnail'   
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-images-alt2',
            'rewrite' => array('slug' => 'Banners'),
        ));
    }

    //Iniciar o tipo de post banner
    add_action('init', 'create_post_type');

    // Incluir as funções de personalização
    require get_template_directory(). '/inc/customizer.php';

    //Permitir fazer o upload de svg
    function cc_mime_types($mimes) {
       $mimes['svg'] = 'image/svg+xml';
       return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

    


    function wpc_dashboard_widgets() {
        global $wp_meta_boxes;
        // remove unnecessary widgets
        // var_dump( $wp_meta_boxes['dashboard'] ); // use to get all the widget IDs
        unset(
        $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
        $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
        $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
        );
        // add a custom dashboard widget
        wp_add_dashboard_widget( 'dashboard_custom_feed', 'WP Loop', 'dashboard_custom_feed_output' ); //add new RSS feed output
        }

        function dashboard_custom_feed_output() {
        echo '<div class="rss-widget">';
        wp_widget_rss_output(array(
        'url' => 'http://www.firstsiteguide.com/feed',
        'items' => 5,
        'show_summary' => 1,
        'show_author' => 0,
        'show_date' => 1
        ));
        echo "</div>";
        }

        add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

?>