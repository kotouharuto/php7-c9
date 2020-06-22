<?php
define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '/Applications/MAMP/htdocs/php7-c9/php_libs/init.php';

$smarty = new Smarty;
$smarty->template_dir = _SMARTY_TEMPLATES_DIR;
$smarty->compile_dir  = _SMARTY_TEMPLATES_C_DIR;
$smarty->config_dir   = _SMARTY_CONFIG_DIR;
$smarty->cache_dir    = _SMARTY_CACHE_DIR;

// Authクラスの読み込み
$auth = new Auth;
$auth->set_authname(_MEMBER_AUTHINFO);
$auth->set_sessname(_MEMBER_SESSNAME);
$auth->start();

if(!empty($_POST['type']) && $_POST['type'] == 'authenticate') {
    //認証機能

    //DBに接続
    $db_user = "root";
    $db_pass = "root";
    $db_host = "localhost";
    $db_name = "sample";
    $db_type = "mysql";
    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    try {
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('エラー：' .$Exception->getMessage());
    }

    //ユーザーネームで検索
    $userdata = [];
    try {
        $sql = "SELECT * FROM member WHERE username = :username";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':username', $_POST['username'], PDO::PARAM_STR); //ユーザーネームを指定
        $stmh->execute(); //検索を実行
        while($row = $stmh->fatch(PDO::FETCH_ASSOC)) { //配列のデータを格納
            foreach($row as $key) {
                $userdata[$key] = $value;
            }
        }
    } catch (PDOException $Exception) {
        print 'エラー：' .$Exception->getMessage();
    }

    if(!empty($userdate['password']) && $auth->check_password($_POST['password'], $userdata['password'])) { //パスワードを比較
        $auth->auth_ok($userdata);
    } else {
        //何もしません
    }
}
