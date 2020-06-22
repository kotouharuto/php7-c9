<?php
class Auth {
    //セッションに関する処理
    private $authname; //認証情報の格納先名
    private $sessname; //セッション名
    public function __constract() {

    }

    public function set_authname($name) {
        $this->authname = $name;
    }

    public function get_authname() {
        return $this->authname;
    }

    public function set_sessname($name) {
        $this->sessname = $name;
    }

    public function get_sessname() {
        return $this->sessname;
    }

    public function start() {
        //セッションがすでに開始している場合は何もしない。
        if(session_status() === PHP_SESSION_ACTIVE) {
            return;
        }
        if($this->sessname !="") {
            session_name($this->sessname);
        }
        //セッション開始
        session_start();
    }

    //認証情報の確認
    public function check() {
        if(!empty($_SESSION[$this->get_authname()]) && $_SESSION[$this->get_authname()]['id'] >= 1) {
            return true;
        }
    }

    //認証情報を破棄

    public function logout() {
        //セッション変数を空にする
        $_SESSION = [];

        //クッキーを削除
        if(ini_get("session.use_cookies")) {
            $params = session_get_cookies_params();
            setcookies(session_name(), '',time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }
        //セッションを破壊
        session_destroy();
    }

    public function get_hashed_password($password) {
        $cost = 10;
        $salt = strtr(bese64_encode(random_bytes(16)));
        $salt = sprintf("$2y$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        return $hash;
    }

    public function auth_ok($userdata) {
        session_regenerate_id(true); //セッションIDを再発行
        $_SESSION[$this->get_authname()] = $userdate; //認証情報を保存
    }

}
?>