<?php
  require('DBSalesinfo.php');
  $slip = "";
  $SalesDate = new DateTime('NOW', new DateTimeZone('Asia/Tokyo'));
  $SalesDate = $SalesDate->format('Y-m-d');
  $CustomerID = "";
  $dbSalesInfo = new DbSalesInfo();
  //商品名リストの作成
  $GoodsList = $dbSalesInfo->ListGoods();
  if(isset($_POST['submit'])) {
    //新規登録処理
    $SalesDate = $_POST['SalesDate'];
    $CustomerID = $_POST['CustomerID'];
    $dbSalesInfo->InsertSalesinfo();
    //新規登録後だけ登録データを表示
    $slip = $dbSalesInfo->SelectSalesinfo($SalesDate, $CustomerID);
    //顧客名リストの作成（選択者を表示）
    $CustomerList = $dbSalesInfo->ListCustomerWithSelected($CustomerID);
  } else {
    //顧客名リストとの作成
    $CustomerList = $dbSalesInfo->ListCustomer();
  }
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
  <h1>売上伝票の新規作成</h1>
  <div id="entry">
    <form action="" method="post">
      <label>日付<input type="date" id="SalesDate" name="SalesDate" value="<?php echo $SalesDate; ?>" required></label>
      <label>顧客名<?php echo $CustomerList; ?></label>
      <label>商品名<?php echo $GoodsList; ?></label>
      <label>数量<input type="number" min="0" id="Quantity" name="Quantity" required></label>
      <input type="submit" value=" 登録 " name="submit">
    </form>
  </div>
  <div class="ClearFloat">
    <?php echo $slip; ?>
  </div>
</body>
</html>
