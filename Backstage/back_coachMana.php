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
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
    <script src="js/backLogOut.js"></script>
    <title>教練管理系統</title>
    <style>
        *{
            /* outline: 1px solid #f00; */
            
        }
        #chORact{
            width: auto;
            padding:5px;
            font-size: 24px;
            margin-bottom: 10px;
        }
        table:nth-child(1){
            margin-bottom:20px;
        }
        #chCalendar{
            width:100%;
            box-sizing:border-box;
            background-color:transparent;
            padding:10px;
        }
        
        #chdiver{
            width:30%;
            height:2px;
            background-color:#555;
            position: absolute;
            top:0;
            bottom:0;
            margin:auto;
            left:0;
            right:0;
        }
        #chWeekList ul{
            width:100%;
            font-size: 0;
        }
        #chWeekList ul li{
            box-sizing: border-box;
            display: inline-block;
            width: 14.28%;
            font-size: 30px;
            text-align: center;
            padding:30px;
            margin-top: 20px;
            
            margin-bottom: 10px;
            color:#fff;
        }
        .chDayList ul{
            width:100%;
            font-size: 0;
        }
        .chDayList ul li{
            box-sizing: border-box;
            display: inline-block;
            width: 14.28%;
            font-size: 30px;
            text-align: center;
            position: relative;
            
        }
        .chLightgrey{
            color:#888;
            
            padding: 30px;
        }
        .chWhite{
            color:#fff;
            padding: 30px;
            cursor: pointer;
        }
        .chLeave{
            color:#B9393D;
            padding: 30px;
            cursor: pointer;
        }
        .chLeave p{
            padding:5px 0;
            font-size:16px;
            font-weight:900;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin:auto;
        }
        .chReserve{
            color:#ffb242;
            padding: 30px;
        }
        .chReserve p{
            padding:5px 0;
            font-size:16px;
            font-weight:900;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin:auto;
        }
        .chWhite:hover{
            color:#ffb242;
        }
        #chCalBody{
            position: relative;
            background-color: rgba(255,255,255,.1);
            box-sizing: border-box;
            padding:60px 10px;
        }
        #chLeft{
            position: absolute;
            font-size: 30px;
            left: -50px;
            color:#fff;
            opacity: 0.3;
            cursor: pointer;
            top: 30%;
        }
        #chRight{
            position: absolute;
            font-size: 30px;
            right: -50px;
            color:#fff;
            opacity: 0.3;
            cursor: pointer;
            top: 30%;
        }
        #calbox{
            width: 100%;
            display:flex;
            flex-wrap:wrap;
            justify-content: space-between;
            padding:5px 150px 5px 80px;
            box-sizing: border-box;
            background-color: #222222;
        }
        .contentSearch{
            width: 30%;
        }
        #chOption{
            width: 100%;
            font-size: 32px;
            padding:16px 0;
            background-color:transparent;
            border:none;
            color:#fff;
            font-family: 'Microsoft JhengHei';
        }
        #chOption option{
            background-color: #222;
        }
        #chYearMonth{
            width: 30%; 
            display:flex;
            flex-wrap:wrap;
            font-size:64px;
            justify-content: space-between;
            color:#555;
            position: relative;

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
                    <li><a class="active" href='back_coachMana.php'>教練管理系統</a></li>
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
            <div class="cotentTitle"><h1>教練管理系統</h1><span id="adminName"></div>
            <div class="FeaturesBot">
                <div class="contentBtn">
                    <!-- <button>新增</button> -->
                </div>
            </div>
            <div class="tableBox">
                <div id="chCalendar">
                    <div id="calbox">
                        <div class="contentSearch">
                            <select id="chOption">
                                <option value="1">Amos</option>
                                <option value="2">郭惠民</option>
                                <option value="3">薄荷</option>
                                <option value="4">嘉霖</option>
                                <option value="5">小白豬</option>
                                <option value="6">妮安欣</option>
                                <option value="7">董董</option>
                            </select>
                        </div>
                        <div id="chYearMonth">
                            <div id="chMonth"></div>
                            <div id="chdiver"></div>
                            <div id="chYear"></div>
                            <i class="fas fa-chevron-circle-left" id='chLeft'></i>
                            <i class="fas fa-chevron-circle-right" id='chRight'></i>
                        </div>
                    </div>
                    <div id="chCalBody">
                        <div id="chWeekList">
                            <ul>
                                <li>Mon</li>
                                <li>Tus</li>
                                <li>Wen</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                                <li>Sun</li>
                            </ul>
                        </div>
                        <div class="chDayList">
                            <ul id="chDays"></ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
