<?php
print_r($_POST);
if(isset($_POST['exe'])) {
  $name = $_POST['username'];
  $name = "<p>weblcome！{$name}さんですね！</p>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>動的なwebページの作成</title>
</head>
<body>
  <h1>動的なwebページの作成</h1>
  <form action="" method="post">
    <label>名前<input type="text" name="username" required></label>
    <input type="submit" name="exe" value="実行">
  </form>
  <?php echo $name; ?>
</body>
</html>
