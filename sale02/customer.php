<?php
  require_once('DBCustomer.php');
  $dbCustomer = new DBCustomer();
  //更新処理
  if(isset($_POST['submitUpdate'])) {
    $dbCustomer->UpdateCustomer();
  }
  //更新用フォーム要素の表示
  if(isset($_POST['update'])){
    //更新対象の値を取得
    $dbCustomerID = $_POST['id'];
    $dbCustomerName = $dbCustomer->CustomerNameForUpdate($_POST['id']);
    $tel = $dbCustomer->TELForUpdate($_POST['id']);
    $email = $dbCustomer->EmailForUpdate($_POST['id']);
    //クラスを記述することで表示/非表示
    $entryCss = "class='hideArea'";
    $updateCss = "";
  } else {
    $entryCss = "";
    $updateCss = "class='hideArea'";
  }
  //削除処理
  if(isset($_POST['delete'])) {
    $dbCustomer->DeleteCustomer($_POST['id']);
  }
  //新規登録処理
  if(isset($_POST['submitEntry'])) {
    $dbCustomer->InsertCustomer();
  }
  //全レコードの表示
  $data = $dbCustomer->SelectCustomerAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>売上管理システム</title>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript">
    function CheckDelete() {
      return confirm("削除してもよろしいですか？");
    }
  </script>
</head>
<body>
  <div id="menu">
    <ul>
      <li><a href="salesinfo.php">売上情報</a></li>
      <li><a href="salesinfoEntry.php">伝票の新規作成</a></li>
      <li><a href="bill.php">請求書</a></li>
      <li><a href="customer.php">顧客マスタ</a></li>
      <li><a href="goods.php">商品マスタ</a></li>
    </ul>
  </div>
  <h1>商品マスタ</h1>
  <div id="entry" <?php echo $entryCss?>>
    <form action="" method="post">
      <h2>新規登録</h2>
      <label><span class="entrylabel">ID</span><input type="text" name="CustomerID" size="10" required></label>
      <label><span class="entrylabel">顧客名</span><input type="text" name="CustomerName" size="30" required></label>
      <label><span class="entrylabel">TEL</span><input type="tel" name="TEL" size="15"></label>
      <label><span class="entrylabel">Email</span><input type="mail" name="Email" size="40"></label>
      <input type="submit" name="submitEntry" value=" 新規登録 ">
    </form>
  </div>
  <div id="update" <?php echo $updateCss; ?>>
    <form action="" method="post">
      <h2>更新</h2>
      <p>CustomerID： <?php echo $dbCustomerId; ?></p>
      <input type="hidden" name="CustomerID" value="<?php echo $dbCustomerID; ?>">
      <label><span class="entrylabel">顧客名</span><input type="text" name="CustomerName" size="30" value="<?php echo $dbCustomerName; ?>" required></label>
      <label><span class="entrylabel">TEL</span><input type="tel" name="TEL" size="15" value="<?php echo $tel; ?>"></label>
      <label><span class="entrylabel">Email</span><input type="mail" name="Email" size="40" value="<?php echo $email; ?>"></label>
      <input type="submit" name="submitUpdate" value=" 更新 ">
    </form>
  </div>
  <div>
    <?php echo $data; ?>
  </div>
</body>
</html>