<script>
        $('#chOption').change(function(){
            clcoach = $(this).val();
            $.ajax({
                url: 'coachDate/calendar.php',
                data: {chgcoach:clcoach},
                type:'POST',
                dataType: 'text',
                success: function(data){
                    $('#chAct').html(data);
                    $.ajax({
                        url: 'coachDate/backCalendar.php',
                        data: {chgcoach:clcoach},
                        type:'POST',
                        dataType: 'text',
                        success: function(Ddata){
                            // refreshDate(Ddata);
                            NWDdata = Ddata;
                            // console.log(Ddata);
                        }
                    });
                    $.ajax({
                        url: 'coachDate/backCalendar_c.php',
                        data: {chgcoach:clcoach},
                        type:'POST',
                        dataType: 'text',
                        success: function(Gdata){
                            console.log(NWDdata);
                            refreshDate(NWDdata,Gdata);
                        }
                    });
                }
            })
        });
            function ajaxDate(clcoach){
            $.ajax({
                url: 'coachDate/calendar.php',
                data: {chgcoach:clcoach},
                type:'POST',
                dataType: 'text',
                success: function(data){
                    $('#chAct').html(data);
                    $.ajax({
                        url: 'coachDate/backCalendar.php',
                        data: {chgcoach:clcoach},
                        type:'POST',
                        dataType: 'text',
                        success: function(Ddata){
                            // refreshDate(Ddata);
                            NWDdata = Ddata;
                            // console.log(Ddata);
                        }
                    });
                    $.ajax({
                        url: 'coachDate/backCalendar_c.php',
                        data: {chgcoach:clcoach},
                        type:'POST',
                        dataType: 'text',
                        success: function(Gdata){
                            console.log('請假日期'+NWDdata);
                            refreshDate(NWDdata,Gdata);
                        }
                    });
                }
            })
            }
            ajaxDate(clcoach=1);
    </script>
