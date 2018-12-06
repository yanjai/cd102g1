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
    <title>裝備管理</title>
</head>
<body>
    <div class="full">
        <!-- add new gear start -->
        <!-- 商品編號    商品類別    商品名稱    商品資料    商品圖片    商品價格    編輯 -->
        <div class="addLightBox">
            <div id="closeLb"><img src="../images/xx.png"></div>
            <form id='addForm' action="diverForm/gearAdd.php" method="POST" enctype='multipart/form-data'>
                <div class="formTitle">新增裝備</div>
                <div class='formValBox'><label><span class='inputTitle'>商品類別:</span><input type="text" class='formVal' name='gearType'></label></div>
                <div class='formValBox'><label><span class='inputTitle'>商品名稱:</span><input type="text" class='formVal' name='gearName'></label></div>
                <div class="formTx"><label><div class='txTitle'>商品資料:</div><textarea name="gearInfo"></textarea></label></div>
                <div class='formValBox'><label><input type="file" id='thefile' name='fileImg'></label></div>
                <div id="imgbox"><img id='image'></div>
                <div class='formValBox'><label><span class='inputTitle'>商品價格:</span><input type="text" class='formVal' name='gearPrice'></label></div>
                <input id="gearStatus" type="hidden" name="gearStatus" value="0">
                <button type="submit" id='sendForm'>送出</button>
            </form>
        </div> 
        <!-- add new gear end -->
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
                    <li><a class="active" href='divinggearCat.php'>裝備管理</a></li>
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
            <div class="cotentTitle"><h1>裝備管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                    <input type="text" name='searchValue' id='search' placeholder="請輸入商品名稱">
                </div>
                <div class="contentBtn">
                    <button id='add'>新增</button>
                </div>
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <div class="Table">
                    <div class="Tr">
                        <div class="col col-num">商品編號</div>
                        <div class="col">商品類別</div>
                        <div class="col">商品名稱</div>
                        <div class="col col-big">商品資料</div>
                        <div class="col">商品圖片</div>
                        <div class="col col-num">商品價格</div>
                        <div class="col col-num">編輯</div>
                    </div>

                </div>
                <!-- table-cell -->
                <!-- col-num用在內容較少 -->
                <!-- col-big用在內容多 -->
                <!-- col建議用在圖片或是內容不多不少的情況 -->
               
            </div>
        </div>
    </div>
    <script>
    $.ajax({
        url: 'diverForm/backdivCat.php',				
        dataType: 'text',
        success: function(data){
            $('.Table').html(data);
            console.log('OK');
        }
    });
    </script>
    <script type="text/javascript">
        $('#search').keyup(function(){
            $.ajax({
                url: 'diverForm/backdivCat.php',				
                data: {searchContent:$('#search').val()},				
                type: 'POST',				
                dataType: 'text',
                success: function(data){
                    $('.Table').html(data);
                }
            });
        })
    </script>
<script>
$(document).on('click', '.onBtn', function(){
      console.log($(this).parent().prev().prev().prev().prev().prev().prev().prev().text());
      // console.log($(this).val()=1);

      var gearNo = $(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
      // var gearon = $(this).val()=1;
     $(this).css('backgroundColor','#07336e');
      $(this).next().css('backgroundColor','#bbb');

     $.ajax({
        url: 'diverForm/gearstatusUpdate.php',             
        data: {gearNo:gearNo,
               gearStatus:1},             
        type: 'POST',               
        dataType: 'text',
        success: function(data){
            alert('調整成功');                                             
        }                        
    }); 


})   
   $(document).on('click', '.offBtn', function(){
      console.log($(this).parent().prev().prev().prev().prev().prev().prev().prev().text());
      // console.log($(this).val()=0);

      var gearNo = $(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
      // var gearoff = $(this).val()=0;
      
      $(this).css('backgroundColor','#07336e');
      $(this).prev().css('backgroundColor','#bbb');
     $.ajax({
        url: 'diverForm/gearstatusUpdate.php',             
        data: {gearNo:gearNo,
               gearStatus:0},              
        type: 'POST',               
        dataType: 'text',
        success: function(data){
            alert('調整成功');  
                                        
        }                        
    }); 
})                     
if(<?php echo $_SESSION["adminNo"] ?> !=1){
$('#adminLevel').css('display','none');
}
   $('#search').keyup(function(){
    console.log($('#search').val());
        $.ajax({
            url: 'act/backdivCat.php',              
            data: {searchContent:$('#search').val()},               
            type: 'POST',               
            dataType: 'text',
            success: function(data){
                console.log(data);
                $('#Table').html(data);
            }
        });
    })
</script>
</body>
</html>