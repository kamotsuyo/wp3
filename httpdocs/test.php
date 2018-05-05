<?php
/**
wordpressからdb接続のテスト
接続方法は wpdbクラスを使用する
参考:https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wpdb_Class#.E5.88.97.E6.83.85.E5.A0.B1.E3.81.AE.E5.8F.96.E5.BE.97

*/
require_once('wp-load.php');

global $wpdb;

//wp_postsテーブルから投稿記事のみを抽出する
$results=$wpdb->get_results("select * from wp_posts where post_status = 'publish' and post_type = 'post' ");


//結果セットからタイトルと内容をエコーする
for($i=0; $i<count($results);$i++){
    $low = $results[$i];
    echo $low->post_title .  "\n". $low->post_content . '<br/>' ;
}
