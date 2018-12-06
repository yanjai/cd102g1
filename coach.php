<?php 
    ob_start();
	session_start();
	// if(isset($_SESSION['coachDate'])){echo $_SESSION['coachDate'];
	if(isset($_SESSION['memNo'])){
		$memNo = $_SESSION['memNo'];
	}else{
		$memNo = 0;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<meta content="ie=edge" http-equiv="X-UA-Compatible">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/member.css"> 
	<link href="css/calendar.css" rel="stylesheet" type="text/css">
	<link href="css/chLightBox.css" rel="stylesheet" type="text/css">
	<link href="css/coach.css" rel="stylesheet" type="text/css">
	<link href="css/font.css" rel="stylesheet" type="text/css">
	<link href="css/CSS animation.css" rel="stylesheet" type="text/css">
	<link href="css/fish.css" rel="stylesheet" type="text/css">
	<link href="images/ico.ico" rel="Shortcut Icon" type="image/x-icon">
	<link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/bubbles.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/memlogin.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src='js/notLoggin.js'></script>
	<script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
	<title>教練團隊</title>
	<style>
	       *{
	           /* outline: 1px solid #f00; */
		   }
		   #chCalendar #chCalBody .chDayList #chDays .chOrange{
				color: rgb(206,153,53);
				cursor: default;
		  }
		  #chCalendar #chCalBody .chDayList #chDays .chRed{
				color: rgb(255, 98, 101);
		  }
		  .catchch{
			  position:absolute;
			  opacity:0;
		  }
		  #catch1{
			  top:50px;
		  }
		  #catch2{
			  top:650px;
			}
		  #catch3{
				top:1350px;
		    }
		  #catch4{
				top:2250px;
			}
		  #catch5{
				top:3050px;
			}
		  #catch6{
				top:3850px;
			}
		  #catch7{
				top:4550px;
			}
			#fishRem{
				width:20%;
				position:fixed;
				z-index:999;
				margin:auto;
				left:0;
				right:0;
				bottom:50%;
				top:50%;
				animation: bounceInDown 3s;
				display:none;
			}
			#fishRem #cutefish{
				display:inline-block;
				width:50%;
			}
			#fishRem #dag{
				position:absolute;
				left:-300px;
				display:inline-block;
				bottom:-150px;
				width:80%;
			}
			#dagbox{
				position:absolute;
				left:-220px;
				display:inline-block;
				bottom:-110px;
				/* width:70%; */
				/* background-color:#fff; */
			}
			.colorRemText{
				padding:5px;
			}
			@media screen and (max-width:767px){
					#fishRem #dag{
						position:absolute;
						left:-100px;
						display:inline-block;
						bottom:20px;
						width:280%;
					}
					#dagbox{
					position:absolute;
					left:-50px;
					display:inline-block;
					bottom:30px;
					/* width:70%; */
					/* background-color:#fff; */
				}
					.colorRemText{
						padding:2px;
				}
				#cutefish{
					position:absolute;
					top:-30px;
					left:100px;
				}
				.catchch{
					position:absolute;
					opacity:0;
					display:none;
				}
			}
	</style>
</head>
<body>
<a name="catch1" class="catchch" id="catch1">7</a>
<a name="catch2" class="catchch" id="catch2">7</a>
<a name="catch3" class="catchch" id="catch3">7</a>
<a name="catch4" class="catchch" id="catch4">7</a>
<a name="catch5" class="catchch" id="catch5">7</a>
<a name="catch6" class="catchch" id="catch6">7</a>
<a name="catch7" class="catchch" id="catch7">7</a>
<div id="fishRem">
	<img src="images/dag.png" id='dag'>
	<div id="dagbox">
		<div class="colorRem">
			<div class="colorRemText">灰:不能選</div>
			<div class="colorRemText">橘:教練請假</div>
			<div class="colorRemText">紅:還沒滿團可預約</div>
			<div class="colorRemText">白:可預約</div>
		</div>
	</div>
	<img src="images/culogo2.png" id="cutefish">
