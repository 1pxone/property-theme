<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';


flush_rewrite_rules( false );

if ( ! function_exists( 'houses_cp' ) ) {

// Опишем требуемый функционал
    function houses_cp() {

        $labels = array(
            'name'                => _x( 'Дома аренда', 'Post Type General Name', 'houses' ),
            'singular_name'       => _x( 'Дома аренда', 'Post Type Singular Name', 'houses' ),
            'menu_name'           => __( 'Дома аренда', 'houses' ),
            'parent_item_colon'   => __( 'Родительский:', 'houses' ),
            'all_items'           => __( 'Все дома', 'houses' ),
            'view_item'           => __( 'Просмотреть', 'houses' ),
            'add_new_item'        => __( 'Добавить новый дом', 'houses' ),
            'add_new'             => __( 'Добавить новый дом', 'houses' ),
            'edit_item'           => __( 'Редактировать дом', 'houses' ),
            'update_item'         => __( 'Обновить дом', 'houses' ),
            'search_items'        => __( 'Найти дом', 'houses' ),
            'not_found'           => __( 'Не найдено', 'houses' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'houses' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail' ),
            'taxonomies'          => array( 'category' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 0,
            'menu_icon'           => 'dashicons-book',
            'rewrite'             => array('slug' => 'rent/houses'),
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest'       => true,
            'rest_base'          => 'houses',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );
        register_post_type( 'houses', $args );

    }

    add_action( 'init', 'houses_cp', 0 ); // инициализируем

}

if ( ! function_exists( 'houses_sale_cp' ) ) {

// Опишем требуемый функционал
    function houses_sale_cp() {

        $labels = array(
            'name'                => _x( 'Дома продажа', 'Post Type General Name', 'houses-sale' ),
            'singular_name'       => _x( 'Дома продажа', 'Post Type Singular Name', 'houses-sale' ),
            'menu_name'           => __( 'Дома продажа', 'houses-sale' ),
            'parent_item_colon'   => __( 'Родительский:', 'houses-sale' ),
            'all_items'           => __( 'Все дома', 'houses-sale' ),
            'view_item'           => __( 'Просмотреть', 'houses-sale' ),
            'add_new_item'        => __( 'Добавить новый дом', 'houses-sale' ),
            'add_new'             => __( 'Добавить новый дом', 'houses-sale' ),
            'edit_item'           => __( 'Редактировать дом', 'houses-sale' ),
            'update_item'         => __( 'Обновить дом', 'houses-sale' ),
            'search_items'        => __( 'Найти дом', 'houses-sale' ),
            'not_found'           => __( 'Не найдено', 'houses-sale' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'houses-sale' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail' ),
            'taxonomies'          => array( 'category' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 0,
            'menu_icon'           => 'dashicons-book',
            'rewrite'             => array('slug' => 'sale/houses'),
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest'       => true,
            'rest_base'          => 'houses-sale',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );
        register_post_type( 'houses-sale', $args );

    }

    add_action( 'init', 'houses_sale_cp', 0 ); // инициализируем

}

if ( ! function_exists( 'townhouses_cp' ) ) {

// Опишем требуемый функционал
    function townhouses_cp() {

        $labels = array(
            'name'                => _x( 'Таунхаусы аренда', 'Post Type General Name', 'townhouses' ),
            'singular_name'       => _x( 'Таунхаусы аренда', 'Post Type Singular Name', 'townhouses' ),
            'menu_name'           => __( 'Таунхаусы аренда', 'townhouses' ),
            'parent_item_colon'   => __( 'Родительский:', 'townhouses' ),
            'all_items'           => __( 'Все таунхаусы', 'townhouses' ),
            'view_item'           => __( 'Просмотреть', 'townhouses' ),
            'add_new_item'        => __( 'Добавить новый таунхаус', 'townhouses' ),
            'add_new'             => __( 'Добавить новый таунхаус', 'townhouses' ),
            'edit_item'           => __( 'Редактировать таунхаус', 'townhouses' ),
            'update_item'         => __( 'Обновить таунхаус', 'townhouses' ),
            'search_items'        => __( 'Найти таунхаус', 'townhouses' ),
            'not_found'           => __( 'Не найдено', 'townhouses' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'townhouses' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail' ),
            'taxonomies'          => array( 'category' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 0,
            'menu_icon'           => 'dashicons-book',
            'rewrite'             => array('slug' => 'rent/townhouses'),
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest'       => true,
            'rest_base'          => 'townhouses',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );
        register_post_type( 'townhouses', $args );

    }

    add_action( 'init', 'townhouses_cp', 0 ); // инициализируем

}


if ( ! function_exists( 'townhouses_sale_cp' ) ) {

// Опишем требуемый функционал
    function townhouses_sale_cp() {

        $labels = array(
            'name'                => _x( 'Таунхаусы продажа', 'Post Type General Name', 'townhouses-sale' ),
            'singular_name'       => _x( 'Таунхаусы продажа', 'Post Type Singular Name', 'townhouses-sale' ),
            'menu_name'           => __( 'Таунхаусы продажа', 'townhouses-sale' ),
            'parent_item_colon'   => __( 'Родительский:', 'townhouses-sale' ),
            'all_items'           => __( 'Все Таунхаусы продажа', 'townhouses-sale' ),
            'view_item'           => __( 'Просмотреть', 'townhouses-sale' ),
            'add_new_item'        => __( 'Добавить новый таунхаус', 'townhouses-sale' ),
            'add_new'             => __( 'Добавить новый таунхаус', 'townhouses-sale' ),
            'edit_item'           => __( 'Редактировать таунхаус', 'townhouses-sale' ),
            'update_item'         => __( 'Обновить таунхаус', 'townhouses-sale' ),
            'search_items'        => __( 'Найти таунхаус', 'townhouses-sale' ),
            'not_found'           => __( 'Не найдено', 'townhouses-sale' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'townhouses-sale' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail' ),
            'taxonomies'          => array( 'category' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 0,
            'menu_icon'           => 'dashicons-book',
            'rewrite'             => array('slug' => 'sale/townhouses'),
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest'       => true,
            'rest_base'          => 'townhouses-sale',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );
        register_post_type( 'townhouses-sale', $args );

    }

    add_action( 'init', 'townhouses_sale_cp', 0 ); // инициализируем

}



if ( ! function_exists( 'areas_cp' ) ) {

// Опишем требуемый функционал
    function areas_cp() {

        $labels = array(
            'name'                => _x( 'Участки аренда', 'Post Type General Name', 'areas' ),
            'singular_name'       => _x( 'Участки аренда', 'Post Type Singular Name', 'areas' ),
            'menu_name'           => __( 'Участки аренда', 'areas' ),
            'parent_item_colon'   => __( 'Родительский:', 'areas' ),
            'all_items'           => __( 'Все участки', 'areas' ),
            'view_item'           => __( 'Просмотреть', 'areas' ),
            'add_new_item'        => __( 'Добавить новый участок', 'areas' ),
            'add_new'             => __( 'Добавить новый участок', 'areas' ),
            'edit_item'           => __( 'Редактировать участок', 'areas' ),
            'update_item'         => __( 'Обновить участок', 'areas' ),
            'search_items'        => __( 'Найти участок', 'areas' ),
            'not_found'           => __( 'Не найдено', 'areas' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'areas' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail' ),
            'taxonomies'          => array( 'category' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 0,
            'menu_icon'           => 'dashicons-book',
            'rewrite'             => array('slug' => 'rent/areas'),
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest'       => true,
            'rest_base'          => 'areas',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );
        register_post_type( 'areas', $args );

    }

    add_action( 'init', 'areas_cp', 0 ); // инициализируем

}

if ( ! function_exists( 'areas_sale_cp' ) ) {

// Опишем требуемый функционал
    function areas_sale_cp() {

        $labels = array(
            'name'                => _x( 'Участки продажа', 'Post Type General Name', 'areas-sale' ),
            'singular_name'       => _x( 'Участки продажа', 'Post Type Singular Name', 'areas-sale' ),
            'menu_name'           => __( 'Участки продажа', 'areas-sale' ),
            'parent_item_colon'   => __( 'Родительский:', 'areas-sale' ),
            'all_items'           => __( 'Все Участки продажа', 'areas-sale' ),
            'view_item'           => __( 'Просмотреть', 'areas-sale' ),
            'add_new_item'        => __( 'Добавить новый участок', 'areas-sale' ),
            'add_new'             => __( 'Добавить новый участок', 'areas-sale' ),
            'edit_item'           => __( 'Редактировать участок', 'areas-sale' ),
            'update_item'         => __( 'Обновить участок', 'areas-sale' ),
            'search_items'        => __( 'Найти участок', 'areas-sale' ),
            'not_found'           => __( 'Не найдено', 'areas-sale' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'areas-sale' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail' ),
            'taxonomies'          => array( 'category' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 0,
            'menu_icon'           => 'dashicons-book',
            'rewrite'             => array('slug' => 'sale/areas'),
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest'       => true,
            'rest_base'          => 'areas-sale',
            'rest_controller_class' => 'WP_REST_Posts_Controller'
        );
        register_post_type( 'areas-sale', $args );

    }

    add_action( 'init', 'areas_sale_cp', 0 ); // инициализируем

}


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

function my_pre_get_posts( $query ) {

	// bail early if is in admin
	if( is_admin() ) return;


	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;


	// get meta query
	  $meta_query = $query->get('meta_query');
    $roadvalue = explode(',', $_GET['road']);
    $orderargs;

    if( isset($_GET['sortByDate']) && $_GET['sortByDate']){
        $orderargs = array(
            'date' => $_GET['sortByDate'] // ASC or DESC
        );
    };


    // Шоссе
    if( isset($_GET['road']) && $_GET['road']){
      $meta_query[]	=  array(
          'key'		=> 'шоссе',
          'value'		=> $roadvalue,
          'compare'	=> '='
        );
    };

    // Цена
    if( isset($_GET['price_min']) && $_GET['price_min'] && isset($_GET['price_max']) && $_GET['price_max']){
      $meta_query[]	=  array(
           'key'		=> 'price',
            'value'		=> array($_GET['price_min'], $_GET['price_max']),
            'compare'	=> 'BETWEEN'
        );
    } elseif (isset($_GET['price_min']) && $_GET['price_min'] && empty($_GET['price_max'])){
      $meta_query[]	=  array(
            'key'		=> 'price',
            'value'		=> $_GET['price_min'],
            'compare'	=> '>=',
        );
    } elseif (isset($_GET['price_max']) && $_GET['price_max'] && empty($_GET['price_min'])){
      $meta_query[]	=  array(
            'key'		=> 'price',
            'value'		=> $_GET['price_max'],
            'compare'	=> '<=',
        );
    };

    //Сотки
    if( isset($_GET['sot_min']) && $_GET['sot_min'] && isset($_GET['sot_max']) && $_GET['sot_max']){
      $meta_query[]	=  array(
           'key'		=> 'сотки',
            'value'		=> array($_GET['sot_min'], $_GET['sot_max']),
            'compare'	=> 'BETWEEN'
        );
    } elseif (isset($_GET['sot_min']) && $_GET['sot_min'] && empty($_GET['sot_max'])){
      $meta_query[]	=  array(
            'key'		=> 'сотки',
            'value'		=> $_GET['sot_min'],
            'compare'	=> '>=',
        );
    } elseif (isset($_GET['sot_max']) && $_GET['sot_max'] && empty($_GET['sot_min'])){
      $meta_query[]	=  array(
            'key'		=> 'сотки',
            'value'		=> $_GET['sot_max'],
            'compare'	=> '<=',
        );
    };

    //Площадь
    if( isset($_GET['area_min']) && $_GET['area_min'] && isset($_GET['area_max']) && $_GET['area_max']){
      $meta_query[]	=  array(
           'key'		=> 'площадь',
            'value'		=> array($_GET['area_min'], $_GET['area_max']),
            'compare'	=> 'BETWEEN'
        );
    } elseif (isset($_GET['area_min']) && $_GET['area_min'] && empty($_GET['area_max'])){
      $meta_query[]	=  array(
            'key'		=> 'площадь',
            'value'		=> $_GET['area_min'],
            'compare'	=> '>=',
        );
    } elseif (isset($_GET['area_max']) && $_GET['area_max'] && empty($_GET['area_min'])){
      $meta_query[]	=  array(
            'key'		=> 'площадь',
            'value'		=> $_GET['area_max'],
            'compare'	=> '<=',
        );
    };

    //Расстояние от макд
    if( isset($_GET['mkad_from']) && $_GET['mkad_from'] && isset($_GET['mkad_to']) && $_GET['mkad_to']){
      $meta_query[]	=  array(
           'key'		=> 'площадь',
            'value'		=> array($_GET['mkad_from'], $_GET['mkad_to']),
            'compare'	=> 'BETWEEN'
        );
    } elseif (isset($_GET['mkad_from']) && $_GET['mkad_from'] && empty($_GET['mkad_to'])){
      $meta_query[]	=  array(
            'key'		=> 'площадь',
            'value'		=> $_GET['mkad_from'],
            'compare'	=> '>=',
        );
    } elseif (isset($_GET['mkad_to']) && $_GET['mkad_to'] && empty($_GET['mkad_from'])){
      $meta_query[]	=  array(
            'key'		=> 'площадь',
            'value'		=> $_GET['mkad_to'],
            'compare'	=> '<=',
        );
    };
    $meta_query[]	= ['relation'=> 'AND'];







	// update meta query
	$query->set('meta_query', $meta_query);

    $query->set('orderby',$orderargs);
    $query->set('posts_per_page', '100');

};
