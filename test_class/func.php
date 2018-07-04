<?php
  function JadgeEventOdd($num) {
    if($_POST['num'] % 2 == 1) {
      return "奇数です";
    } else {
      return "偶数です";
    }
  }
?>
