<?php 
    ob_start();
    session_start();
    // echo $_SESSION["adminNo"];
    // echo $_SESSION["adminId"];
    // echo $_SESSION["adminName"];
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
    <!-- <link href="css/admin.css" rel="stylesheet" type="text/css"> -->
    <link href="css/cuback.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/admin.css" rel="stylesheet" type="text/css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src='js/cuback.js'></script>
    <script src="js/backLogOut.js"></script>
    
    <title>客製化裝備管理</title> 
    <style>
        *{
            /*outline: 1px solid #f00;*/
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
                <div class='formValBox'>
                    <label>
                        <span class='sexTitle'>性別:</span>
                        <!-- <input type="text" class='formVal' name='cg'> -->
                        <select name="cg">
                            <option value="0">男生</option>
                　          <option value="1">女生</option>
                        </select>
                    </label>
                </div>
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
                    <li><a class="active" href='custoFormatMag.php'>客製化裝備管理</li>
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
                    <li id="adminLevel"><a href='adminMag.php'>帳號管理</a></li>
                    <li id='logOut'>登出</li>
                </ul>
            </div>
        </div>
        <div class="contentBox">
            <div class="cotentTitle"><h1>顏色管理</h1><span id="adminName"></span></div>
            <div class="FeaturesBot">
                <div class="contentSearch"></div>
                <div class="contentBtn">
                    <button id="addcolor">新增</button>
                </div>
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <table id="table_color"></table>
            <br><br><br>
            <div class="cotentTitle"><h1>版型管理</h1></div>
            <div class="FeaturesBot">
                <div class="contentSearch"></div>
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <table id='table_version'></table>
            <br><br><br>
            <div class="cotentTitle"><h1>官方圖片管理</h1></div>
            <div class="FeaturesBot">
                <div class="contentSearch"></div>
                <div class="contentBtn">
                    <button id="addoffcial">新增</button>
                </div>
            </div>
            <div class="tableBox">
                <!-- 一般table -->
                <table id="table_official"></table>
                <br><br><br>
                <div class="cotentTitle"><h1>潛水衣管理</h1></div>
                <div class="FeaturesBot">
                    <div class="contentSearch"></div>
                    <div class="contentBtn">
                        <button id="addwetsuit">新增</button>
                    </div>
                </div>
                <div class="tableBox">
                    <!-- 一般table -->
                    <table id='table_wetsuit'></table>   
                <!-- table-cell -->
                <!-- col-num用在內容較少 -->
                <!-- col-big用在內容多 -->
                <!-- col建議用在圖片或是內容不多不少的情況 --> 
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
        function gofirst(){
            $.ajax({
                url: 'custForm/custoFormatMag_color.php',				
                dataType: 'text',
                success: function(data){
                    $('#table_color').html(data);
                    for( var btn = 0; btn < $('.onandoff').length; btn++){
                        if($('.onandoff').eq(btn).prev().val()==0){
                            $('.onandoff').eq(btn).css('backgroundColor','#07336e');
                            $('.onandoff').eq(btn).text('上架');
                        }else{
                            $('.onandoff').eq(btn).css('backgroundColor','#bbb');
                            $('.onandoff').eq(btn).text('下架');
                        }
                    }
                    $('.upcolorfile').change(function(e){
                        var file = this.files[0].name;
                       $(this).next().attr("src","back_images/" + file);
                    });

                    // 修改
                    $('.alter').click(function(){
                        // console.log($(this).parent().parent().children('td').eq(2).find('img').attr('src').toString().split("/")[2]);
                        // console.log($(this).parent().parent().find('input').eq(2).val());
                        $.ajax({
                            url: 'custForm/custoFormatMag_color.php',             
                            data: {
                                UpcolorNo:$(this).parent().parent().find('td').eq(0).text(),
                                UpcolorName:$(this).parent().parent().find('input').eq(0).val(),
                                UpcolorImg:$(this).parent().parent().children('td').eq(2).find('img').attr('src').toString().split("/")[2],
                                Upgender:$(this).parent().parent().find('select').val()
                            },              
                            type: 'POST',               
                            dataType: 'text',
                            success: function(data){
                                alert('修改成功');
                            }
                        });
                    });
                    $('.onandoff').click(function(){
                                                          
                        // console.log($(this).find('input').val());
                        // console.log($(this).prev().val());
                        $.ajax({
                            url: 'custForm/custoFormatMag_color.php',             
                            data: {
                                colorNo:$(this).parent().parent().find('td').eq(0).text(),
                                colorStatus:$(this).prev().val(),
                            },              
                            type: 'POST',               
                            dataType: 'text',
                            success: function(data){
                                // alert('調整成功');  
                                gofirst();   
                                // gofirstwetsuit();                                         
                            }                        
                        });
                    });                
                }
            });
        }
        window.addEventListener('load',gofirst);

    </script>
    <script>
        $.ajax({
            url: 'custForm/custoFormatMag_version.php',				
            dataType: 'text',
            success: function(data){
                $('#table_version').html(data);
                $('.alter2').click(function(){
                    // console.log($(this).parent().parent().find('input').eq(2).val());
                    $.ajax({
                        url: 'custForm/custoFormatMag_version.php',             
                        data: {
                            UpversionNo:$(this).parent().parent().find('td').eq(0).text(),
                            UpversionName:$(this).parent().parent().find('input').eq(0).val(),
                            UpversionContents:$(this).parent().parent().find('textarea').eq(0).val(),
                            UpversionPrice:$(this).parent().parent().find('input').eq(1).val(),
                            Upgender:$(this).parent().parent().find('select').val()
                        },              
                        type: 'POST',               
                        dataType: 'text',
                        success: function(data){
                            alert('修改成功');
                        }
                    });
                });
            }
        });
    </script>
     <script>
        function gofirstoffcial(){
            $.ajax({
                url: 'custForm/custoFormatMag_offical.php',				
                dataType: 'text',
                success: function(data){
                    $('#table_official').html(data);
                    for( var btn = 0; btn < $('.onandoff').length; btn++){
                        if($('.onandoff').eq(btn).prev().val()==0){
                            $('.onandoff').eq(btn).css('backgroundColor','#07336e');
                            $('.onandoff').eq(btn).text('上架');
                        }else{
                            $('.onandoff').eq(btn).css('backgroundColor','#bbb');
                            $('.onandoff').eq(btn).text('下架');
                        }
                    }
                    $('.upofficialImgfile').change(function(e){
                        var file = this.files[0].name;
                       $(this).next().attr("src","back_images/" + file);
                    });

                    // 修改
                    $('.alter3').click(function(){
                        // console.log($(this).parent().parent().find('td').eq(0).text());
                        $.ajax({
                            url: 'custForm/custoFormatMag_offical.php',             
                            data: {
                                UpofficialNo:$(this).parent().parent().find('td').eq(0).text(),
                                UpofficialName:$(this).parent().parent().children('td').eq(1).find('label').find('img').attr('src').toString().split("/")[2],
                                UpofficialLName:$(this).parent().parent().find('input').eq(1).val(),
                                UpofficialPrice:$(this).parent().parent().find('input').eq(2).val(),
                            },              
                            type: 'POST',               
                            dataType: 'text',
                            success: function(data){
                                alert('修改成功');
                            }
                        });
                    });
                    $('.onandoff').click(function(){                                  
                        // console.log($(this).parent().parent().find('td').eq(0).text());
                        // console.log($(this).prev().val());
                        $.ajax({
                            url: 'custForm/custoFormatMag_offical.php',             
                            data: {
                                officialImgNo:$(this).parent().parent().find('td').eq(0).text(),
                                officialImgStatus:$(this).prev().val(),
                            },              
                            type: 'POST',               
                            dataType: 'text',
                            success: function(data){
                                // alert('調整成功');  
                                gofirstoffcial();                                          
                            }                        
                        });
                    });
                }
            });
        }
        window.addEventListener('load',gofirstoffcial);
    </script>
    <script>
        function gofirstwetsuit(){
            $.ajax({
                url: 'custForm/custoFormatMag_wetsuit.php',				
                dataType: 'text',
                success: function(data){
                    $('#table_wetsuit').html(data);

                    for( var btn = 0; btn < $('.onandoff').length; btn++){
                        if($('.onandoff').eq(btn).prev().val()==0){
                            $('.onandoff').eq(btn).css('backgroundColor','#07336e');
                            $('.onandoff').eq(btn).text('上架');
                        }else{
                            $('.onandoff').eq(btn).css('backgroundColor','#bbb');
                            $('.onandoff').eq(btn).text('下架');
                        }
                    }
                    $('.upwetsuitImgfile').change(function(e){
                        var file = this.files[0].name;
                       $(this).next().attr("src","back_images/" + file);
                    });

                    // 修改
                    $('.alter4').click(function(){
                        console.log($(this).parent().parent().find('input').eq(1).val());
                        $.ajax({
                            url: 'custForm/custoFormatMag_wetsuit.php',             
                            data: {
                                UpwetsuitNo:$(this).parent().parent().find('td').eq(0).text(),
                                UpwetsuitImg:$(this).parent().parent().children('td').eq(1).find('label').find('img').attr('src').toString().split("/")[2],
                                UpwetsuitversionNo:$(this).parent().parent().find('input').eq(1).val(),
                                UpwetsuitcolorNo:$(this).parent().parent().find('input').eq(2).val(),
                            },              
                            type: 'POST',               
                            dataType: 'text',
                            success: function(data){
                                alert('修改成功');
                            }
                        });
                    });
                    $('.onandoff').click(function(){                                  
                        // console.log($(this).parent().parent().find('td').eq(0).text());
                        // console.log($(this).prev().val());
                        $.ajax({
                            url: 'custForm/custoFormatMag_wetsuit.php',             
                            data: {
                                wetsuitNo:$(this).parent().parent().find('td').eq(0).text(),
                                wetsuitStatus:$(this).prev().val(),
                            },              
                            type: 'POST',               
                            dataType: 'text',
                            success: function(data){
                                // alert('調整成功');  
                                gofirstwetsuit();                                          
                            }                        
                        });
                    });
                }
            });
        }
        window.addEventListener('load',gofirstwetsuit);
    </script>

    <script>        
        $.ajax({
            url: 'custForm/conect2for1.php',              
            dataType: 'text',
            success: function(data){
                $('.cucolorNo').append(data);
            }                
        });
        if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}

    </script>

</body>
</html>