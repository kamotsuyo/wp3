<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'db_wordpress_3');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'kam_admin');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'hoge1234');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[Itc>VuPm?v/zsL~[4RbITp6n-D?i.i2Z4cSR]a~:]$2Kh,!C2@ZJ9~1@1S0S3?O');
define('SECURE_AUTH_KEY',  'x~s--]^p<>>%j+L WX+<xsBE)g{3-*QD&aBh?@0MV15}w}*LJXj{9~KM6sCPgz$x');
define('LOGGED_IN_KEY',    'rFZyjFXR>GKMGA)-<y%O)<hhT%e=t(nmKCG%vq|.1Dy0a@FCp79Ex>D2-,;1bGG>');
define('NONCE_KEY',        '9Eg#F?wQsGr0q8Zcs.t17&+wu u2r}f@#o5MO#1p3f;kcy29Y,xvm94p-0Je%.wZ');
define('AUTH_SALT',        'V0 pUp!Thb`v6Jz3E6z:}|/~cur<Q&P*AARi>`4yje_w5DHPj0:B=o1i3<jL*wBO');
define('SECURE_AUTH_SALT', 'A0G]-5B?31=&)&NR/SV3nNr11SMPgU&]2WaB?C0H#8l}QPw@kEayWh/9)*L3Z2Hg');
define('LOGGED_IN_SALT',   'VlW{jr;&R G?Qov%0_L/hyK@{~.r)fOuZ9Yv}3H!Ga:2s<HgrvU@kXo;BqO5IHCk');
define('NONCE_SALT',       '_=+49{mf,R[JOX~tk1[,=KV[:v-(y4uf8]*C*qlZ7}~%67<P_pgm!&J*BB1sOMa|');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
//デバッグモードをtrueに変更
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
