<?php
  require_once ('func.php');
  $res = "";
  if(isset($_POST['submit'])) {
    $res = JadgeEventOdd($_POST['submit']);
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>初めてのクラス</title>
</head>
<body>
  <h1>Classの確認</h1>
  <form action="" method="post">
    <label>数字を入力<input type="text" name="num" required></label>
    <input type="submit" value=" 判定 " name="submit" />
  </form>
  <?php echo $res; ?>
</body>
</html>
