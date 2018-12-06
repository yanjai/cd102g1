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
    <!-- <link href="css/back_coach.css" rel="stylesheet" type="text/css"> -->
    <link href="images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src='js/back.js'></script>
    <script src="js/backLogOut.js"></script>
    <title>教練團隊管理</title>
    <style>
        *{
            /* outline: 1px solid #f00; */
        }
    </style>
</head>
<body>
    <div class="full">
    <div class="addLightBox">
            <div id="closeLb"><img src="images/xx.png"></div>
            <form id='addForm'>
                <div class="formTitle">新增關鍵字回答</div>
                <div class='formValBox'><label><span class='inputTitle'>關鍵字內容:</span><input type="text" class='formVal' name='content'></label></div>
                <div class='formValBox'><label><span class='inputTitle'>關鍵字回答:</span><input type="text" class='formVal' name='ans'></label></div>
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
                    <li><a class="active" href='back_coach.php'>教練團隊管理</a></li>
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
            <div class="cotentTitle"><h1>教練團隊管理</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <!-- <div class="contentSearch">
                    <input type="text" name='searchValue' id='search'>
                </div> -->
                <div class="contentBtn">
                    <!-- <button id='add'>新增</button> -->
                </div>
            </div>
            <div class="tableBox">
                <div class="Table">
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var trW = $('.Tr').width();
            $('.FeaturesBot').css('width',trW);
        });
    </script>
    <script>
        $(document).ready(function(){
                $.ajax({
                url: 'coach/backCoach.php',				
                dataType: 'text',
                success: function(data){
                    $('.Table').append(data);
                    $('.upfile').change(function(e){
                        var file = this.files[0].name;
                        console.log(file.name);
                        this.nextSibling.setAttribute("src","../images/"+file);
                    })
                    $('.alter').click(function(){
                                no = $(this).parent().parent().children('.col').eq(0).text();
                                one = $(this).parent().parent().find('input').eq(0).val();
                                four = $(this).parent().parent().find('input').eq(1).val();
                                two = $(this).parent().parent().find('textarea').eq(0).val();
                                three = $(this).parent().parent().find('textarea').eq(1).val();
                                Img = $(this).parent().parent().children('.col').eq(5).find('img').attr('src');
                                Img2 = Img.toString().split("/")[2];
                                console.log(Img);
                            again();
                            function again(){
                                $.ajax({
                                url: 'coach/backCoach.php',				
                                dataType: 'text',
                                data:{
                                    coachNo:no,
                                    coachName:one,
                                    coachQ:two,
                                    coachInfo:three,
                                    coachYear:four,
                                    coachImg:Img2
                                },
                                type:'POST',
                                success: function(data){
                                    $('.Table').html(data);
                                    $('.upfile').change(function(e){
                                        var file = this.files[0].name;
                                        // console.log(file.name);
                                        this.nextSibling.setAttribute("src","images/"+file);
                                    });
                                    $('.alter').click(function(){
                                        no = $(this).parent().parent().children('.col').eq(0).text();
                                        one = $(this).parent().parent().find('input').eq(0).val();
                                        four = $(this).parent().parent().find('input').eq(1).val();
                                        two = $(this).parent().parent().find('textarea').eq(0).val();
                                        three = $(this).parent().parent().find('textarea').eq(1).val();
                                        Img = $(this).parent().parent().children('.col').eq(5).find('img').attr('src');
                                        Img2 = Img.toString().split("/")[2];
                                        again();
                                    });
                                    
                                }
                            });
                        }
                     })
                }
            });
        })
        if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
    </script>
</body>
</html>