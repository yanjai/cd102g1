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
    <script src='js/cuback.js'></script>
    <script src="js/backLogOut.js"></script>
    <title>客製化訂單管理</title>  
    <style>
        *{
            /*outline: solid 1px #f00;*/
        }
        .cuPages{
            width: 100%;
            text-align: center;
            padding: 10px 20px;
            box-sizing: border-box;
        }
        .cuPages a{            
            text-decoration: none;
            color: #fff; 
            margin: 5px; 
        }
        .FinalcustoImg img{
            vertical-align: middle;
            width: 60%;
        }
        img{
            vertical-align: middle;
            width: 30%;
        }
        .custorderLightBox{
            min-height: 300px;
            display: none;
            width: 1000px;
            min-height: 550px;
            position: absolute;
            margin: auto;
            z-index: 20;
            top: 100px;
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 20px 10px;
            background-image: url("../images/ch_bg1.jpg");
            margin: auto; 
        }            
        .custorderLightBox #closeorderdesLb {
            width: 30px;
            height: 30px;
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer; 
        }        
        .custorderLightBox #closeorderdesLb img{
            width: 100%; 
        }
        .custorderLightBox .formTitle {
            font-weight: 900;
            font-size: 24px;
            color: #fff;
            margin: auto;
            text-align: center;
            margin-bottom: 25px; 
        }
        .formcontents{
            text-align: center;
            width: 100%;
            border: solid #aaa 1px;
        }
        .formcontents th{
            background-color: #222;
            height: 40px;
            color: #fff;
            font-weight: 900;
            font-size: 22px;
            line-height: 40px;
        }
    </style> 
</head>
<body>
    <div class="full">
        <!-- 訂單明細彈窗 -->
         <div class="custorderLightBox">
            <div id="closeorderdesLb"><img src="../images/xx.png"></div>
            <div class="formTitle">訂單明細</div>
            <table class="formcontents"></table>           
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
                    <li><a class="active" href='custorderListMag.php'>客製化訂單管理</a></li>
                    <li><a href='memberMag.php'>會員管理</a></li>
                    <li id="adminLevel"><a href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>客製化訂單管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                    <input type="text" name='searchValue' id='search' placeholder="請輸入訂單編號">
                </div>
                <div class="contentBtn">
                    <!-- <button>新增</button> -->
                </div>
            </div>
            <div class="tableBox">                
                <!-- table-cell -->
                <!-- col-num用在內容較少 -->
                <!-- col-big用在內容多 -->
                <!-- col建議用在圖片或是內容不多不少的情況 -->                
                <table class="Table"></table>
                <br><br>
               <!--  <div class="cuPages"> 
                    <a href="#"><</a>                       
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">></a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- 自製table使用 -->
    <script>
        $(document).ready(function(){
            var trW = $('.Tr').width();
            $('.FeaturesBot').css('width',trW);
        });
    </script>
    <script>
        $.ajax({
            url: 'custOrder/custorderListMag_orderList.php',				
            dataType: 'text',
            success: function(data){
                $('.Table').append(data);
                $('.orderdes').click(function(){
                    $('.custorderLightBox').fadeIn(500);
                })
                // 訂單明細
                $('.orderdes').click(function(){
                    // console.log($(this).parent().parent().find('td').eq(6).text());
                    $.ajax({
                        url: 'custOrder/custorderListMag_orderListDes.php',             
                        data: {
                            UpcustorderNo:$(this).parent().parent().find('td').eq(0).text(), 
                        },              
                        type: 'POST',               
                        dataType: 'text',
                        success: function(data){
                            // alert(data);
                            $('.formcontents').html(data);
                        }
                    });
                });                
            } 
        });
        $('#search').keyup(function(){
            // alert('hi');
            $.ajax({
                    url: 'custOrder/custorderListMag_orderList.php',             
                    data: {searchContent:$('#search').val()},               
                    type: 'POST',               
                    dataType: 'text',
                    success: function(data){
                        $('.Table').html(data);
                        $('.orderdes').click(function(){
                            $('.custorderLightBox').fadeIn(500);
                        })

                        $('.orderdes').click(function(){
                            // console.log($(this).parent().parent().find('td').eq(6).text());
                            $.ajax({
                                url: 'custOrder/custorderListMag_orderListDes.php',             
                                data: {
                                    UpcustorderNo:$(this).parent().parent().find('td').eq(0).text(), 
                                },              
                                type: 'POST',               
                                dataType: 'text',
                                success: function(data){
                                    // alert(data);
                                    $('.formcontents').html(data);
                                }
                            });
                        });       
                    }
            });
        });
        if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>
</body>
</html>