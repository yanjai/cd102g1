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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src='js/back.js'></script>
    <script src="js/backLogOut.js"></script>
    <title>活動種類管理</title>
    <style>
        *{
            /* outline: 1px solid #f00; */
        }
        .full .addLightBox{
            width:960px;
            top:50px;
            /* flex-wrap:wrap; */
        }
        .full .addLightBox{
            min-height: 800px;
        }
        .full .addLightBox .formValBox input{
            width: auto;
        }
        #filebox{
            display:flex;
            flex-direction:column;
        }
        #filebox input{
            width:30%;
        }
        #actform{
            float:left;
            width:70%;
        }
        #actImgbox{
            float:left;
            width:30%;
            height:700px;
            display:flex;
            flex-wrap:wrap;
            flex-direction:column;
            justify-content: space-between;
        }
        .ImgBox{
            width:100%;
            /* background-color:#fff; */
        }
        .formTitle{
            width:100%;
        }
        .ImgBox div{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <div class="full">
        <div class="addLightBox">
            <div id="closeLb"><img src="../images/xx.png"></div>
            
                <div class="formTitle">新增活動內容</div>
            <form action="act/actImgUpload.php" method="post" enctype="multipart/form-data" id="actform">
                <div class='formValBox'><label><span class='inputTitle'>活動名稱:</span><input type="text" class='formVal actNameUp' name='actNameUp'></label></div>
                <div class='formValBox'><p>選擇教練</p>
                    <input type="hidden"  class="coachNameUp" name="coachNameUp">
                    <label><input type="checkbox" name="coachNo" value="1">小花</label>
                    <label><input type="checkbox" name="coachNo" value="2">小吳</label>
                    <label><input type="checkbox" name="coachNo" value="3">小邱</label>
                    <label><input type="checkbox" name="coachNo" value="4">小成</label>
                    <label><input type="checkbox" name="coachNo" value="5">小遊</label>
                    <label><input type="checkbox" name="coachNo" value="6">小鄧</label>
                    <label><input type="checkbox" name="coachNo" value="7">小顯</label>
                    <div class="coachShow"></div>
                </div>
                <div class='formValBox'><p>選擇類型</p>
                    <input type="hidden"  class="actTypeUp" name="actTypeUp">
                    <label><input type="radio" name="actType" value="深潛類">深潛類</label>
                    <label><input type="radio" name="actType" value="浮潛類">浮潛類</label>
                    <label><input type="checkbox" name="actType" value="冒險類">冒險類</label>
                    <label><input type="checkbox" name="actType" value="觀賞類">觀賞類</label>
                </div>
                <div class='formValBox'>
                    <label>
                        <span class='inputTitle'>活動費用:</span>
                        <input type="text" class='formVal actPriceUp' name='actPriceUp'></label></div>

                <div class='formValBox' id="filebox"><p>活動圖片</p>
                    
                <!-- <form action="act/actImgUpload.php" method="post" enctype="multipart/form-data"> -->  
                <input type="hidden" name="MAX_FILE_SIZE" value="8192000">  
                    <input type="file" name="upFile[]" id="thefile">
                    <input type="file" name="upFile[]" id="thefile2">
                    <input type="file" name="upFile[]" id="thefile3">
                    <!-- <input type="submit" value="OK"> -->
                <!-- </form> -->      

                </div>

                <div class='formValBox'><p>活動地點</p>
                    <select class="actLocUp" name="actLocUp">
                        <option value="東海岸">東海岸</option>
                        <option value="西海岸">西海岸</option>
                        <option value="南海岸">南海岸</option>
                        <option value="北海岸">北海岸</option>
                    </select>
                    <!-- <input type="hidden" class="" name=""> -->
                </div>
                <div class="formTx"><label><div class='txTitle'>活動簡介</div><textarea name="actContentUp" ></textarea></label></div>

            
                <button id='sendForm'>送出</button>
            </form>
            <div id="actImgbox">
                <div class="ImgBox" ><div>活動圖片1:</div><img src="" id="image"></div>
                <div class="ImgBox"><div>活動圖片2:</div><img src="" id="image2"></div>
                <div class="ImgBox"><div>活動圖片3:</div><img src="" id="image3"></div>
            </div>
        </div> 
        <div class="sidebar">
        <div class="logo"><img src="../back_images/logo.png"></div>
            <div class="sidebarList">
                <ul>
                    <li><a href='custoFormatMag.php'>客製化裝備管理</li>
                    <li><a class="active" href='back_act.php'>活動種類管理</a></li>
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
            <div class="cotentTitle"><h1>活動種類管理</h1><span id="adminName"></span></div>
            <div class="FeaturesBot">
                <div class="contentSearch">
                    <input type="text" name='searchValue' id='search' placeholder="請輸入活動名稱">
                </div>
                <div class="contentBtn">
                    <button id='add'>新增</button>
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
            // console.log($('.actLOCUp').val());
        });
    </script>
    <script>
        $.ajax({
            url: 'act/backAct.php',				
            dataType: 'text',
            success: function(data){
                $('.Table').html(data);
            }
        });
    </script>
