<?php 
 
function scripts() {
    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('style');

    wp_enqueue_script('jquery');

    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');
}

add_action('wp_enqueue_scripts', 'scripts');


// Adding New Custom Post Type

/*Custom Post type start*/
function custom_post_type_months() {
    $supports = array(
        'title', // post title
        'author', // post author
        'custom-fields', // custom fields
        'revisions', // post revisions
    );

    $labels = array(
        'name' => _x('Mėnesiai', 'plural'),
        'singular_name' => _x('menesiai', 'singular'),
        'menu_name' => _x('Mėnesiai', 'admin menu'),
        'name_admin_bar' => _x('menesiai', 'admin bar'),
        'add_new' => _x('Naujas mėnuo', 'add new'),
        'add_new_item' => __('Pridėti naują mėnesį'),
        'new_item' => __('Naujas mėnuo'),
        'edit_item' => __('Redaguoti mėnesį'),
        'view_item' => __('Žiūrėti mėnesius'),
        'all_items' => __('Visi mėnesiai'),
        'search_items' => __('Ieškoti mėnesių'),
        'not_found' => __('Mėnesis nerastas'),
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'menesis'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('menesis', $args);
}

add_action('init', 'custom_post_type_months');


