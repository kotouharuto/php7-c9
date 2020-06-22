<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseDbModel
 *
 * @author nagatayorinobu
 */

//BaseModelには接続処理だけが書かれる
class BaseModel {
  protected $pdo;

  public function __construct() {
    $this->db_connect();
  }

  private function db__connect() {
    try {
      $this->pdo = new PDO(_DSN, _DB_USER, _DB_PASS);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
      die('エラー：' .$Exception->getMessage());
    }
  }
}