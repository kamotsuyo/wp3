<?PHP

function hoge_scripts(){
    wp_enqueue_style(‘mainstyle’ , get_stylesheet_uri());
}

add_action('wp_enqueue_scripts' , 'hoge_scripts');