<?php
  $res ="";
  $user = 'root';
  $pw = 'suwawachan';
  $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
  $pdo = new PDO($dnsinfo, $user, $pw);
  if(isset($_POST['insert'])) {
    try {
      $sql = "insert into goods values(?,?,?)";
      $stmt = $pdo->prepare($sql);
      $array = array($_POST['GoodsID'], $_POST['GoodsName'], $_POST['Price']);
      $res = $stmt->execute($array);
    } catch (Exception $e) {
      $res = $e->getMessage();
    }
  }
  $sql = "select * from goods";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(null);
  $res = "<table>\n";
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $res .= <<< EOF
      <tr>
        <td>{$row['GoodsID']}</td>
        <td>{$row['GoodsName']}</td>
        <td>{$row['Price']}</td>
      </tr>\n
EOF;
  }
  $res .= "</table>\n";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>売上管理システム</title>
  <style media="screen">
    table {
      border-collapse: collapse;
    }
    td {
      border: 1px solid #ccc;
      padding: 3px 5px;
    }
  </style>
</head>
<body>
  <h1>商品マスタの登録</h1>
  <form action="" method="POST">
    <label>GoodsID<input type="text" name="GoodsID" size="20" required></label>
    <label>GoodsName<input type="text" name="GoodsName" size="40" required></label>
    <label>Price<input type="text" name="Price" size="20" required></label>
    <input type="submit" name="insert" value=" 登録 ">
  </form>
  <?php echo $res; ?>
</body>
</html>
