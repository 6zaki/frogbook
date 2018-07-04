<?php
  require_once('db.php');
  $db = new DB();
  $sql = "select * from goods";
  $res = $db->executeSQL($sql,null);
  $recordist = "<table>\n";
  while($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $recordist .= <<< EOF
      <tr>
        <td>{$row['GoodsID']}</td>
        <td>{$row['GoodsName']}</td>
        <td>{$row['Price']}</td>
      </tr>
EOF;
  }
  $recordist .= "</table>\n";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>クラスの活用</title>
</head>
<body>
  <h1>goodsマスターテーブル</h1>
  <?php echo $recordist; ?>
  <td></td>
</body>
</html>