</div>	
<nav>
	<div class="navbar" id="navbar">
		<div class="logobox">
			<a href="seatunnel.php"><img class="logo" src="images/logo.png"></a>
		</div>
		<div class="top">
			<ul class="headerIcon">
				<li>
					<a class="memUp" href="memUpdate.php">
						<i class="fas fa-user"></i>
					</a>
					<span id="memName">&nbsp;</span>
					<span id="spanLogin" onclick="document.getElementById('memJump').style.display='block'" style="width:auto;">登入</span>
					
				</li>	
				
				<li><a href="shoppingCart.php"><i class="fas fa-cart-plus"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<label>
			<div class=".navContainer">
				<input type="checkbox" name="menu" class="checkboxMenu" id="checkboxMenu">
				<div class="hanMenu">
					<span class="han hanTop"></span>
					<span class="han hanMid"></span>
					<span class="han hanBtm"></span>
				</div>
				<ul class="navmenu">
					<li><a href="customWetsuitSex.php">客製潛水衣</a></li>
					<li><a href="divinggear.php">潛水裝備</a></li>
				    <li><a href="wholeActivity.php">活動總覽</a></li>
				    <li class="thispage"><a href="coach.php">教練團隊</a></li>
				    <li><a href="chBot.php">教練諮詢</a></li>
				    <li><a href="aboutus.php">關於我們</a></li>
				    <li class="lastMenu"><a href="FishingGarbage.php">守護海洋</a></li>
				</ul>
			</div>
		</label>	
	</div>
</nav>
<!-- 評論lightbox開始 -->
<div id="chBlack">
	<div id="chLightBox">
		<div id="chLbClose"></div>
		<div class="chLbtitle"><h3>教練評論</h3></div>
		<div id='ajaxcoach'>

		</div>
		<div class="chLbBtn">
			<button id='chMoreBtn'>More</button>
		</div>
		<div class="chScMeBox">
			<!-- <div class="chLbNowRtTitle"><h4>評分:</h4></div> -->
			<div id="water-progress-wrapper">
				<div id="wrapper">
					<div class="wave-progress far"></div>
					<div class="wave-progress mid"></div>
					<div class="wave-progress near"></div>
				</div>
				<div id="chLbScBox">評分</div>
			</div>
			<div id="chLbMessageBox">
				<div id="enterBox"><img src="images/enter.png"></div>
				<input type="hidden" id='hdsc'>
				<textarea type="text" maxlength="100" id='con' placeholder='我要評論' maxlength="80"></textarea>
			</div>
		</div>
	</div>
</div>
<!-- 評論lightbox結束 -->
<!-- 萬年曆lightbox開始 -->
<form id="chCalendar" action="coaToAct.php" method="get">
	<div id="chClose"></div>
	<div id="chSelect">
		<div id="chCoa">
			<select id="chOption" name="chOption">
				<option value="1">
					Amos
				</option>
				<option value="2">
					郭惠民
				</option>
				<option value="3">
					薄荷
				</option>
				<option value="4">
					嘉霖
				</option>
				<option value="5">
					小白豬
				</option>
				<option value="6">
					妮安欣
				</option>
				<option value="7">
					董董
				</option>
			</select>
		</div>
		<div id="chAct">
			
		</div>
	</div>
	<div id="chYearMonth">
		<div id="chMonth"></div>
		<div id="chDiver"></div>
		<div id="chYear"></div>
	</div>
	<div id="chCalBody">
		<i class="fas fa-chevron-circle-left" id='chLeft'></i>
		<i class="fas fa-chevron-circle-right" id='chRight'></i>
		<div id="chWeekList">
			<ul>
				<li>M</li>
				<li>T</li>
				<li>W</li>
				<li>T</li>
				<li>F</li>
				<li>S</li>
				<li>S</li>
			</ul>
		</div>
		<div class="chDayList">
			<ul id="chDays"></ul>
		</div>
	</div>
	<div id="chBtnWrap">
		<input id="chSubmit" type="submit" value='確認送出' disabled="disabled">
	</div>
</form>
<!-- 萬年曆lightbox結束 -->
<!-- 教練頁內容分7頻 -->
<!-- 燈箱：登入 -->
<div id="memJump" class="modal">
    <form class="modalContent animate" action="/action_page.php">
      <div class="imgContainer">
        <span onclick="document.getElementById('memJump').style.display='none'" class="close" title="Close Modal">&times;</span>
		<img src="images/logo.png" alt="Avatar" class="avatar">
		<div class="fishSwim">
			<div class="fish1">
				<img src="images/memfish1.png" alt="fish">
			</div>
		</div>
      </div>
      <div class="memContainer">
      	
		<input class="member" type="text" placeholder="帳號(最多12碼)" name="memId" id="memId" minlength="1" maxlength="12" required>
		<input class="member" type="password" placeholder="密碼" name="memPsw" id="memPsw" minlength="6" maxlength="12" required>
		
		<button class="member sign log" type="button" id="btnLogin" onclick="document.getElementById('memJump').style.display='none'">
			<!-- <a href="memUpdate.html">登入</a>	 --> 登入
		</button>
        <button class="member sign fbLog" type="button" id="btnFBLogin" onclick="FB.login()">FB登入</button>
        <!-- <button onclick="FB.logout()">FB登出</button> -->
		<div class="clearfix"></div>
		<div class="regPsw">
			<a class="right reg" href="memRegister.html">會員註冊</a>
			<a class="right psw" href="memPassMail.html">忘記密碼</a>
			<div class="clearfix"></div>
		</div>
		<img class="cuGrass" src="images/cuGrass.png">	
	  </div>
    </form>
