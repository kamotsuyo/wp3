<?PHP

function k_load_scripts(){
    wp_enqueue_style('custom-wp-style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts' , 'k_load_scripts');


$log = new Mlog();
$log->write('funtions.php ok',Mlog::OK);
$log->var_dump(debug_backtrace());