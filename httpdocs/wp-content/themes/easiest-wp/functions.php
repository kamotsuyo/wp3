<?PHP

function k_load_scripts(){
    wp_enqueue_style(‘mainstyle’ , get_stylesheet_uri());
}

add_action('wp_enqueue_scripts' , 'k_load_scripts');
