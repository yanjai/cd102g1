<?php
    ob_start();
    session_start();
    if(isset($_REQUEST['ActOrderNo'])){
        // header("Location:backLogin.php");
        // exit();
        $_SESSION['ActOrderNo'] = $_REQUEST['ActOrderNo'];
    }
    if(!isset($_SESSION["adminNo"])){
        header("Location:backLogin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/cuback.css" rel="stylesheet" type="text/css">
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/backLogOut.js"></script>
    <title>SeaTunnel</title>
    <style>
        *{
            margin:0;
            padding:0;
            /* outline:1px solid #f00; */
            box-sizing: border-box;
        }
        nav{
            background-color: #123A6F;
            width: 100%;
            height: 50px;
            display:flex;
            padding:0 20px;
            justify-content: space-between;
            align-items:center;
            /* margin-bottom:20px; */
            font-family: 'Microsoft JhengHei';
            /* position: relative; */
        }
        nav span{
            padding:20px 0;
            color:#fff;
        }
        #logo{
            padding:5px 0;
            width: 10%;
        }
        #logo img{
            width: 100%;
        }
        #logOut img{
            width: 100%;
        }
        #logOut{
            padding:10px 0;
            width: 10%;
            /* display:flex; */
            /* flex-wrap:wrap; */
        }
        #logOut p{
            width: 50%;
            line-height:40px; 
        }
        .QRwrap{
            /* margin-top:30px; */
            width: 100%;
            height: 100vh;
            background-image: url('../images/body-bg.jpg');
            background-size:cover;
            box-sizing: border-box;
            padding:10px;
            font-family: 'Microsoft JhengHei';
            /* position: relative;*/
            margin:50px auto 0;
        }
        .actOrderNo{
            width: 100%;
            padding: 10px;
            background-color: #222;
            box-sizing: border-box;
            text-align:center;
            color:#fff;
        }
        .QRbox{
            width: 90%;
            height: auto;
            margin:auto;
            /* border:1px solid #2228; */
            background-color: rgba(255,255,255,.3);
            /* display:flex; */
            /* flex-direction:column; */
            /* align-items:center; */
            /* justify-content: space-between; */
            /* position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%); */
        }
        .membox{
            width: 100%;
            display:flex;
            flex-wrap:wrap;
        }
        .QRImg{
            width: 30%;
            font-size: 0;
            /* padding:5px; */
        }
        .QRImg img{
            width: 100%;
            
        }
        .QRName{
            width: 70%;
            display:flex;
            flex-direction:column;
            justify-content: space-around;
            padding:10px;
            
        }
        .QRName p{
            width: 100%;
            padding:5px 0;
        }
        .Title{
            width: 100%;
            padding:5px 0;
            font-size: 18px;
            text-align: center;
            /* border:1px solid #ccc; */
            background-color: #eee;
        }
        .coachbox{
            width: 100%;
            display:flex;
            flex-wrap:wrap;
            /* padding:5px 0 10px; */
        }
        .actbox{
            width: 100%;
            display:flex;
            flex-wrap:wrap;
        }
        .actbox .QRName p{
            padding:5px 0;
        }
        .actbox .QRImg{
            padding:15px 0;
        }
        #confirm{
            width:100%;
        }
    </style>
</head>
<body>
    <nav>
        <span id="logo"><img src="../back_images/logo.png"></span><span id="adminName"></span><span id="logOut"><img src="../back_images/Logout.png"></span>
    </nav>
    <div class="QRwrap">
        <div class="QRbox">
            
        </div>
    </div>
    <script>
         $.ajax({
            url: 'QRcode/QRcodeCk.php',             
            data: {
                actOrderNo:<?php echo $_SESSION['ActOrderNo']; ?>
            },              
            type: 'POST',               
            dataType: 'text',
            success: function(data){
                $('.QRbox').html(data);
                $('#confirm').click(function(){
                    $.ajax({
                        url: 'QRcode/QRcodeCk.php',             
                        data: {
                            actOrderNo:<?php echo $_SESSION['ActOrderNo']; ?>,
                            attend:1
                        },              
                        type: 'POST',               
                        dataType: 'text',
                        success: function(data){
                            $('.QRbox').html(data);
                            alert('簽到成功');
                        }
                    });
                })
            }
        });
    </script>
</body>
</html>