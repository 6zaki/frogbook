<?php
  $user = 'root';
  $pw = 'suwawachan';
  $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
  try {
    $pdo = new PDO($dnsinfo, $user, $pw);
    $sql = "insert into goods values('1999','神秘的な鉛筆','300')";
    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute(null);
//    $res = "接続しました";
  } catch(PDOException $e) {
    $res = $e->getMessage();
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
  <?php
    if($res == true) {
      echo "OK!";
    } else if($res == false) {
      echo "NGだよ！";
    }
    ?>
</body>
</html>
