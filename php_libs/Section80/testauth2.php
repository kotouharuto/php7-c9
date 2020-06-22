<?php
define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs/init.php';

$smarty = new Smarty;
$smarty->template_dir = _SMARTY_TEMPLATES_DIR;
$smarty->compile_dir  = _SMARTY_TEMPLATES_C_DIR;
$smarty->config_dir   = _SMARTY_CONFIG_DIR;
$smarty->cache_dir    = _SMARTY_CACHE_DIR;

// Authクラスの読み込み
$auth = new Auth;
$auth->set_authname(_MEMBER_AUTHINFO);
$auth->set_authname(_MEMBER_SESSNAME);
$auth->start();

if(!empty($_POST['type']) && $_POST['type'] == 'authenticate') {
    //認証機能
    if($_POST['username'] == 'user' && $_POST['password'] == 'pass') {
        $_SESSION[$auth->get_authname()]['id'] = 1; //数値なら何でもOK
    }
} else if(!empty($_GET['type']) && $_GET['type'] == 'logout') {
    $auth->logout();
}

if($auth->check()) {
    //認証済み
} else {
    //未認証
}