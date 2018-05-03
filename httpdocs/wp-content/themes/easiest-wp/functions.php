<?PHP

//ログ・デバッグ管理用のオリジナル関数
require_once('/Users/kamogashiratsuyoshi/Dropbox/_local_mamp/my_functions/kamo_mlog/kamo_mlog.php');
$log = new Mlog();
//end


//スタイルシートの読み込み
function k_load_scripts(){
    wp_enqueue_style('custom-wp-style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts' , 'k_load_scripts');

//タイトルタグの設定
//テーマサポートを追加
function easistwp_setup(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme','easistwp_setup');
