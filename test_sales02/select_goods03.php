<?php
  $res = "";
  $user = 'root';
  $pw = 'suwawachan';
  $dnsinfo = "mysql:dbname=salemanagement;host=localhost;charset=utf8";
  $pdo = new PDO($dnsinfo, $user, $pw);
  //selectタグを生成
  $sql = "select GoodsID, GoodsName from goods";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(null);
  $selectTag = "<select name='GoodsID'>\n";
  $selectTag .= "<option value=''>選択してください</option>\n";
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $selectTag .= <<< EOF
      <option value="{$row['GoodsID']}">
        {$row['GoodsName']}
      </option>
EOF;
  }
  $selectTag .= "</select>";
  //レコードの選択
  if(isset($_POST['select'])) {
    try {
      $sql = "select * from goods where GoodsID=?";
      $stmt = $pdo->prepare($sql);
      $array = array($_POST['GoodsID']);
      $stmt->execute($array);
      $res = "<table>\n";
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res .= <<< EOF
          <tr>
            <td>{$row['GoodsID']}</td>
            <td>{$row['GoodsName']}</td>
            <td>{$row['Price']}</td>
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
  <title>PHPを始めよう</title>
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
  <h1>商品マスタの選択</h1>
  <form action="" method="post">
    <label>GoodeID<?php echo $selectTag; ?></label>
    <input type="submit" name="select" value=" 表示 ">
  </form>
  <?php echo $res; ?>
</body>
</html>
