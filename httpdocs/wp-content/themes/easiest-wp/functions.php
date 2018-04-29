<?PHP
//オリジナル関数 stylesheetload_scripts を作成
function k_load_script(){
    wp_enqueue_style('my_mainstyle',get_stylesheet_directory_uri());
}
add_action('wp_enqueue_scripts','k_load_script');
