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
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src='js/back.js'></script>
    <script src="js/backLogOut.js"></script>
    <title>裝備管理</title>
    <style type="text/css">
  
        .detailsLightBox{
            width: 1200px;
            height: auto;
            margin: auto;
            position: absolute;
            top: 10%;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            display: none;
            padding: 5%;
            box-sizing: border-box;
            background-image:url('../images/ch_bg3.jpg');
        }
        .detailsLightBox >div{
            width: 100%;
            
        }
        #closeLB_btn{
            margin-top: -10%;
            margin-right: -10%;
            width: 30px;
            height: 30px;
            float: right;
        }
        #closeLB_btn img{
            width: 100%;
            height:100%;
        }
        .receiverdetails{
            width: 100%;
            border: 1px solid #07336e;
            height: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            font-size: 20px;
            line-height: 30px;
            box-sizing: border-box;
        }
        .gearlistNo,
        .totalAmount,
        .paymentType{
            width: 33.333333%;
            padding:0 2%;
            border: 1px solid #07336e;
            box-sizing: border-box;
        }
        .receiverAddress{
            width: 60%;
            padding: 0 2%;
            border: 1px solid #07336e;
            box-sizing: border-box;
        }
        .receiverName,
        .receiverPhoneNo{
            width: 20%;
            padding: 0 2%;
            border: 1px solid #07336e;
            box-sizing: border-box;
        }
        .listtable{
            width: 100%;
            height: auto;
            font-size: 20px;
            line-height: 30px;
            margin-top: 20px;
            display:flex;
            text-align: center;
        }
        .listtable td{
            border-bottom: 1px solid #07336e; 
            vertical-align: middle;
        }
        .b_table_img{
            width: 10%;
            height: auto;
        }
        .listtable tr td img{
            width: 100%;
        }
        .b_gearName{
            width: 40%;
        }
        .b_typeNo,
        .b_gearNo,
        .b_gearPrice,
        .b_gearQty,
        .b_subtotal{
            width: 10%;
        }

    </style>
</head>
<body>
    <div class="full">
        <!-- add new gear start -->
        <!-- 商品編號    商品類別    商品名稱    商品資料    商品圖片    商品價格    編輯 -->
        <div class="addLightBox">
            <div id="closeLb"><img src="../images/xx.png"></div>
            <form id='addForm' action="gearAdd.php" method="POST" enctype='multipart/form-data'>
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
                    <li><a href='divinggearCat.php'>裝備管理</a></li>
                    <li><a class="active" href='gearOrders.php'>商品訂單管理</a></li>
                    <li><a href='back_actorder.php'>活動訂單管理</a></li>
                    <li><a href='custorderListMag.php'>客製化訂單管理</a></li>
                    <li><a href='memberMag.php'>會員管理</a></li>
                    <li id="adminLevel"><a href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>商品訂單管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                    <input type="text" name='searchValue' id='search' placeholder="請輸入會員編號">
                </div>
           
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <div class="Table">
                    

                </div>
                <!-- table-cell -->
                <!-- col-num用在內容較少 -->
                <!-- col-big用在內容多 -->
                <!-- col建議用在圖片或是內容不多不少的情況 -->
               
            </div>
            <div class="detailsLightBox">
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <script>
        $.ajax({
            url:'diverOrder/gearOrder.php',				
            dataType: 'text',
            success: function(data){
                $('.Table').html(data);
                console.log('OK');
            }
        });
        $('#search').keyup(function(){
        $.ajax({
                url: 'diverOrder/gearOrder.php',				
                data: {searchContent:$('#search').val()},				
                type: 'POST',				
                dataType: 'text',
                success: function(data){
                    $('.Table').html(data);
                }
        });
    })
    </script>

    <script type="text/javascript">
             $(document).on('click', '.orderDetails', function(){
                     var gearOrderNo = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().text();
                     console.log(gearOrderNo);
                     
                     $('.detailsLightBox').css('display','block'); //light box display on
                    // get gear order details from database
                    $.ajax({
                        url: 'diverOrder/gearOrderDetails.php',             
                        data: {gearOrderNo:gearOrderNo},             
                        type: 'POST',               
                        dataType: 'text',
                        success: function(data){
                              $('.detailsLightBox').html('<div>'+data+'</div>');
                              console.log(data);                  
                        }                        
                     }); 
                  
             }) 

             $(document).on('click', '#closeLB_btn', function(){
                 $('.detailsLightBox').css('display','none');
             })

 if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>

</body>
</html>