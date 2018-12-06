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
    <script src='js/back.js'></script>
    <script src="js/backLogOut.js"></script>
    <title>帳號管理</title>
    <style>
        *{
            /* outline: 1px solid #f00; */
        }
        .tr{
            /* margin:auto; */
        }
        .full .addLightBox{
            min-height:300px;
        }
    </style>
</head>
<body>
    <div class="full">
    <div class="addLightBox">
            <div id="closeLb"><img src="../images/xx.png"></div>
            <form id='addForm'>
                <div class="formTitle">新增管理員</div>
                <div class='formValBox'><label><span class='inputTitle'>管理員姓名:</span><input type="text" class='formVal' name='adminName'></label></div>
                <div class='formValBox'><label><span class='inputTitle'>管理員帳號:</span><input type="text" class='formVal' name='adminId'></label></div>
                <div class='formValBox'><label><span class='inputTitle'>管理員密碼:</span><input type="text" class='formVal' name='adminPsw'></label></div>
                <!-- <div class="formTx"><label><div class='txTitle'>教練簡介</div><textarea name=""></textarea></label></div>
                <div class='formValBox'><label><input type="file" id='thefile' name='fileImg'></label></div>
                <div id="imgbox"><img id='image'></div> -->
                <button id='sendForm'>送出</button>
            </form>
        </div> 
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
                    <li><a href='memberMag.php'>會員管理</a></li>
                    <li id="adminLevel"><a class="active" href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>帳號管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                    <!-- <input type="text" name='searchValue' id='search'> -->
                </div>
                <div class="contentBtn">
                    <button id="add">新增</button>
                </div>
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <table id='table_admin'>
                    <tr>
                        <th>管理員編號</th>
                        <th>管理員帳號</th>
                        <th>管理員密碼</th>
                        <th>管理員姓名</th>
                        <th>權限</th>
                        <th>編輯</th>
                    </tr>
                </table>
                <!-- table-cell -->
                <!-- col-num用在內容較少 -->
                <!-- col-big用在內容多 -->
                <!-- col建議用在圖片或是內容不多不少的情況 -->
               
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
        $.ajax({
            url: 'adminMag/adminMag.php',				
            dataType: 'text',
            success: function(data){
                $('#table_admin').append(data);

                $('.alter').click(function(){
                    // console.log($(this).parent().parent().find('input').eq(0).val());
                    $.ajax({
                        url: 'adminMag/adminMag.php',				
                        data: {
                            UpadNo:$(this).parent().parent().find('td').eq(0).text(),
                            UpadId:$(this).parent().parent().find('input').eq(0).val(),
                            UpadPsw:$(this).parent().parent().find('input').eq(1).val(),
                            UpadName:$(this).parent().parent().find('input').eq(2).val(),
                            UpadLv:$(this).parent().parent().find('select').eq(0).val()
                        },				
                        type: 'POST',				
                        dataType: 'text',
                        success: function(data){
                            // $('#table').append(data);
                            alert('修改成功');
                            location.reload();
                        }
                    });
                });
                $('.alter2').click(function(){
                    // console.log($(this).parent().parent().find('input').eq(0).val());
                    $.ajax({
                        url: 'adminMag/adminMag.php',				
                        data: {
                            UpadNo:$(this).parent().parent().find('td').eq(0).text(),
                            UpadId:$(this).parent().parent().find('input').eq(0).val(),
                            UpadPsw:$(this).parent().parent().find('input').eq(1).val(),
                            UpadName:$(this).parent().parent().find('input').eq(2).val()
                        },				
                        type: 'POST',				
                        dataType: 'text',
                        success: function(data){
                            // $('#table').append(data);
                            alert('修改成功');
                            location.reload();
                        }
                    });
                });
            }
        });
        $('#sendForm').click(function(){
            $.ajax({
			       url: 'adminMag/adminMag.php',				
			        data: $('#addForm').serialize(),				
			        type: 'POST',				
			        dataType: 'text',
			        success: function(data){
                        $('#table_admin').append(data);
                 }
            });
        });
        if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>
</body>
</html>