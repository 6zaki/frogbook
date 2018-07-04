<?php
  $user = 'root';
  $pw = 'suwawachan';
  $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
  try {
    $pdo = new PDO($dnsinfo, $user, $pw);
    $sql = "select * from goods where GoodsID=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('1003'));
    $res .= "<table>\n";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $res .= <<< EOF
        <tr>
          <td>{$row['GoodsID']}</td>
          <td>{$row['GoodsName']}</td>
          <td>{$row['Price']}</td>
        </tr>
EOF;
    $res .= "</table>\n";
    }
  } catch(Exception $e) {
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
  <h1>PHPでMySQLに接続する</h1>
  <?php echo $res; ?>
</body>
</html>
