<?php

function forgetPasswordEmail($memId, $email, $newMemPsw){
    require("./PHPMailer/class.phpmailer.php");

    //Send mail using gmail
    $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "seatunnel01group@gmail.com"; // =====GMAIL username
        $mail->Password = "seatunnel123"; // =====GMAIL password

    //Typical mail data
    $mail->AddAddress($email);//$email========收件者
    $mail->SetFrom("seatunnel01group@gmail.com");//========寄件者
    $mail->Subject = "sea Tunnel--忘記密碼";//========
    $mail->Body = $memId." 的 sea Tunnel 新密碼: ".$newMemPsw;//========

    try{
        $mail->Send();
        // echo "Success!請查看email並<a href='login.html'>重新輸入！</a>";
        // header("Location:login.html");
        echo "<script>alert('已寄送新密碼到信箱，請查看並重新登入！');location.href='seatunnel.php';</script>";
    } catch(Exception $e){
        //Something went bad
        echo "Fail - " . $mail->ErrorInfo;
    }
    sleep(1);
    // header("location:login.html");
}
?>

<?php
// 檢查會員
$memId = $_REQUEST["memId"];
try{
  require_once("connectcd102g1.php");
  $sql = "select * from member where memId = ?";
  $members = $pdo->prepare($sql);
  $members->bindValue(1,$memId);
  $members->execute();

  if($members->rowCount()==0){
    echo $memId."非會員，請<a href='memRegister.html'>註冊新帳號！</a>";
  }else{
        $memRow = $members->fetchObject();
        echo $memId." 準備發送新密碼 ";
        $newMemPsw=mt_rand(11111111,99999999);
        $sql = "update member set memPsw = ? where memId = ?";
        $members2 = $pdo->prepare($sql);
        $members2->bindValue(1,$newMemPsw);
        $members2->bindValue(2,$memId);
        $members2->execute();
        $email = $memRow->memEmail;
        echo "email:$email<br>";
        echo "newMemPsw:$newMemPsw<br>";
        forgetPasswordEmail($memId, $email, $newMemPsw);
  }
  
}catch(PDOException $ex){
  echo "資料庫操作失敗,原因：",$ex->getMessage(),"<br>";
  echo "行號：",$ex->getLine(),"<br>";
}
?>
