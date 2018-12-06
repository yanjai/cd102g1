<?php
try{
  require_once("connectcd102g1.php");
  $sql = "select memId from member where memId = ?";
  $member = $pdo->prepare($sql);
  $member->bindValue(1, $_REQUEST["memId"]);
  $member->execute();
  if( $member->rowCount() === 0){
    echo "帳號可使用";
  }else{ //找得到
    echo "帳號已存在";
  }
}catch(PDOException $e){
  echo "server error";
}
?>