<?php
    
    // thumbnail
    add_theme_support('post-thumbnails');
    add_image_size('tb', 120, 120, true);
    add_image_size('tbPost', 1600, 600, true);
    add_image_size('tbP', 200, 200, true);
    add_image_size('tbPlinks', 300, 200, true);
    add_image_size('boxPrincial', 720, 410, true);
    
    // upload svg
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');
    
    // length
    function wpdocs_custom_excerpt_length( $length ) {
        return 15;
    }
    add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

    // get sub categories
	function getSubCategories () {
		$parentscategory ="";
		foreach((get_the_category()) as $category) {
			if ($category->category_parent !== 0) {
				$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
			}
		}
		echo substr($parentscategory,0,-2);
    }

    // change post name
    function change_post_menu_label() {
        global $menu;
        global $submenu;
        $menu[5][0] = 'Biblioteca';
        $submenu['edit.php'][5][0] = 'Biblioteca';
        echo '';
    }
    add_action( 'admin_menu', 'change_post_menu_label' );

    // tipos de midia
    function tipos_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Tipos de mídia', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Tipo de mídia', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Tipos de mídia', 'text_domain' )
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy('tipos', array('post'), $args);

    }
    add_action('init', 'tipos_taxonomy', 0);

    // categoria links
    function categoria_link_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Categorias', 'text_domain' )
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy('categoria_link', array('links'), $args);
    }
    add_action('init', 'categoria_link_taxonomy', 0);

    // categoria projetos
    function categoria_projeto_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Categorias', 'text_domain' )
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy('categoria_projeto', array('projeto'), $args);
    }
    add_action('init', 'categoria_projeto_taxonomy', 0);

    // categoria Acervo de Links
     function categoria_acervo_de_links_taxonomy() {

         $labels = array(
             'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'text_domain' ),
             'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
             'menu_name'                  => __( 'Categorias', 'text_domain' )
         );
         $args = array(
             'labels'                     => $labels,
             'hierarchical'               => true,
             'public'                     => true,
             'show_ui'                    => true,
             'show_admin_column'          => true,
             'show_in_nav_menus'          => true,
             'show_tagcloud'              => true,
         );
         register_taxonomy('categoria_acervo_de_links', array('Acervo-Links'), $args);

     }
     add_action('init', 'categoria_acervo_de_Links_taxonomy', 0);

    // categoria agenda-noticia
    function categoria_agenda_noticia_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Categorias', 'text_domain' )
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy('categoria_agenda_noticia', array('agenda-noticia'), $args);

    }
    add_action('init', 'categoria_agenda_noticia_taxonomy', 0);

    // Banco de imagens
    function banco_de_imagem_post_type() {
        $labels = array(
            'name'                  => _x('Banco de imagens', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Banco de imagem', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Banco de imagens', 'text_domain'),
            'name_admin_bar'        => __('Banco de imagens', 'text_domain'),
            'archives'              => __('Banco de imagens', 'text_domain'),
            'all_items'             => __('Cadastros', 'text_domain'),
            'add_new_item'          => __('Add novo', 'text_domain'),
            'add_new'               => __('Novo', 'text_domain'),
            'new_item'              => __('Novo', 'text_domain'),
            'edit_item'             => __('Editar', 'text_domain'),
            'update_item'           => __('Atualizar', 'text_domain'),
            'view_item'             => __('Visualizar', 'text_domain'),
            'search_items'          => __('Pesquisar', 'text_domain'),
            'not_found'             => __('Sem registros!', 'text_domain'),
            'not_found_in_trash'    => __('Sem registro na lixeira', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Banco de imagens', 'text_domain'),
            'description'           => __('Banco de imagens', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies'            => array(),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type('banco_de_imagem', $args);
    }
    add_action('init', 'banco_de_imagem_post_type', 0);

    // autores
    function editor_post_type() {
        $labels = array(
            'name'                  => _x('Autores', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Autor', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Autores', 'text_domain'),
            'name_admin_bar'        => __('Autores', 'text_domain'),
            'archives'              => __('Autores', 'text_domain'),
            'all_items'             => __('Cadastros', 'text_domain'),
            'add_new_item'          => __('Add novo', 'text_domain'),
            'add_new'               => __('Novo', 'text_domain'),
            'new_item'              => __('Novo', 'text_domain'),
            'edit_item'             => __('Editar', 'text_domain'),
            'update_item'           => __('Atualizar', 'text_domain'),
            'view_item'             => __('Visualizar', 'text_domain'),
            'search_items'          => __('Pesquisar', 'text_domain'),
            'not_found'             => __('Sem registros!', 'text_domain'),
            'not_found_in_trash'    => __('Sem registro na lixeira', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Autores', 'text_domain'),
            'description'           => __('Autores', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies'            => array(),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type('editor', $args);
    }
    add_action('init', 'editor_post_type', 0);

    // links
    function link_post_type() {
        $labels = array(
            'name'                  => _x('Link/Debate', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Link/Debate', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Link/Debate', 'text_domain'),
            'name_admin_bar'        => __('Link/Debate', 'text_domain'),
            'archives'              => __('Link/Debate', 'text_domain'),
            'all_items'             => __('Cadastros', 'text_domain'),
            'add_new_item'          => __('Add novo', 'text_domain'),
            'add_new'               => __('Novo', 'text_domain'),
            'new_item'              => __('Novo', 'text_domain'),
            'edit_item'             => __('Editar', 'text_domain'),
            'update_item'           => __('Atualizar', 'text_domain'),
            'view_item'             => __('Visualizar', 'text_domain'),
            'search_items'          => __('Pesquisar', 'text_domain'),
            'not_found'             => __('Sem registros!', 'text_domain'),
            'not_found_in_trash'    => __('Sem registro na lixeira', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Link/Debate', 'text_domain'),
            'description'           => __('Link/Debate', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies'            => array(),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type('links', $args);
    }
    add_action('init', 'link_post_type', 0);

    // projeto
    function projeto_post_type() {
        $labels = array(
            'name'                  => _x('Projetos', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Projeto', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Projetos', 'text_domain'),
            'name_admin_bar'        => __('Projetos', 'text_domain'),
            'archives'              => __('Projetos', 'text_domain'),
            'all_items'             => __('Cadastros', 'text_domain'),
            'add_new_item'          => __('Add novo', 'text_domain'),
            'add_new'               => __('Novo', 'text_domain'),
            'new_item'              => __('Novo', 'text_domain'),
            'edit_item'             => __('Editar', 'text_domain'),
            'update_item'           => __('Atualizar', 'text_domain'),
            'view_item'             => __('Visualizar', 'text_domain'),
            'search_items'          => __('Pesquisar', 'text_domain'),
            'not_found'             => __('Sem registros!', 'text_domain'),
            'not_found_in_trash'    => __('Sem registro na lixeira', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Projetos', 'text_domain'),
            'description'           => __('Projetos', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies'            => array(),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type('projeto', $args);
    }
    add_action('init', 'projeto_post_type', 0);

     Acervo de Links
     function acervo_de_links_post_type() {
         $labels = array(
             'name'                  => _x('Acervo de Links', 'Post Type General Name', 'text_domain'),
             'singular_name'         => _x('Acervo de Links', 'Post Type Singular Name', 'text_domain'),
             'menu_name'             => __('Acervo de Links', 'text_domain'),
             'name_admin_bar'        => __('Acervo de Links', 'text_domain'),
             'archives'              => __('Acervo de Links', 'text_domain'),
             'all_items'             => __('Cadastros', 'text_domain'),
             'add_new_item'          => __('Add novo', 'text_domain'),
             'add_new'               => __('Novo', 'text_domain'),
             'new_item'              => __('Novo', 'text_domain'),
             'edit_item'             => __('Editar', 'text_domain'),
             'update_item'           => __('Atualizar', 'text_domain'),
             'view_item'             => __('Visualizar', 'text_domain'),
             'search_items'          => __('Pesquisar', 'text_domain'),
             'not_found'             => __('Sem registros!', 'text_domain'),
             'not_found_in_trash'    => __('Sem registro na lixeira', 'text_domain'),
         );
         $args = array(
             'label'                 => __('Acervo de Links', 'text_domain'),
             'description'           => __('Acervo de Links', 'text_domain'),
             'labels'                => $labels,
             'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
             'taxonomies'            => array(),
             'hierarchical'          => true,
             'public'                => true,
             'show_ui'               => true,
             'show_in_menu'          => true,
             'menu_position'         => 5,
             'show_in_admin_bar'     => true,
             'show_in_nav_menus'     => true,
             'can_export'            => true,
             'has_archive'           => true,
             'exclude_from_search'   => false,
             'publicly_queryable'    => true,
             'capability_type'       => 'post',
         );
         register_post_type('Acervo de Links', $args);
     }
     add_action('init', 'acervo_de_links_post_type', 0);

    // agenda-noticia
    function agenda_noticia_post_type() {
        $labels = array(
            'name'                  => _x('Agenda/Notícia', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Agenda/Notícia', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Agenda/Notícia', 'text_domain'),
            'name_admin_bar'        => __('Agenda/Notícia', 'text_domain'),
            'archives'              => __('Agenda/Notícia', 'text_domain'),
            'all_items'             => __('Cadastros', 'text_domain'),
            'add_new_item'          => __('Add novo', 'text_domain'),
            'add_new'               => __('Novo', 'text_domain'),
            'new_item'              => __('Novo', 'text_domain'),
            'edit_item'             => __('Editar', 'text_domain'),
            'update_item'           => __('Atualizar', 'text_domain'),
            'view_item'             => __('Visualizar', 'text_domain'),
            'search_items'          => __('Pesquisar', 'text_domain'),
            'not_found'             => __('Sem registros!', 'text_domain'),
            'not_found_in_trash'    => __('Sem registro na lixeira', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Agenda/Notícia', 'text_domain'),
            'description'           => __('Agenda/Notícia', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies'            => array(),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
        register_post_type('agenda-noticia', $args);
    }
    add_action('init', 'agenda_noticia_post_type', 0);

    register_taxonomy('tag','agenda-noticia',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ),
    ));

    // the_breadcrumb
    function the_breadcrumb_biblioteca() {
        $sep = ' / ';
        if (!is_front_page()) {
        
        // Start the breadcrumb with a link to your homepage
            echo '<div class="breadcrumbs">';
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo '</a>' . $sep . '<a href="'.site_url().'/?page_id=12">Biblioteca</a>' . $sep ;
        
        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
            if (is_category() || is_single() ){
                    the_category(' / ');
            } elseif (is_archive() || is_single()){
                if ( is_day() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
                } elseif ( is_year() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
                } else {
                    _e( 'Blog Archives', 'text_domain' );
                }
            }
        
        // If the current page is a single post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }
        
        // If the current page is a static page, show its title.
            if (is_page()) {
                echo the_title();
            }
        
        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()){
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ( $page_for_posts_id ) { 
                    $post = get_page($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }
            echo '</div>';
        }
    }
    function the_breadcrumb_biblioteca_() {
        $sep = ' / ';
        if (!is_front_page()) {
        
        // Start the breadcrumb with a link to your homepage
            echo '<div class="breadcrumbs">';
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo '</a>' . $sep ;
        
        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
            if (is_category() || is_single() ){
                    the_category(' / ');
            } elseif (is_archive() || is_single()){
                if ( is_day() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
                } elseif ( is_year() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
                } else {
                    _e( 'Blog Archives', 'text_domain' );
                }
            }
        
        // If the current page is a single post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }
        
        // If the current page is a static page, show its title.
            if (is_page()) {
                echo the_title();
            }
        
        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()){
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ( $page_for_posts_id ) { 
                    $post = get_page($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }
            echo '</div>';
        }
    }

    function the_breadcrumb_autor() {
        $sep = ' / ';
        if (!is_front_page()) {
        
        // Start the breadcrumb with a link to your homepage
            echo '<div class="breadcrumbs">';
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo '</a>' . $sep;
            echo '<a href="';
            echo get_permalink('12');
            echo '">';
            echo 'Biblioteca';
            echo '</a>' . $sep;
            echo '<a href="';
            echo get_permalink('3013');
            echo '">';
            echo  'Articulistas';
            echo '</a>';
        
        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
            if (is_category() || is_single() ){
                    the_category(' / ');
            } elseif (is_archive() || is_single()){
                if ( is_day() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
                } elseif ( is_year() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
                } else {
                    _e( 'Blog Archives', 'text_domain' );
                }
            }
        
        // If the current page is a single post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }
        
        // If the current page is a static page, show its title.
            if (is_page()) {
                echo the_title();
            }
        
        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()){
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ( $page_for_posts_id ) { 
                    $post = get_page($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }
            echo '</div>';
        }
    }

    function the_breadcrumb_noticias() {
        $sep = ' / ';
        if (!is_front_page()) {
        
        // Start the breadcrumb with a link to your homepage
            echo '<div class="breadcrumbs">';
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo '</a>' . $sep . '<a href="'.site_url().'/?page_id=187">Notícias</a>';
        
        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
            if (is_category() || is_single() ){
                    the_category(' / ');
            } elseif (is_archive() || is_single()){
                if ( is_day() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
                } elseif ( is_year() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
                } else {
                    _e( 'Blog Archives', 'text_domain' );
                }
            }
        
        // If the current page is a single post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }
        
        // If the current page is a static page, show its title.
            if (is_page()) {
                echo the_title();
            }
        
        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()){
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ( $page_for_posts_id ) { 
                    $post = get_page($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }
            echo '</div>';
        }
    }

    function the_breadcrumb_projetos() {
        $sep = ' / ';
        if (!is_front_page()) {
        
        // Start the breadcrumb with a link to your homepage
            echo '<div class="breadcrumbs">';
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo '</a>' . $sep . '<a href="'.site_url().'/?post_type=projeto">Projetos</a>';
        
        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
            if (is_category() || is_single() ){
                    the_category(' / ');
            } elseif (is_archive() || is_single()){
                if ( is_day() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
                } elseif ( is_year() ) {
                    printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
                } else {
                    _e( 'Blog Archives', 'text_domain' );
                }
            }
        
        // If the current page is a single post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }
        
        // If the current page is a static page, show its title.
            if (is_page()) {
                echo the_title();
            }
        
        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()){
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ( $page_for_posts_id ) { 
                    $post = get_page($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }
            echo '</div>';
        }
    }

    // set post view
    function wpb_set_post_views($postID) {
        $count_key = 'wpb_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
    //To keep the count accurate, lets get rid of prefetching
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

    function wpb_get_post_views($postID){
        $count_key = 'wpb_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 View";
        }
        return $count.' Views';
    }

    add_action('save_post', 'title_to_meta');

    function title_to_meta($post_id)
    {
        update_post_meta($post_id, 'title', get_the_title($post_id)); 
    }
    
  

?>