<?php
  require_once ('db.php');
  class DBGoods extends DB{
    //goodsテーブルのCRUD担当
    public function SelectGoodsAll() {
      $sql = "select * from goods";
      $res = parent::executeSQL($sql,null);
      $data = "<table class='recordlist' id='goodsTable'>\n";
      $data .= "<tr><th>ID</th><th>商品名</th><th>単価</th><th></th><th></th></tr>\n";
      foreach($rows = $res->fetchAll(PDO::FETCH_NUM) as $row) {
        $data .= "<tr>";
        for($i=0; $i<count($row);$i++) {
          $data .= "<td>{$row[$i]}</td>";
        }
        //更新ボタンのコード
        $data .= <<< EOF
          <td><form action="" method="post">
            <input type="hidden" name="id" value="{$row[0]}">
            <input type="submit" name="update" value=" 更新 ">
          </form></td>
EOF;
        //削除ボタンのコード
        $data .= <<< EOF
          <td><form action="" method="post">
            <input type="hidden" name="id" id="Delete" value="{$row[0]}">
            <input type="submit" name="delete" id="delete" value=" 削除 " onClick="return CheckDelete()">
          </form></td>
EOF;
        $date .= "</tr>\n";
      }
      $data .= "</table>\n";
      return $data;
    }

    public function InsertGoods() {
      $sql = "insert into goods values(?,?,?)";
      $array = array($_POST['GoodsID'],$_POST['GoodsName'],$_POST['Price']);
      parent::executeSQL($sql,$array);
    }

    public function UpdateGoods() {
      $sql = "update goods set GoodsName=?, Price=? where GoodsID=?";
      //array関数の引数の順番に注意する
      $array = array($_POST['GoodsName'],$_POST['Price'],$_POST['GoodsID']);
      parent::executeSQL($sql,$array);
    }

    public function GoodsNameForUpdate($GoodsID) {
      return $this->FieldValueForUpdate($GoodsID, "GoodsName");
    }

    public function PriceForUpdate($GoodsID) {
      return $this->FieldValueForUpdate($GoodsID, "Price");
    }

    private function FieldValueForUpdate($GoodsID, $field) {
      //private関数　上の2つの関数で使用している
      $sql = "select {$field} from goods where GoodsID=?";
      $array = array($GoodsID);
      $res = parent::executeSQL($sql, $array);
      $rows = $res->fetch(PDO::FETCH_NUM);
      return $rows[0];
    }

    public function DeleteGoods($GoodsID) {
      $sql = "delete from goods where GoodsID=?";
      $array = array($GoodsID);
      parent::executeSQL($sql, $array);
    }
  }
?>