<script>
       $('input:checkbox[name="coachNo"]').click(function(){
       
            var coachNoArr = new Array();
        $('input:checkbox:checked[name="coachNo"]').each(function(i) { coachNoArr[i] = this.value; 
        }); 

        
        coachNoArrStr = coachNoArr.join('');
             console.log(coachNoArrStr);
             
             // $('.coachShow').html(coachNoArrStr);
       $('.coachNameUp').attr('value',coachNoArrStr);      
       }) 
       $('input:checkbox[name="actType"]').click(function(){
         actTypeArr = new Array();
        $('input:checkbox:checked[name="actType"]').each(function(j) { actTypeArr[j] = this.value; 
        }); 

        var actTypeRadio = $('input:radio:checked[name="actType"]').val();
        console.log(actTypeArr);

        var actTypeAllStr =TypeArr.concat(actTypeArr);
            console.log(actTypeAllStr);

            actTypeAllStrUp = actTypeAllStr.join("| ");
            console.log(actTypeAllStrUp);
            $('.actTypeUp').attr('value',actTypeAllStrUp);

        
        

       })
       $('input:radio[name="actType"]').click(function(){
            var actTypeRadio = $('input:radio:checked[name="actType"]').val();
            console.log(actTypeRadio);
            if($('input:radio:checked[name="actType"]') != undefined){
            $('#sendForm').removeAttr('disabled',false);
       }
           

       })
       $('input:radio[name="actType"]').click(function(){
       
            TypeArr = new Array();
        $('input:radio:checked[name="actType"]').each(function(k) { TypeArr[k] = this.value; 
            console.log(TypeArr);
            if(actTypeArr){
                var actTypeAllStr =TypeArr.concat(actTypeArr);
                console.log(actTypeAllStr);
                actTypeAllStrUp = actTypeAllStr.join("| ");
                console.log(actTypeAllStrUp);
                $('.actTypeUp').attr('value',actTypeAllStrUp);
            }
            else{
                $('.actTypeUp').attr('value',TypeArr);
            }
            
        }); 
    }) 
       // if($('input:radio:checked[name="actType"]').val() == undefined){
       //      $('#sendForm').attr('disabled',true);

            
       // }



       console.log($('input:radio:checked[name="actType"]').val());

       $('#sendForm').click(function(e){
            if($('input:radio:checked[name="actType"]').val() == undefined || $('input:checkbox:checked[name="actType"]').val() == undefined){
                e.preventDefault();
                alert('還有選項未填選');
           }
       })
       

       

    

</script>

<script>
$(document).on('click', '.upBtn', function(){
    var selectNo = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().prev().val();
    var selectPrice = $(this).parent().prev().prev().prev().prev().find('input').val();
    var selectContent = $(this).parent().prev().find('textarea').val();
    console.log(selectContent);
    $.ajax({
            url: 'act/back_actUp.php',    
            data: {selectNo:selectNo,selectPrice:selectPrice,selectContent:selectContent},    
            type: 'POST',               
            dataType: 'text',           
            success: function(data){
                 alert('修改成功');   
            }
            
        });

})
if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');

}
$('#search').keyup(function(){
console.log($('#search').val());
    $.ajax({
        url: 'act/backAct.php',              
        data: {searchContent:$('#search').val()},               
        type: 'POST',               
        dataType: 'text',
        success: function(data){
            console.log(data);
            $('.Table').html(data);
        }
    });
})
</script>
<script>
function doFirst(){
    document.getElementById('thefile').onchange = fileChange;
    document.getElementById('thefile2').onchange = fileChange2;
    document.getElementById('thefile3').onchange = fileChange3;
}
function fileChange(){
    var file = document.getElementById('thefile').files[0];
    console.log(this);
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
        var image = document.getElementById('image');
        image.src = this.result;
        image.style.maxWidth = '300px';
        image.style.maxHeight = '200px';
    });
}
function fileChange2(){
    var file = document.getElementById('thefile2').files[0];
    console.log(this);
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
        var image = document.getElementById('image2');
        image.src = this.result;
        image.style.maxWidth = '300px';
        image.style.maxHeight = '200px';
    });
}
function fileChange3(){
    var file = document.getElementById('thefile3').files[0];
    console.log(this);
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
        var image = document.getElementById('image3');
        image.src = this.result;
        image.style.maxWidth = '300px';
        image.style.maxHeight = '200px';
    });
}
window.addEventListener('load',doFirst);

</script>
</body>
</html>