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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src="js/backLogOut.js"></script>
    <title>會員管理</title>
    <style>
        *{
            /* outline: 1px solid #f00; */
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
                    <li><a href='back_report.php'>評論檢舉管理</a></li>
                    <li><a href='divinggearCat.php'>裝備管理</a></li>
                    <li><a href='gearOrders.php'>商品訂單管理</a></li>
                    <li><a href='back_actorder.php'>活動訂單管理</a></li>
                    <li><a href='custorderListMag.php'>客製化訂單管理</a></li>
                    <li><a class="active" href='memberMag.php'>會員管理</a></li>
                    <li id="adminLevel"><a href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>會員管理</h1><span id="adminName"></span></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                    <input type="text" name='searchValue' id='search' placeholder="請輸入會員編號">
                </div>
                <div class="contentBtn">
                </div>
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <!-- <table>
                    <tr>
                        <th>商品編號</th>
                        <th>商品名稱</th>
                        <th>商品類別</th>
                        <th>商品簡介</th>
                        <th>商品圖片</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                </table> -->
                <!-- table-cell -->
                <!-- col-num用在內容較少 -->
                <!-- col-big用在內容多 -->
                <!-- col建議用在圖片或是內容不多不少的情況 -->
                <div class="Table">
                    
                </div>
            </div>
        </div>
    <!-- 自製table使用 -->
    <script>
        $.ajax({
            url: 'member/memberMag.php',				
            dataType: 'text',
            success: function(data){
                $('.Table').html(data);
                $('.chLevel').change(function(){
                        var level = $(this).val();
                        var memNo = $(this).parent().parent().find('div').eq(0).text();
                        console.log(memNo);
                        $.ajax({
                        url: 'member/memberMag.php',				
                        dataType: 'text',
                        data:{chlevel:level,chmemNo:memNo},
                        type:'POST',
                        success: function(data){
                            
                        }
                    });
                })
                 
            }
        });
        $('#search').keyup(function(){
        $.ajax({
                url: 'member/memberMag.php',				
                data: {searchmemId:$('#search').val()},				
                type: 'POST',				
                dataType: 'text',
                success: function(data){
                    $('.Table').html(data);
                }
        });
    })
    if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>
</body>
</html>