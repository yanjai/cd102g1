<?php
ob_start();
session_start();
try{
  require_once("../connectcd102g1.php");
  $sql = "select * from adminmag where adminId = :adminId and adminPsw = :adminPsw";
  $admin = $pdo->prepare( $sql );
  $admin->bindValue(":adminId", $_REQUEST["adminId"]);
  $admin->bindValue(":adminPsw", $_REQUEST["adminPsw"]);
  $admin->execute();
  $adminRow = $admin->fetch(PDO::FETCH_ASSOC);
  if( $admin->rowCount()==0){ //查無此人
    // echo "0";
    $_SESSION['qqlevel'] = 0;
    header("Location:../backLogin.php");
  }elseif($adminRow['adminLevel']==2){ 
    $_SESSION['qqlevel'] = 1;
    header("Location:../backLogin.php");
  }else{
    if(isset($_SESSION['qqlevel'])){
      unset($_SESSION['qqlevel']);
    }
    $_SESSION["adminNo"] = $adminRow["adminNo"];
  	$_SESSION["adminId"] = $adminRow["adminId"];
  	$_SESSION["adminName"] = $adminRow["adminName"];
  	// $_SESSION["email"] = $adminRow["email"];
    //送出登入者的姓名資料
    echo $adminRow["adminName"];
    if($_REQUEST['rwd']==0){
      header("Location:../custoFormatMag.php");
    }else{
      header("Location:../actQrcodeCheck.php?ActQrderNo=".$_SESSION['ActOrderNo']);
    }
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>