</div>
<!-- 燈箱：結束 -->
<!-- 判斷燈箱 -->
<div id="NotLogged">
	<div id="NotBtnBox">
		<p>您還沒登入</p>
		<button id="reBtn">返回</button>
		<button id="GoToBtn">登入</button>
	</div>
</div>	
<!-- 判斷燈箱結束 -->
<div id="fish">
	<img src="images/jell01.png">
</div>
<div id="fish2">
	<img src="images/jell02.png">
</div>
<div id="fish3">
	<img src="images/jell01.png">
</div>
<div id="fish4">
	<img src="images/fish05.png">
</div>
<div id="fish5">
	<img src="images/fish06.png">
</div>
<div id="fish6">
	<img src="images/fish07.png">
</div>
<div id="fish7">
	<img src="images/fish08.png">
</div>
<div id="diver1">
	<img src="images/diver07.png">
</div>
<div class="chFull"></div>
<!-- 教練頁內容結束 -->
<!-- 教練頁RWD -->
<div class="chRwdFull">
</div>
<!-- RWD結束 -->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>
<div class="gotoTop">
	<a href="#top">
	<span>Top</span>
	<img src="images/gotop.png">
	</a>
</div>
<!-- 萬年曆JS 開始 -->
<script>
	$('#chOption').change(function(){
		clcoach = $(this).val();
		$.ajax({
			url: 'calendar.php',
			data: {chgcoach:clcoach},
			type:'POST',
			dataType: 'text',
			success: function(data){
				$('#chAct').html(data);
				$('#chSubmit').attr('disabled',true);
				$.ajax({
					url: 'calendarAjax.php',
					data: {chgcoach:clcoach},
					type:'POST',
					dataType: 'text',
					success: function(Ddata){
						refreshDate(Ddata);
						GDdata = Ddata;
					}
				});
				$('#chActOption').change(function(){
					slact = $(this).val();
					// console.log('活動'+slact);
					// console.log('教練'+clcoach);
					$.ajax({
						url: 'group.php',
						data: {chgcoach:clcoach,chgcat:slact},
						type:'POST',
						dataType: 'text',
						success: function(Gdata){
							console.log('被預約日期'+Gdata);
							$('#chSubmit').attr('disabled',true);
							refreshDate(GDdata,Gdata);
						}
					});
				})
			}
		})
	});
		function ajaxDate(clcoach){
		$.ajax({
			url: 'calendar.php',
			data: {chgcoach:clcoach},
			type:'POST',
			dataType: 'text',
			success: function(data){
				$('#chAct').html(data);
				$.ajax({
					url: 'calendarAjax.php',
					data: {chgcoach:clcoach},
					type:'POST',
					dataType: 'text',
					success: function(Ddata){
						refreshDate(Ddata);
						GDdata = Ddata;
					}
				});

				$('#chActOption').change(function(){
					slact = $(this).val();
					// console.log('活動'+slact);
					// console.log('教練'+clcoach);
					$.ajax({
						url: 'group.php',
						data: {chgcoach:clcoach,chgcat:slact},
						type:'POST',
						dataType: 'text',
						success: function(Gdata){
							console.log('被預約日期'+Gdata);
							refreshDate(GDdata,Gdata);
						}
					});
					
				})

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
	function refreshDate(Ddata,Gdata){
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
			
			$('.chWhite').eq(b).append('<input type="hidden" value="'+my_year+'-'+now_month+'-'+phpday+'" name="coachDate" disabled="true">');
		}
		console.log('請假'+Ddata);
		var newData =Ddata.split("|");
		if(Gdata){
			console.log('預約'+Gdata);
			var newGData =Gdata.split("|");	
			console.log(newGData[0]);
		}
				
		console.log(newData);
		for(var p in newData){
			// console.log(newData[p]);
			NewChDate = newData[p];
			for(var b =0;b<$('.chWhite').length;b++){
				oldDate = $('.chWhite').eq(b).find('input').val();
				if(oldDate==NewChDate){
					$('.chWhite').eq(b).addClass('chOrange');
					$('.chWhite').eq(b).removeClass('chWhite');
				}
			}
		}

		for(var q in newGData){
			console.log(newGData[q]);
			NewGata = newGData[q];

			for(var c =0;c<$('.chOrange').length;c++){
				oldGDate = $('.chOrange').eq(c).find('input').val();
				console.log(oldGDate);
				if(oldGDate==NewGata){
					$('.chOrange').eq(c).addClass('chWhite');
					$('.chOrange').eq(c).addClass('chRed');
					$('.chOrange').eq(c).removeClass('chOrange');
				}
			}
		}
		$('.chWhite').on('click',function(){
		$('.chWhite').removeClass('active');
		$(this).addClass('active');
		$('.chWhite').find('input').attr('disabled','disabled');
		$(this).find('input').removeAttr('disabled');
		$('#chSubmit').removeAttr('disabled');
	});
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
		$('#chSubmit').attr('disabled',true);
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
		$('#chSubmit').attr('disabled',true);
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
	
</script>
<!-- 萬年曆JS 結束 -->
<script>
	$(document).ready(function(){
		// 控制body跟nav的距離 開始
		var navHeight = $('#navbar').height();
		$('body').css('margin-top',navHeight);
	//    $('#chBlack').css('top',navHeight);
		$('#chblack').css('min-height','100vh');
		$(window).resize(function(){
			navHeight = $('#navbar').height();
			$('body').css('margin-top',navHeight);
		//    $('#chBlack').css('top',navHeight);
			$('#chBlack').css('min-height','100vh');
		//    console.log($('body').width());
		})
		// 控制body跟nav的距離 結束
		// 萬年曆跳出來的效果 開始
		
		// 萬年曆跳出來的效果 結束
		$('#chClose').click(function(){//XX的效果
			$("#chCalendar").stop().animate({width: "0"},1000,'easeInOutElastic');
			$("#chCalendar").css('right','-150px');
			$('#chClose').css('opacity','0');
			$('#chClose').css('cursor','default');
			if($('#fishRem').css('display')=='none'){
				$('#fishRem').css('display','block');
			}else{
				$('#fishRem').css('display','none');
			}
		})
		
		
	});

</script>
	<!--GOTO TOP JS start-->
<script>
	$(function(){
		/*點擊.gototop時,緩慢往上滑*/
		$('.gotoTop').on('click', function(e){

			event.preventDefault();
			$('#navbar').css({top:'0',
			opacity:'1'});
			$('body,html').animate({
				scrollTop: 0,
			}, 1500);
		});
		/*捲軸位置在視窗小於100px時,將.gototop隱藏*/
		document.querySelector(".gotoTop").style.display = 'none';
		if($('body').width()>768){
		window.addEventListener('scroll',function(){
			if( document.documentElement.scrollTop < 100){
				document.querySelector('.gotoTop').style.display = 'none';
			}else{
				document.querySelector('.gotoTop').style.display = '';
			}
		});
	}
	});
</script>
		<!--GOTO TOP JS end-->
<script type='text/javascript'>
	function $id(id){
	return document.getElementById(id);
	}
	if($('body').width()>768){
		$('.chFull').on('mousewheel', function(e){
			if(e.originalEvent.wheelDelta > 0) {

				$id("navbar").style.top = '0px';
				$id("navbar").style.opacity = '1';
			}
			else {
				$id("navbar").style.top = '-200px';
				$id("navbar").style.opacity = '.2'; }
		});
	}
</script>
		<!--首頁選單JS 測試 start-->
<script>
	function forhor(){
	$.ajax({
		url:'coachAjax.php',
		dataType:'text',
		async: true,
		success: function(data){
			$('.chFull').html(data);
			$('.chWrap:odd').addClass('chEven');
			$('.chWrap:even').addClass('chOdd');
			$('#chWrap1').removeClass('chOdd');
			var title = "<div class='chTitle bubbles'><h3>教練團隊</h3></div>"
			$('#chWrap1').children('.chWrapContent').before(title);
			firdo();
			scbar();
		// ===================================================scrollmargic 開始
		var controller = new ScrollMagic.Controller({globalSceneOptions: {duration: 0}});//設定開始跟結束的距離
		//setClassToggle 前面是要被附加的元素 後面是要附加甚麼class上去
		var scence_01 = new ScrollMagic.Scene({triggerElement: "#trigger_01",offset: 200,reverse: false})//觸發的元素 、 元素位置下方200才觸發 、true滾輪回去會重複動作
		.setClassToggle('#chWrap1 .chWrapContent .chImg,#chWrap1 .chWrapContent .chProfile,#chWrap1 .chWrapContent .chBox',"active")
		// .addIndicators()//看你設定的觸發位置
		.on("enter" ,function(){
				$('#chWrap1').children().children('.chImg').fadeIn();
				$('#chWrap1').children().children('.chProfile').fadeIn();
				$('#chWrap1').children().children('.chBox').fadeIn();
				// $('#fish').fadeOut(2000);
				if($('body').width()>768){
				$('#fish4').css('right','100%');
				$('#fish4').css('top','15%');
				}
				
		})
		.addTo(controller);

		var scence_02 = new ScrollMagic.Scene({triggerElement: "#trigger_02",offset: -200,reverse: false})
		.setClassToggle('#chWrap2 .chWrapContent .chImg,#chWrap2 .chWrapContent .chProfile,#chWrap2 .chWrapContent .chBox',"active")
		// .addIndicators()
		.on("enter" ,function(){
				$('#chWrap2').children().children('.chImg').fadeIn();
				$('#chWrap2').children().children('.chProfile').fadeIn();
				$('#chWrap2').children().children('.chBox').fadeIn();
				if($('body').width()>768){
				$('#fish5').fadeIn();
				$('#fish5').css('right','100%');
				$('#fish5').css('top','10%');
				}
		})
		.addTo(controller);

		var scence_03 = new ScrollMagic.Scene({triggerElement: "#trigger_03",offset: -100,reverse: false})
		.setClassToggle('#chWrap3 .chWrapContent .chImg,#chWrap3 .chWrapContent .chProfile,#chWrap3 .chWrapContent .chBox',"active")
		// .addIndicators()
		.on("enter" ,function(){
				$('#chWrap3').children().children('.chImg').fadeIn();
				$('#chWrap3').children().children('.chProfile').fadeIn();
				$('#chWrap3').children().children('.chBox').fadeIn();
				if($('body').width()>768){
				$('#fish6').fadeIn();
				$('#fish6').css('right','100%');
				}
		})
		.addTo(controller);

		var scence_04 = new ScrollMagic.Scene({triggerElement: "#trigger_04",offset: -200,reverse: false})
		.setClassToggle('#chWrap4 .chWrapContent .chImg,#chWrap4 .chWrapContent .chProfile,#chWrap4 .chWrapContent .chBox',"active")
		// .addIndicators()
		.on("enter" ,function(){
				$('#chWrap4').children().children('.chImg').fadeIn();
				$('#chWrap4').children().children('.chProfile').fadeIn();
				$('#chWrap4').children().children('.chBox').fadeIn();
				if($('body').width()>768){
				$('#fish7').fadeIn();
				$('#fish7').css('right','100%');
				$('#fish7').css('top','40%');
				}
		})
		.addTo(controller);

		var scence_05 = new ScrollMagic.Scene({triggerElement: "#trigger_05",offset: -100,reverse: false})
		.setClassToggle('#chWrap5 .chWrapContent .chImg,#chWrap5 .chWrapContent .chProfile,#chWrap5 .chWrapContent .chBox',"active")
		// .addIndicators()
		.on("enter" ,function(){
				$('#chWrap5').children().children('.chImg').fadeIn();
				$('#chWrap5').children().children('.chProfile').fadeIn();
				$('#chWrap5').children().children('.chBox').fadeIn();
				if($('body').width()>768){
				$('#diver1').fadeIn();
				$('#diver1').css('left','100%');
				$('#diver1').css('top','65%');
				}
		})
		.addTo(controller);

		var scence_06 = new ScrollMagic.Scene({triggerElement: "#trigger_06",offset: -200,reverse: false})
		.setClassToggle('#chWrap6 .chWrapContent .chImg,#chWrap6 .chWrapContent .chProfile,#chWrap6 .chWrapContent .chBox',"active")
		// .addIndicators()
		.on("enter" ,function(){
				$('#chWrap6').children().children('.chImg').fadeIn();
				$('#chWrap6').children().children('.chProfile').fadeIn();
				$('#chWrap6').children().children('.chBox').fadeIn();
		})
		.addTo(controller);

		var scence_07 = new ScrollMagic.Scene({triggerElement: "#trigger_07",offset: -100,reverse: false})
		.setClassToggle('#chWrap7 .chWrapContent .chImg,#chWrap7 .chWrapContent .chProfile,#chWrap7 .chWrapContent .chBox',"active")
		// .addIndicators()
		.on("enter" ,function(){
				$('#chWrap7').children().children('.chImg').fadeIn();
				$('#chWrap7').children().children('.chProfile').fadeIn();
				$('#chWrap7').children().children('.chBox').fadeIn();
				
		})
		.addTo(controller);
		// ==========================================================================scrollmargic 結束
		// ==========================================================================活動hover 開始
		$('.chAct ul li').hover(function(){
			// console.log($(this).children('a').width());
			var borderWidth = $(this).children('a').width();
			$(this).parent().find('.chBorder').css('width',borderWidth);
			// console.log('li的'+$(this).offset().left);
			var lioffset = $(this).offset().left;
			// console.log('ul'+$(this).parent().offset().left);
			var uloffset = $(this).parent().offset().left;
			var newway = lioffset - uloffset;
			$(this).parent().find('.chBorder').css('left',newway);
			// $(this).find('i').removeClass('fa-sort-up');
			$(this).find('i').addClass('active');
		});
		$('.chAct ul li').mouseout(function(){
			// <i class="fas fa-caret-right"></i>
			$(this).find('i').removeClass('active');
		});
		// ==========================================================================活動hover 結束
		$('#chCalendar').unbind('click').click(function(){
			if($('body').width()<768){
				$('#fishRem').css('display','none');
			}
		})
		$('.chRese').unbind('click').click(function(){//萬年曆彈跳效果包含X的效果
			bodyWidth = $('body').width();
			if($('#fishRem').css('display')=='none'){
				$('#fishRem').css('display','block');
			}else{
				$('#fishRem').css('display','none');
			}
			
		$(window).resize(function(){
			bodyWidth = $('body').width();
		})
			if($('#chCalendar').width()==0){
				if(bodyWidth<768){
				$("#chCalendar").stop().animate({width: "100%"},1000,'easeInOutElastic');
				}
				else if(bodyWidth<992){
					$("#chCalendar").stop().animate({width: "50%"},1000,'easeInOutElastic');
				}
				else{
				$("#chCalendar").stop().animate({width: "30%"},1000,'easeInOutElastic');
				}

				$("#chCalendar").css('right','0');
				$('#chClose').css('opacity','1');
				$('#chClose').css('cursor','pointer');
			}else{
				$("#chCalendar").stop().animate({width: "0"},1000,'easeInOutElastic');
				$("#chCalendar").css('right','-150px');
				$('#chClose').css('opacity','0');
				$('#chClose').css('cursor','default');
			}
		});
		// =================================================================萬年曆 結束
		
		$('.chBtnComment').click(function(){
			$('#chBlack').stop().animate({
				height:100+'vh',
				width:100+'%'
			},600);
			$('#water-progress-wrapper').delay(600).queue(function(){
				var all = $('#water-progress-wrapper').width();
				console.log('寬'+all);
				$('#water-progress-wrapper').css('height',all+'px');
				$('#wrapper').css('height',all+'px');
				if($('body').width()>768){
					$('#con').css('height',all+'px');
				}else{
					$('#con').css('height','304.75px');
				}
			});
			$('#chLbselectCh ul .chSelectLi').addClass('active');
			$('.chLbcommentBox').css('height',300);
			$('#chMoreBtn').css('display','block');
			
		});
		
		}
		
	});
	}
	window.addEventListener('load',forhor);
	function firdo(){
		defaultBar=document.getElementById('water-progress-wrapper');
		rtbar=document.getElementsByClassName('wave-progress');
		Lb=document.getElementById('chLightBox');
		defaultBar.addEventListener('click',clickbar);
		bar = true;
		sc=document.getElementById('chLbScBox');
		defaultBar.addEventListener('mousemove',mousebar);
		bodyWidth2=document.body.clientWidth;
		// console.log(bodyWidth2);
			function clickbar(e){
				var boxScroll = document.getElementById('chLightBox').scrollTop;
				if(bodyWidth2<768){
					var newHeight = (defaultBar.offsetTop+defaultBar.clientHeight-e.clientY-boxScroll);
					// console.log(newHeight);
					for(var i = 0;i<3;i++){
						rtbar[i].style.height = newHeight + 'px';
					}
					sc.innerHTML=(newHeight/defaultBar.clientHeight*100).toFixed(0)+'%';
				}else{
					if(bar==true){
						bar = false;
						defaultBar.removeEventListener('mousemove',mousebar);
					}else{
						bar = true;
						defaultBar.addEventListener('mousemove',mousebar);
						var newHeight = (defaultBar.offsetTop+defaultBar.clientHeight-e.clientY-boxScroll);
						console.log(newHeight);
						for(var i = 0;i<3;i++){
						rtbar[i].style.height = newHeight + 'px';
						}
					}
				}
			}
		function mousebar(e){
			var boxScroll = document.getElementById('chLightBox').scrollTop;
				// console.log('滑鼠Y座標'+e.clientY);
				// console.log('元素跟視窗距離'+defaultBar.offsetTop);
				var newHeight = (defaultBar.offsetTop+defaultBar.clientHeight-e.clientY-boxScroll);
				// console.log('海浪'+newHeight);
				for(var i = 0;i<3;i++){
					rtbar[i].style.height = newHeight + 'px';
				}
				sc.innerHTML=(newHeight/defaultBar.clientHeight*100).toFixed(0)+'%';
			}
	}
	// window.addEventListener('load',firdo);
	function scbar(){
		for(var i =0;i<$('.chPerCommentBox').length;i++){
			var sc = parseInt($('.chPerCommentBox').eq(i).find('p').eq(2).text());
			// console.log(sc);
			$('.chPerCommentBox').eq(i).children('.chPerRating').children('.chPerRatingBar').animate({width:sc+'%'},600);
		 }
		 for(var i =0;i<$('.chCommentBox').length;i++){
			var totalsc = parseInt($('.chCommentBox').eq(i).children('.chtotalScore').text());
			// console.log('總評分'+totalsc);
			$('.chCommentBox').eq(i).children('.chRating').children('.chRatingBar').animate({width:totalsc+'%'},600);
		 }
	}
	function rwdajax(no){
	 $.ajax({
			url: 'rwdcoach.php',				
			data: {coachNo:no},				
			type: 'POST',				
			dataType: 'text',
			success: function(data){
				$('.chRwdFull').html(data);
				$('.chContent').addClass('active');
				$('#nextCoach').unbind('click').click(function(){
					if(no==7){
						no=1;
					}else{
						no+=1;
					}
					say(no);
				})
				$('#prevCoach').unbind('click').click(function(){
					if(no==1){
						no=7;
					}else{
						no-=1;
					}
					say(no);
				})
				// ==========================================================
				$('.chBtnComment2').click(function(){
				$('#chBlack').stop().animate({
						height:100+'vh',
						width:100+'%'
					},600);
					$('#water-progress-wrapper').delay(600).queue(function(){
						var all = $('#water-progress-wrapper').width();
						console.log('寬'+all);
						$('#water-progress-wrapper').css('height',all+'px');
						$('#wrapper').css('height',all+'px');
						$('#con').css('max-height',all+'px');
					});
					$('.chLbcommentBox').css('height',200);
					console.log('高度'+liHeight);
					$('#chMoreBtn').click(function(){
							$('.chLbcommentBox').css('height',auto);
							$(this).css('display','none');
					});
					$('#chMoreBtn').css('display','block');
				})
				// =====================================================
				$('.chRese').click(function(){//萬年曆彈跳效果包含X的效果
					bodyWidth = $('body').width();
					
					$(window).resize(function(){
					bodyWidth = $('body').width();
					
				})
			if($('#chCalendar').width()==0){
				if(bodyWidth<768){
				$("#chCalendar").stop().animate({width: "100%"},1000,'easeInOutElastic');
				}
				else if(bodyWidth<992){
					$("#chCalendar").stop().animate({width: "50%"},1000,'easeInOutElastic');
				}
				else{
				$("#chCalendar").stop().animate({width: "30%"},1000,'easeInOutElastic');
				}

				$("#chCalendar").css('right','0');
				$('#chClose').css('opacity','1');
				$('#chClose').css('cursor','pointer');
			}else{
				$("#chCalendar").stop().animate({width: "0"},1000,'easeInOutElastic');
				$("#chCalendar").css('right','-150px');
				$('#chClose').css('opacity','0');
				$('#chClose').css('cursor','default');
			}
		});
		// =================================================================萬年曆 結束
			}
		});
	}
	function say(no){
		rwdajax(no);
	}
	window.addEventListener('load',rwdajax(1));

	var index = {
		init : function(){
			this.aaa = "56777";
			this.bindEvent();
			this.render();
		},
		bindEvent : function(){
			var _this = this;
		},
		render : function(){
			var _this = this;
			console.log(_this.aaa);
		},
	}
	//index.init();
	// ==============================================RWDAjax 結束
</script>
<script> 
// =======================換教練================
$.ajax({
	url: 'commentbox.php',
	dataType: 'text',
	success: function(data) {
		$('#ajaxcoach').html(data);
		$('#chLbClose').click(function() {
			$('#chBlack').stop().animate({
				height: 0,
				width: 0
			}, 600);
			$('#chLbselectCh ul .chSelectLi').removeClass('active');
		});
// =======================換教練================
		$('.chbuble').unbind('click').click(function() {
			var coachVal = parseInt($(this).find('input').val());
			$('#coachcgNo').val(coachVal);
			console.log($('#coachcgNo').val());
			coach();
			$('.chbublebox').removeClass('active2');
			$(this).parent().addClass('active2');
		});
// =======================換教練================
		$('#chRwdUl').change(function() {
			coachVal = parseInt($(this).val());
			$('#coachcgNo').val(coachVal);
			console.log($('#coachcgNo').val());
			coach();
		});
// =======================換教練================
		$('#chMoreBtn').click(function() {
			$('.chLbcommentBox').css('height', 'auto');
			$(this).css('display', 'none');
		});	

		
		coachVal = $('#coachcgNo').val();
		$('.chbublebox').eq(coachVal - 1).addClass('active2');
		window.addEventListener('load', coach);
	}
});
// =======================換教練================
// =======================顯示留言板================
function coach(){
	coachVal = $('#coachcgNo').val();
	console.log('我讀取到的教練編號'+coachVal);
	$('#chMoreBtn').css('display', 'block');
	$.ajax({
		url: 'commentbox2.php',
		data: {
			coachNo: coachVal
		},
		type: 'POST',
		dataType: 'text',
		success: function(data) {
			$('.chLbcommentBox').html(data);

			for (var i = 0; i < $('.chLbPercommentBox').length; i++) {
				var totalsc = parseInt($('.chLbPercommentBox').eq(i).children('.chLbPerScore').text());
				// console.log('總評分燈箱'+totalsc);
				$('.chLbPercommentBox').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
					width: totalsc + '%'
				}, 600);
			}
			var liHeight = $('.chLbcommentBox ul li').height();
			console.log('li的高度'+liHeight);
			$('.chLbcommentBox').css('height', (liHeight + 10) * 2 + 10);

			$('.reportbtn').click(function() {
				cntNO = $(this).find('input').val();
				// console.log(cntNO);
				$.ajax({
					url: 'nowreport.php',
					data: {
						commentNo: cntNO
					},
					type: 'POST',
					dataType: 'text',
					success: function(data) {
						alert("檢舉成功");
					}
				})
			})


		}	
	})
}

// =======================顯示留言板================
if (<?php echo $memNo; ?> == 0) {
	$('.chScMeBox').css('display', 'none');
}

$('#con').keyup(function(event) {
	var catched = $('#coachcgNo').val();
	if (this.value.trim() == "") {} else {
		if (event.keyCode == 13) {
			$.ajax({
				url: 'joinAct.php',
				data: {
					coachNO: catched,
					memNo: <?php echo $memNo?>
				},
				type: 'POST',
				dataType: 'text',
				success: function(data) {
					console.log('有無參加過'+data);
					if(data==0){
						var catched = $('#coachcgNo').val();
						var scoreval = $('#chLbScBox').text();
						var intscore = scoreval.substring(0, scoreval.length - 1);
						var conval = $('#con').val();
						
						console.log('接收!');
						if (intscore == "評") {
							alert('你還沒評分');
						} else {
							intscore = parseInt(intscore);
							console.log(catched,scoreval,intscore,conval);
							$.ajax({
								url: 'commentbox2.php',
								data: {
									content: conval,
									newscore: intscore,
									coachNo2: catched,
									memNo: <?php echo $memNo?>
								},
								type: 'POST',
								dataType: 'text',
								success: function(data) {
									coach();
									$('#con').val("");
									if ($('body').width() > 768) {
										scbar();
										forhor();
									}
								}
							});
						
						}
					}else{
						alert('您沒參加過此教練帶的活動哦');
					}
				}
			});	
		}
	}
})
</script>

</body>
</html>

