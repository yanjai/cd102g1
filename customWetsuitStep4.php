<?php ob_start();
session_start();
if(isset($_SESSION["memNo"])){

 $memToNo = $_SESSION["memNo"];

 }
 else{
  $memToNo = 0;  

 }

 if(isset($_SESSION["memName"])){

 $memName = $_SESSION["memName"];

 }
 else{
  $memName = 0;  

 }

 if(isset($_SESSION["memTel"])){

 $memTel = $_SESSION["memTel"];

 }
 else{
  $memTel = 0;  

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/customizeStep4.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/member.css">
	<link rel="stylesheet" href="css/memUpdate.css">
    <link rel="stylesheet" type="text/css" href="css/CSS animation.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="js/jquery.classyloader.min.js"></script>
	<script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
    <script src="js/memlogin_custo.js"></script>
    <script src="js/notLoggin.js"></script>
	<title>客製潛水衣</title>
</head>

<body class="cuWrap">
<a name="top"></a>
<!--nav start-->
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
     <li class="thispage"><a class="cucustonav" href="customWetsuitSex.php">客製潛水衣</a></li>
     <li><a href="divinggear.php">潛水裝備</a></li>
     <li><a href="wholeActivity.php">活動總覽</a></li>
     <li><a href="coach.php">教練團隊</a></li>
     <li><a href="chBot.php">教練諮詢</a></li>
     <li><a href="aboutus.php">關於我們</a></li>
     <li><a href="FishingGarbage.php">守護海洋</a></li>
    </ul>
   </div>
  </label> 
 </div>
</nav>
<!--nav end-->
<div class="headBanner">

</div>

<div id="NotLogged">
	<div id="NotBtnBox">
		<p>您還沒登入</p>
		<button id="reBtn">返回</button>
		<button id="GoToBtn">登入</button>
	</div>
</div>	

<!--內容 start-->
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
      	
		<input class="member" type="text" placeholder="帳號" name="memId" id="memId" minlength="4" maxlength="10" required>
		<input class="member" type="password" placeholder="密碼" name="memPsw" id="memPsw" minlength="6" maxlength="12" required>
		
		<button class="member sign log" type="button" id="btnLogin" onclick="document.getElementById('memJump').style.display='none'">
			<!-- <a href="memUpdate.html">登入</a>	 --> 登入
		</button>
        <button class="member sign fbLog" type="button" id="btnFBLogin" onclick="FB.login()">FB登入</button>
        <!-- <button onclick="FB.logout()">FB登出</button> -->
		<div class="clearfix"></div>
		<div class="regPsw">
			<a class="right reg" href="memRegister.html">會員註冊</a>
			<a class="right psw" href="memPassMail.php">忘記密碼</a>
			<div class="clearfix"></div>
		</div>
		<img class="cuGrass" src="images/cuGrass.png">	
	  </div>
    </form>
</div>

<div class="cuTitle">
	<h3>客製化潛水衣</h3>
</div>

<!--步驟流程 start-->
<div class="cuProcrss">
	<div class="cuPro cuPro1">
		<span>1</span>
		<p>選擇性別</p>			
	</div>
	<img src="images/cuLine.png">
	<div class="cuPro cuPro2">
		<span>2</span>
		<p>選擇樣式</p>			
	</div>
	<img src="images/cuLine.png">
	<div class="cuPro cuPro3">
		<span>3</span>
		<p>填寫資料</p>
	</div>
	<img src="images/cuLine.png">
	<div class="cuPro cuPro4">
		<span>4</span>
		<p>確認資料</p>
	</div>
</div>
<!--步驟流程 end-->

<!--推薦 start-->
<div class="cuActGear">
	<div id="cutrigger_01"></div>
	<div class="cuActGearContent">
		<h4 class="cuActGearTitle">下單成功，謝謝您的購買。</h4>
		<p>根據您客製化的商品，推薦適合您的活動與其他裝備。</p>
		<div class="cuTriangle">
			<div class="cuPercentage">
				<div class="culoa"><canvas class="culo culoader"></canvas><p>保暖度</p></div>
				<div class="culoa"><canvas class="culo culoader2"></canvas><p>抗壓度</p></div>
				<div class="culoa"><canvas class="culo culoader3"></canvas><p>延展度</p></div>
			</div>		
		</div>
		<div class="cuAct">
			<img src="images/cuDivingWithTurtle.png">
			<p>與海龜共游 $1,200</p>
		</div>
		<div class="cuGear1">
			<img src="images/cuMirror.png">
			<p>Sea Tunnel 鋼鐵灰蛙鏡 $888</p>
		</div>
		<div class="cuGear2">
			<img src="images/cuFins.png">
			<p>Sea Tunnel 粉色蛙鞋 $688</p>
		</div>
		<div class="cuButtons">
			<button><a href="wholeActivity.php">前往活動總覽</a></button>
			<button><a href="divinggear.php">前往潛水裝備</a></button>
		</div>			
	</div>	
	<img class="cuGrass" src="images/cuGrass.png">
</div>
<!--推薦 end-->
<!--內容 end-->


<!--footer start-->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>	
<!--footer end-->	


<div class="gotoTop">
	<a href="#top">
	<span>Top</span>
    <img src="images/gotop.png">
    </a>
</div>

<!-- 滾輪到某處fadeIn start-->
<script>
		var controller = new ScrollMagic.Controller({globalSceneOptions: {duration: 0}});//設定開始跟結束的距離
		//setClassToggle 前面是要被附加的元素 後面是要附加甚麼class上去
		var scence_01 = new ScrollMagic.Scene({triggerElement: "#cutrigger_01",offset: 250,reverse: false})//觸發的元素 、 元素位置下方200才觸發 、true滾輪回去會重複動作
		.setClassToggle('.cuActGearContent .cuAct,.cuActGearContent .cuGear1,.cuActGearContent .cuGear2',"active")
		// .addIndicators()//看你設定的觸發位置
		.on("enter" ,function(){
			$('.cuActGearContent').children('.cuAct').fadeIn(); 
			$('.cuActGearContent').children('.cuGear1').fadeIn(); 
			$('.cuActGearContent').children('.cuGear2').fadeIn(); 
		})		
		.addTo(controller);
</script>
<!-- 滾輪到某處fadeIn end-->

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

<script>	
	$(document).ready(function(){

		// 進到頁面時,延遲一秒,並花三秒緩慢滾動到我設定的位置
		$('html,body').delay(500).animate({scrollTop: $('.cuProcrss').offset().top - 120}, 1000);
		});
</script>	

<!--首頁選單JS 測試 start-->
<script type='text/javascript'>
 	 function $id(id){
      return document.getElementById(id);
	}
	if($('body').width()>768){
		$('body').on('mousewheel', function(e){
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

<!--首頁選單JS 測試 end-->

<!-- 保暖度百分比 start-->
<script type="text/javascript">
	$(document).ready(function() {
		$('.culoader').ClassyLoader({
			width: 150, 
			height: 150, 
			animate: true, 
			displayOnLoad: true,
			percentage: 60, 
			speed: 12, 
			roundedLine: false, 
			showRemaining: true, 
			fontFamily: 'Helvetica', 
			fontSize: '40px', 
			showText: true, 
			diameter: 65, 
			fontColor: '#FEF0A7', 
			lineColor: '#FEF0A7', 
			remainingLineColor: 'rgba(55, 55, 55, 0.1)', 
			lineWidth: 5 
		});
	});
</script>
<!-- 保暖度百分比 end-->

<!-- 抗壓度百分比 start-->
<script type="text/javascript">
	$(document).ready(function() {
		$('.culoader2').ClassyLoader({
			width: 150, 
			height: 150, 
			animate: true, 
			displayOnLoad: true,
			percentage: 45, 
			speed: 15, 
			roundedLine: false, 
			showRemaining: true, 
			fontFamily: 'Helvetica', 
			fontSize: '40px', 
			showText: true, 
			diameter: 65, 
			fontColor: '#FEF0A7', 
			lineColor: '#FEF0A7', 
			remainingLineColor: 'rgba(55, 55, 55, 0.1)', 
			lineWidth: 5 
		});
	});
</script>
<!-- 抗壓度百分比 end-->

<!-- 延展度百分比 start-->
<script type="text/javascript">
	$(document).ready(function() {
		$('.culoader3').ClassyLoader({
			width: 150, 
			height: 150, 
			animate: true, 
			displayOnLoad: true,
			percentage: 90, 
			speed: 10, 
			roundedLine: false, 
			showRemaining: true, 
			fontFamily: 'Helvetica', 
			fontSize: '40px', 
			showText: true, 
			diameter: 65, 
			fontColor: '#FEF0A7', 
			lineColor: '#FEF0A7', 
			remainingLineColor: 'rgba(55, 55, 55, 0.1)', 
			lineWidth: 5 
		});
	});
</script>
<!-- 延展度百分比 end-->


</body>
</html>