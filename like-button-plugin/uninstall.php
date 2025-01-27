<?php

// ファイルへの直接アクセスした場合は終了する
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}


// プラグインがアンインストールされる場合のみ実行されるようにする
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// いいねカウントメタデータを削除する関数
function my_like_button_delete_plugin() {
    global $wpdb;

    // すべての投稿メタデータを削除
    $wpdb->query( "DELETE FROM {$wpdb->postmeta} WHERE meta_key = 'my_like_count'" );

    // 必要に応じて、プラグインで作成されたその他のオプションやデータを削除
    // もしオプションを削除する場合
    // delete_option('my_plugin_option');
}

// アンインストール時にクリーンアップ関数を呼び出す
my_like_button_delete_plugin();
?>
