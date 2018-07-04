<?php
  $user = 'root';
  $pw = 'suwawachan';
  $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
  try {
    $pdo = new PDO($dnsinfo, $user, $pw);
    $sql = "update goods set Price=? where GoodsID=?";
    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute(array(1080, '1999'));
    if($res) {
      $res = "<p>更新しました</p>\n";
    }
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>始めようphp</title>
</head>
<body>
  <h1>PHPでMySQLに接続する</h1>
  <?php echo $res; ?>
</body>
</html>
