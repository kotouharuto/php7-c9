<?php
/**
 * Description of MemberModel
 *
 * @author nagatayorinobu
 */
require_once "BaseModel.php";
class MemberModel extends BaseModel {
    //ユーザーネームをキーに検索
    public function get_authinfo($username) {
        $data = [];
        try {
            $sql = "SELECT * FROM member WHERE username = :username";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username', $username, PDO::ATTR_STR);
            $stmh->excute();
            while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    $data[$key] = $value; 
                }
            }
        } catch (PDOException $Exception) {
            print "エラー：" .$Exception->getMessage();
        }
        return $data;
    }
}