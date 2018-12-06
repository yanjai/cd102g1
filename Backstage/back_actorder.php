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
    <link href="css/cuback.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src='js/cuback.js'></script>
    <script src="js/backLogOut.js"></script>
    <title>客製化裝備管理</title> 
    <style>
        *{
            /*outline: 1px solid #f00;            */
        }  
        body{
            margin: 0 !important; 
        }
        .officialImg{
            width: 35%;
            vertical-align: middle;
        }
        .tableBox table td{
            vertical-align: middle;
        }
        .col-big{
            width: 250px;
            overflow: hidden;
            vertical-align: middle;
            line-height: 1.5;
        }
        .col-num button{
            margin-right:10px;
        }
        .full .addcolorLightBox,
        .full .addoffcialLightBox,
        .full .addwetsuitLightBox{
            min-height: 300px;
        }
        .wetsuitImg{
            width: 25%;
        }
        .fileimg{
            margin: auto;
            display: block;
            width: 5%;
        }
        .officialfileimg{
            margin: auto;
            display: block;
            width: 15%;
        }
        .wetsuitfileimg{
            margin: auto;
            display: block;
            width: 25%;
        }
        .colorTitle,
        .versionTitle{
            font-size: 22px;
            color: #fff;
            font-weight: 900;
            margin-bottom: 20px;
        }
        .cuversionB{
            margin-bottom: 35px;
        }
        .full .sidebar .sidebarList ul li a.active {
          color: #ffb242; }
    </style>  
</head>
<body>
    <div class="full">
        <!-- 顏色新增談窗  -->
        <div class="addcolorLightBox">
            <div id="closecolorLb"><img src="../images/xx.png"></div>
            <form action="custForm/colorUpload.php" method="post" enctype="multipart/form-data">
                <div class="formTitle">新增顏色</div>
                <div class='formValBox'><label><span class='inputTitle'>顏色名稱:</span><input type="text" class='formVal' name='colorName'></label></div>
                <input type="hidden" name="MAX_FILE_SIZE" value="">
                <div class='formValBox'><label><input type="file" id='thefile' name='fileImg'></label></div>                
                <div id="imgbox"><img id='image'></div>
                <div class='formValBox'><label><span class='inputTitle'>性別: (男生0、女生1)</span><input type="text" class='formVal' name='cg'></label></div>
                <input type="hidden" name="colorStatus" value="0">
                <button type="submit" id='sendForm'>送出</button>
            </form>
        </div> 

        <!-- 官方圖片新增談窗  -->
        <div class="addoffcialLightBox">
            <div id="closeoffcialLb"><img src="../images/xx.png"></div>
            <form action="custForm/offcialUpload.php" method="post" enctype="multipart/form-data">
                <div class="formTitle">新增官方圖片</div>
                <input type="hidden" name="MAX_FILE_SIZE" value="">
                <div class='formValBox'><label><input type="file" id='theoffcialfile' name='fileImg'></label></div>                
                <div id="imgbox"><img id='offcialimage'></div>
                <div class='formValBox'><label><span class='inputTitle'>官方圖片名稱:</span><input type="text" class='formVal' name='officialName'></label></div>                
                <div class='formValBox'><label><span class='inputTitle'>官方圖片價格:</span><input type="text" class='formVal' name='officialPrice'></label></div>
                <input type="hidden" name="officialStatus" value="0">
                <button type="submit" id='sendForm'>送出</button>
            </form>
        </div>

        <!-- 潛水衣新增談窗  -->
        <div class="addwetsuitLightBox">
            <div id="closewetsuitLb"><img src="../images/xx.png"></div>
            <form action="custForm/wetsuitUpload.php" method="post" enctype="multipart/form-data">
                <div class="formTitle">新增潛水衣</div>

                <div class="cuversionB">
                    <span class='versionTitle'>版型編號:</span>
                    <select class='cuversionNo' name="versionNo">
                        <option value="1">男生長版</option>
            　          <option value="2">男生短版</option>
                        <option value="3">女生長版</option>
            　          <option value="4">女生短版</option>
                    </select>
                </div>

                <div class="cucolorB">
                    <span class='colorTitle'>顏色編號:</span>
                    <select class='cucolorNo' name="colorNo">
                    </select>
                </div>

                <input type="hidden" name="MAX_FILE_SIZE" value="">
                <div class='formValBox'><label><input type="file" id='thewetsuitfile' name='fileImg'></label></div>                
                <div id="imgbox"><img id='wetsuitimage'></div>

                <input type="hidden" name="wetsuitStatus" value="0">
                <button type="submit" id='sendForm'>送出</button>
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
                    <li><a class="active" href='back_actorder.php'>活動訂單管理</a></li>
                    <li><a href='custorderListMag.php'>客製化訂單管理</a></li>
                    <li><a href='memberMag.php'>會員管理</a></li>
                    <li id="adminLevel"><a href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>活動訂單管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                <input type="text" name='searchValue' id='search' placeholder="請輸入會員編號">
                </div>
                <div class="contentBtn">
                    <!-- <button id='add'>新增</button> -->
                </div>
            </div>
            <div class="tableBox">
                <table id='table'>
                </table>
            </div>
        </div>
    </div>
    <!-- 自製table使用 -->
    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'actOrder/actOrderAjax.php',				
                dataType: 'text',
                success: function(data){
                    $('#table').html(data);
                }
            });
            $('#search').keyup(function(){
                $.ajax({
                    url: 'actOrder/actOrderAjax.php',				
                    data: {searchContent:$('#search').val()},				
                    type: 'POST',				
                    dataType: 'text',
                    success: function(data){
                        $('#table').html(data);
                    }
                });
            })
        });
        if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>
</body>
</html>