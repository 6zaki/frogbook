<?php
  $res = "";
  $user = 'root';
  $pw = "suwawachan";
  $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
  $pdo = new PDO($dnsinfo, $user, $pw);
  //任意のレコードの更新ボタンがクリックされたときの処理
  if(isset($_POST['update'])) {
    try {
      $sql = "select * from goods where GoodsID=?";
      $stmt = $pdo->prepare($sql);
      $array = array($_POST['id']);
      $stmt->execute($array);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $GoodsID = $row['GoodsID'];
      $GoodsName = $row['GoodsName'];
      $Price = $row['Price'];
    } catch(Exception $e) {
      $res = $e->getMessage();
    }
  }
  //全レコードを更新ボタン付で表示する処理
  try {
    $sql = "select * from goods";
    $stmt = $pdo->prepare($sql);
    $array = null;
    $stmt->execute($array);
    $res = "<table>\n";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $res .= <<< EOF
        <tr>
          <td>{$row['GoodsID']}</td>
          <td>{$row['GoodsName']}</td>
          <td><form action="" method="post">
            <input type="hidden" name="id" value="{$row['GoodsID']}">
            <input type="submit" name="update" value=" 更新 ">
          </form></td>
        </tr>\n
EOF;
    }
    $res .= "</table>\n";
  } catch(Exception $e) {
    $res = $e->getMessage();
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
    <h1>商品マスタの更新</h1>
    <?php if(isset($_POST['update'])){ ?>
    <form action="" method="post">
      <p>GoodsID：<?php echo $GoodsID;?></p>
      <label>GoodsName<input type="text" name="GoodsName" size="30" value="<?php echo $GoodsName;?>" required></label>
      <label>Price<input type="text" name="Price" size="10" value="<?php echo $Price;?>" required></label>
      <input type="submit" name="submit" value=" 更新 ">
    </form>
    <?php } ?>
    <?php echo $res; ?>
</body>
</html>
