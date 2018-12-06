<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>

<?php 

$memNo = $_SESSION["memNo"];
require_once("connectcd102g1.php");
switch($_FILES['upfile']['error']){
  case UPLOAD_ERR_OK:
    if( file_exists("images//")===false){
    	mkdir("images//");
    }
    $from = $_FILES['upfile']['tmp_name'];
    $fileto =pathinfo($_FILES['upfile']['name']);
    $filext = $fileto['basename'];
    $to = "images/{$filext}";
    $filname = "{$filext}";
    if(copy( $from, $to)){
      $memberfile = "UPDATE member SET memImg = '{$filname}' WHERE memNo = $memNo";
      $pdo->exec($memberfile);
      $_SESSION["memImg"] = $filname;       
    	// echo "<a href='memUpdate.php'>上傳大頭照成功</a>";
      // 回個人頁面

      //alert('上傳大頭照成功!')
      echo "<script>
            window.location.href='memUpdate.php';
          </script>";
    }
    break;
  case UPLOAD_ERR_INI_SIZE:
    echo "上傳檔案太大，不得超過", ini_get("upload_max_filesize"),"<br>";
    break;
  case UPLOAD_ERR_FORM_SIZE:
    echo "上傳檔案太大，不得超過",  $_REQUEST["MAX_FILE_SIZE"],"<br>";
    break;
  case UPLOAD_ERR_PARTIAL:
    echo "上傳失敗，請重新上傳檔案<br>";
    break;
  case UPLOAD_ERR_NO_FILE:
    echo "echo 未上傳檔案太大<br>";
}

?>

</body>
</html>