<?php
  require_once('db.php');
  class DBGoods extends DB {
    public function InsertGoods() {
      $sql = "insert into goods values(?,?,?)";
      $array = array($_POST['GoodsID'],$_POST['GoodsName'],$_POST['Price']);
      parent::executeSQL($sql,$array);
    }

    public function SelectGoodsAll() {
      $sql = "select * from goods";
      $res = parent::executeSQL($sql,null);
      $records = "<table>\n";
      while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $records .= <<< EOF
          <tr>
            <td>{$row['GoodsID']}</td>
            <td>{$row['GoodsName']}</td>
            <td>{$row['Price']}</td>
          </tr>\n
EOF;
      }
      $records .= "</table>\n";
      return $records;
    }
  }
?>
