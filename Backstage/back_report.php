<?php 
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <link href="css/back_coach.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src="js/backLogOut.js"></script>
    <title>評論檢舉管理</title>
    <style>
        *{
            /* outline: 1px solid #f00; */
        }
        #chORact{
            width: 100%;
            margin:13px 0;
            font-size: 0;
        }
        #chORact span{
            background-color: rgb(60,60,60);
            font-size: 20px;
            padding:10px 10px;
            color:#fff;
            font-weight: 900;
            cursor: pointer;
        }
        #chORact span.active{
            background-color: rgb(34,34,34);
        }
    </style>
</head>
<body>
    <div class="full">
        <div class="sidebar">
            <div class="logo"><img src="../back_images/logo.png"></div>
            <div class="sidebarList">
                <ul>
                    <li><a href='custoFormatMag.php'>客製化裝備管理</li>
                    <li><a href='back_act.php'>活動種類管理</a></li>
                    <li><a href='back_coach.php'>教練團隊管理</a></li>
                    <li><a href='back_coachMana.php'>教練管理系統</a></li>
                    <li><a href='back_bot.php'>聊天機器人管理</a></li>
                    <li><a class="active" href='back_report.php'>評論檢舉管理</a></li>
                    <li><a href='divinggearCat.php'>裝備管理</a></li>
                    <li><a href='gearOrders.php'>商品訂單管理</a></li>
                    <li><a href='back_actorder.php'>活動訂單管理</a></li>
                    <li><a href='custorderListMag.php'>客製化訂單管理</a></li>
                    <li><a href='memberMag.php'>會員管理</a></li>
                    <li id="adminLevel"><a href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>評論檢舉管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <!-- <div class="contentSearch">
                    <input type="text" name='searchValue' id='search'>
                </div> -->
                <div class="contentBtn">
                    <!-- <button>新增</button> -->
                </div>
            </div>
            <div id="chORact">
                <span class="coachm active">教練評論檢舉管理<input type="hidden" value="1"></span>
                <span class="actm">活動評論檢舉管理<input type="hidden" value="2"></span>
            </div>
            <div class="tableBox">
            </div>
        </div>
    </div>
    <!-- <script>
        $(document).ready(function(){
            var trW = $('.Tr').width();
            $('.FeaturesBot').css('width',trW);
        });
    </script> -->
    <script>
        $(document).ready(function(){
            function reloadcoa(){
            $.ajax({
            url: 'commentMag/report_mag.php',				
            dataType: 'text',
            success: function(data){
                $('.tableBox').html(data);
                for(var i=0;i<$('.selectid').length;i++){
                    if($('.selectid').eq(i).val()==1){
                        $('.fno').eq(i).css('color','red');
                    }
                }
                
                $('.send').click(function(){
                    var commentno = $(this).parent().prev().prev().prev().prev().text();
                    var verifyVal = $(this).parent().prev().find('select').val();
                    console.log(commentno);
                    console.log(verifyVal);
                    $.ajax({
                        url: 'commentMag/report_mag.php',				
                        dataType: 'text',
                        data:{commentNo:commentno,verifyVal:verifyVal},
                        type:'POST',
                        success: function(data){
                            // $('.tableBox').html(data);
                            alert('修改成功');
                            reloadcoa();
                        }
                    })
                })
            }
            });
            }
            window.addEventListener('load',reloadcoa);
            function reloadact(){
            $.ajax({
            url: 'commentMag/report_mag2.php',				
            dataType: 'text',
            success: function(data){
                $('.tableBox').html(data);
                for(var i=0;i<$('.selectid').length;i++){
                    if($('.selectid').eq(i).val()==1){
                        $('.fno').eq(i).css('color','red');
                    }
                }
                $('.send').click(function(){
                    var commentno = $(this).parent().prev().prev().prev().prev().text();
                    var verifyVal = $(this).parent().prev().find('select').val();
                    console.log(commentno);
                    console.log(verifyVal);
                    $.ajax({
                        url: 'commentMag/report_mag2.php',				
                        dataType: 'text',
                        data:{commentNo:commentno,verifyVal:verifyVal},
                        type:'POST',
                        success: function(data){
                            // $('.tableBox').html(data);
                            alert('修改成功');
                            reloadact();
                        }
                    })
                })
            }
            });
            }
            $('.coachm').click(function(){
                $('#chORact').find('span').removeClass('active');
                $(this).addClass('active');
                reloadcoa();
            });
            $('.actm').click(function(){
                $('#chORact').find('span').removeClass('active');
                $(this).addClass('active');
                reloadact();
            });
        });
        if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>
</body>
</html>