<script>
    var month_olympic = [31,29,31,30,31,30,31,31,30,31,30,31];
    var month_normal = [31,28,31,30,31,30,31,31,30,31,30,31];
    var month_name = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sep","Oct","Nov","Dec"];
    var holder = document.getElementById('chDays');
    var chMonth = document.getElementById('chMonth');
    var chYear = document.getElementById('chYear');
    var my_date = new Date();
    var my_year = my_date.getFullYear();
    var my_month = my_date.getMonth();
    var my_day = my_date.getDate();
    var chLeft =document.getElementById('chLeft');
    var chRight =document.getElementById('chRight');
    
    function dayStart(month, year) {
        var tmpDate = new Date(year, month, 1);
        return (tmpDate.getDay());
    }

    function daysMonth(month, year) {
        var tmp = year % 4;
        if (tmp == 0) {
            return (month_olympic[month]);
        } else {
            return (month_normal[month]);
        }
    }
    function refreshDate(NWDdata,Gdata){
        var str = "";
        var totalDay = daysMonth(my_month, my_year); //抓出该月總天數
        var firstDay = dayStart(my_month, my_year); //抓出該月第一天是星期幾
        firstDay = firstDay == 0 ? 7 : firstDay; //如果他是0的話  就把他變7
        var myclass;
        for(var i=1; i<firstDay; i++){
            str += "<li><\/li>";
        }
        for(var i=1; i<=totalDay; i++){
            if((i < my_day && my_year == my_date.getFullYear() && my_month== my_date.getMonth()) || my_year < my_date.getFullYear() || ( my_year == my_date.getFullYear() && my_month < my_date.getMonth())){
                myclass = " class='chLightgrey'"; //當日期是過去，以淺灰色顯示
            }else if (i==my_day && my_year==my_date.getFullYear() && my_month==my_date.getMonth()){
                myclass = " class='chWhite'"; //不用惹
            }else{
                myclass = " class='chWhite'"; //當日期是未來，以白色顯示
            }
            str += "<li"+myclass+">"+i+"<\/li>";
        }
        holder.innerHTML = str;
        chMonth.innerHTML = month_name[my_month];
        chYear.innerHTML = my_year.toString().substr(2,2);
        var dayArr = ['01','02','03','04','05','06','07','08','09'];
        
        
        for(var b =0;b<$('.chWhite').length;b++){
            var phpday = $('.chWhite').eq(b).text();
            var now_month = my_month+1;
            for(var r =1;r<=9;r++){
                if(now_month==r){
                    now_month=dayArr[r-1];
                    // console.log(now_month);
                }
            }
            for(var r =1;r<=9;r++){
                if(phpday==r){
                    phpday=dayArr[r-1];
                    // console.log(phpday);
                }
            }
            
            $('.chWhite').eq(b).append('<input type="hidden" value="'+my_year+'-'+now_month+'-'+phpday+'" name="coachDate">');
        }
        console.log(NWDdata);
        var newData =NWDdata.split("|");
        console.log('我進來了'+Gdata);
        console.log(newData);
        var newGdata = Gdata.split("|");
        for(var p in newData){
            console.log(newData[p]);
            NewChDate = newData[p];
            for(var b =0;b<$('.chWhite').length;b++){
                oldDate = $('.chWhite').eq(b).find('input').val();
                if(oldDate==NewChDate){
                    $('.chWhite').eq(b).addClass('chLeave');
                    $('.chWhite').eq(b).removeClass('chWhite');
                }
            }
        }
        for(var q in newGdata){
            console.log(newGdata[q]);
            NewChGDate = newGdata[q];
            for(var c =0;c<$('.chWhite').length;c++){
                oldGDate = $('.chWhite').eq(c).find('input').val();
                if(oldGDate==NewChGDate){
                    $('.chWhite').eq(c).addClass('chReserve');
                    $('.chWhite').eq(c).removeClass('chWhite');
                }
            }
        }
        $('.chWhite').on('click',function(){
            scoachNo = $('#chOption').val();
            scoachDate = $(this).find('input').val(); 
            // console.log(scoachNo);
            // console.log(scoachDate);
            $(this).addClass('chLeave');
            $(this).removeClass('chWhite');
            
            $.ajax({
                url: 'coachDate/leave.php',
                data: {sNo:scoachNo,sDate:scoachDate},
                type:'POST',
                dataType: 'text',
                success: function(data){
                    // alert('請假成功');
                    ajaxDate(clcoach=scoachNo);
                }
            })
        });
    $('.chLeave').on('click',function(){
            lcoachNo = $('#chOption').val();
            lcoachDate = $(this).find('input').val(); 
        // console.log(lcoachNo);
        // console.log(lcoachDate);
        $(this).addClass('chWhite');
        $(this).removeClass('chLeave');
        $.ajax({
            url: 'coachDate/leave.php',
            data: {lNo:lcoachNo,lDate:lcoachDate},
            type:'POST',
            dataType: 'text',
            success: function(data){
                // alert('取消成功');
                ajaxDate(clcoach=lcoachNo);
            }
        })
    })
    $('.chLeave').append('<p>已請假</p>');
    $('.chReserve').append('<p>已被預約</p>');
    }
    chLeft.onclick = function(e){
        e.preventDefault();
        my_month--;
        if(my_month<0){
            my_year--;
            my_month = 11;
        }
        clcoach = $('#chOption').val();
        // refreshDate();
        ajaxDate(clcoach);
    }
    chLeft.onmouseover = function(e){
        $('#chLeft').css('opacity','1');
    }
    chLeft.onmouseout = function(e){
        $('#chLeft').css('opacity','0.3');
    }
    chRight.onclick = function(e){
        e.preventDefault();
        my_month++;
        if(my_month>11){
            my_year++;
            my_month = 0;
        }
        clcoach = $('#chOption').val();
        console.log(clcoach);
        // refreshDate();
        ajaxDate(clcoach);
    }
    chRight.onmouseover = function(e){
        $('#chRight').css('opacity','1');
    }
    chRight.onmouseout = function(e){
        $('#chRight').css('opacity','0.3');
    }
    $('.chWhite').mouseover(function(){
        $('#chLeft').css('opacity','0');
        $('#chLeft').css('cursor','default');
        $('#chRight').css('opacity','0');
        $('#chRight').css('cursor','default');
        $('#chLeft').attr("disabled",true);
        $('#chRight').attr("disabled",true);
    });
    $('.chWhite').mouseout(function(){
        $('#chLeft').css('opacity','0.3');
        $('#chLeft').css('cursor','pointer');
        $('#chRight').css('opacity','0.3');
        $('#chRight').css('cursor','pointer');
        $('#chLeft').attr("disabled",false);
        $('#chRight').attr("disabled",false);
    });          
    if(<?php echo $_SESSION["adminNo"] ?> !=1){
    $('#adminLevel').css('display','none');
}
</script>
</body>
</html>