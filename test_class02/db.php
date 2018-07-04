<?php
  class DB{
    //MySQLとやりとりをするクラス
    private $user ="root";
    private $pw = "suwawachan";
    private $dns = "mysql:dbname=salemanagement;host=localhost;charset=utf8";

    private function Connectdb() {
      //PDOのインスタンスを生成する（接続を担当する）関数
      try {
        $pdo = new PDO($this->dns, $this->user, $this->pw);
        return $pdo;
      } catch(Exception $e) {
        return false;
      }
    }

    public function executeSQL($sql,$array) {
      //SQLを実行する関数
      try {
        if(!$pdo = $this->Connectdb()) return false;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($array);
        return $stmt;
      } catch(Exception $e) {
        return falese; //戻り値はPDOStatementのインスタンス
      }
    }
  }
?>
