<?php
  $res = "";
  if(isset($_POST['select'])) {
    $user = 'root';
    $pw = 'suwawachan';
    $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
    try {
      $pdo = new PDO($dnsinfo, $user, $pw);
      $sql = "select * from goods where GoodsID=?";
      $stmt = $pdo->prepare($sql);
      $array = array($_POST['GoodsID']);
      $stmt->execute($array);
      $res = "<table>\n";
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res .= <<< EOF
          <tr>
            <td>{$row['GoodsID']}</td>
            <td>{$row['GoodsName']}</td>
          </tr>\n
EOF;
      }
      $res .= "</table>\n";
    } catch(Exception $e) {
      $res = $e->getMessage();
    }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>売上管理システム</title>
</head>
<body>
  <h1>商品マスタの選択</h1>
  <form action="" method="post">
    <label>GoodsID<input type="text" name="GoodsID" size="20" required></label>
    <input type="submit" name="select" value=" 表示 ">
  </form>
  <?php echo $res; ?>
</body>
</html>
