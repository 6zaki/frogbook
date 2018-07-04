<?php
  require_once('db.php');
  $db = new DB();
  if(isset($_POST['insert'])) {
    $sql = "insert into goods values(?,?,?)";
    $array = array($_POST['GoodsID'],$_POST['GoodsName'],$_POST['Price']);
    $db->executeSQL($sql,$array);
  }
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
  <form action="" method="post">
    <label>GoodsID<input type="text" name="GoodsID" size="8" required></label>
    <label>GoodsName<input type="text" name="GoodsName" size="30" required></label>
    <label>Price<input type="text" name="Price" size="8" required></label>
    <input type="submit" name="insert" value=" 登録 ">
  </form>
  <hr>
  <?php echo $recordist; ?>
</body>
</html>
