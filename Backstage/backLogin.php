<?php 
 ob_start();
 session_start();
 if(isset($_SESSION['ActOrderNo'])){
     $actNo = $_SESSION['ActOrderNo'];
 }else{
    $actNo = 0;
 }
 if(isset($_SESSION['qqlevel'])){
    $qqlevel = $_SESSION['qqlevel'];
    // echo $qqlevel;
}else{
   $qqlevel = 2;
   // echo $qqlevel;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <link href="css/backLogin.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <!-- <script src='js/back.js'></script> -->
    <!-- <script src="js/backLogin.js"></script> -->
    <script src="js/backFrom.js"></script>
    <style>
        *{
            /* outline: 1px solid #f00; */
            
        }
        /* .full .addLightBox{
            min-height: 700px;
            } 自行調整*/
    </style>
	<title>後臺登入</title>
</head>


<body>

    <!-- =================後臺管理================== -->
<div id="lightBox" class='card'>
    <form class='cardForm' action="backLogin/backCheck.php" method="post">
        <input type="hidden" name="rwd" class="rwd" value="">
        <h3 class='formTitle'>Sea Tunel後台登入</h3>
        <div class='formRow'>
            <input class='cardInput dBlock' placeholder='Username' type='text' name="adminId" id="adminId">
        </div>
        <div class='formRow'>
            <input class='cardInput dBlock' placeholder='Password' type='password' name="adminPsw" id="adminPsw">
        </div>
        <div class='formRow last'>
            <div class='spinner'></div>
            <button  type="submit" id="btnLogin" class='btn btnPrimary dBlock'>登入</button>
        </div>
    </form>
</div>
<script>
        $(document).ready(function(){
            function rwdcheck(){
                if ($('body').width()<768) {
                    $('.rwd').val(1);
                 }else{
                    $('.rwd').val(0);
                 }
            }
            rwdcheck();
            $(window).on( 'resize', rwdcheck );

            if(<?php echo $qqlevel ?>==2){
                
            }else if(<?php echo $qqlevel ?>==0){
                alert('查無此人');
            }else{
                alert('此帳號已被停權');
            }
        })

</script>
    <!-- wrapper -->
    <!-- <script>
        function $id(id){
            return document.getElementById(id);
        }	  
        function checkForm(){
        var xhr = new XMLHttpRequest();

        xhr.onload = function(){
            if( xhr.status == 200){  
                if( xhr.responseText == "0"){
                    alert("帳密錯誤");
                }else if(xhr.responseText == "1"){
                    alert("你已被停權");
                }else{
                    // alert(xhr.responseText);
                    // document.getElementById("adminName").innerHTML = xhr.responseText;
                    // document.getElementById("spanLogin").innerHTML = "登出";  
                    // js轉跳頁
                    if($('body').width()<384){
                        // alert("成功登入QRcode掃描頁");
                        // location.reload();
                        
                    }else{
                        // alert("成功登入覓淨後台");
                       
                    }
                    // alert("成功登入覓淨後台");
                }
            }else{
                alert(xhr.status);
            }
        }

            xhr.open("Post", "backLogin/backCheck.php", true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            var data_info = "adminId=" + document.getElementById("adminId").value 
                        + "&adminPsw="+ document.getElementById("adminPsw").value;
            // alert(data_info);
            xhr.send(data_info);

            //將登入表單上的資料清空，並隱藏起來
            // $id('lightBox').style.display = 'none';
        }
        function init(){
            $id('btnLogin').onclick = checkForm;
        };
        window.addEventListener("load", init, false);
    </script> -->
</body>
</html>