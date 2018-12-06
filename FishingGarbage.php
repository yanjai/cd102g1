<?php 
ob_start();
session_start();
if(isset($_SESSION["memNo"])){
 // unset($_SESSION["memNo"]);
 $memToNo = $_SESSION["memNo"];
}

else{
  $memToNo = 0;
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/member.css"> 
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/memlogin.js"></script>
	

	<title>守護海洋</title>

	<style>
		body {
		    height: 100vh;
		    margin: 0;
		    padding: 0;
		    -webkit-text-size-adjust: 100%;
			-webkit-font-smoothing: antialiased;
			box-shadow: 0 0 8px rgba(0,0,0,0.4);
		}

		/*指定這頁頁面 CSS start*/

		nav .navmenu li.thispage a{
		    color: #3db7e4;
		}
		nav .navmenu li.thispage a:after {
		    content: "";
		    display: block;
		    width: 100%;
		    padding: 0 0 6px 0;
		    border-bottom: 2px solid #3db7e4;
		    transition: width 0.3s ease-in-out;
		    margin: auto;
		}
		/*指定這頁頁面 CSS end*/
		svg {
		    position: absolute;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    margin:auto;
		    display: block;
		    width:100%;
		    height:100vh;
		}

		.garbageFooter{
			position: absolute;
			left: 0;
			right: 0;
			bottom: 0;
			margin:auto;
		}

		#bottle{
			width: 100px;

		}

		.garbage{
			position: absolute;
			width: 100px;
			height: 100px;
			background:transparent;

		}

		.garbage1{
			top:450px;
			left:250px;
		}

		.garbage2{
			top:550px;
			left:400px;
		}

		.garbage3{
			top:550px;
			left:520px;
		}

		.garbage4{
			top:600px;
			left:670px;
		}

		.garbage6{
			top:620px;
			left:870px;
		}
		.garbage7{
			top:450px;
			left:920px;
		}
		.garbage8{
			top:500px;
			left:1050px;
		}
		.textHover{
			cursor:pointer;
		}

		#theDiv{
			font: 12px Tahoma;
			border: 1px solid #ccc;
			padding: 5px;
			color:#888;
			background:#fff;
			position: absolute;
			display: none;
		}



		/* The Modal (background) */
		.fishmodal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 50; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(8, 78, 118, 0.8);
		}

		/* Modal Content */
		.modal-content {
		    background-color: #fefefe;
		    margin: 80px auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 80%;
		}

		.fishingclose{
			font-size: 30px;
		    float: right;
		    position: relative;
		    top: -13px;
		    cursor:pointer;
		}
		
		.fishingContent{
			display: flex;
		}
		.fishingLeft{
			width: 45%;
			padding: 20px;
		}
		.fishingRight{
			width: 50%;
			padding:20px 0;
		}
		.fishingRight img{
			width: 100%;
		}

		.fishingLeft h4{
			padding:10px 0;
			color:#084e76;
			font-weight: bold;
		}

		.fishingLeft h5{
			color: #25a2d7;
			font-size: 20px;
			font-weight: bold;
			padding: 10px 0;
		}
		.fishingLeft p{
			line-height: 24px;
		}

		.navmenu li.fishingGarbageMenu a{
    		color: #3db7e4;

		}
		
		.navmenu ul li.fishingGarbageMenu a:after {
		    content: "";
		    display: block;
		    width: 0;
		    padding: 0 0 6px 0;
		    border-bottom: 2px solid #3db7e4;
		    transition: width 0.3s ease-in-out;
		    margin: auto;
		   
		}
		.contentArea{
			min-height:auto;
		}

		@media all and (max-width: 1700px) {
			.garbage{
				display: none;
			}
		}

		@media all and (max-width: 767px) {

   
		    nav .navmenu li.thispage a:hover:after {
		        width: 0;
		    }
		    nav .navmenu li.thispage a:after {
		        content: "";
		        display: block;
		        width: 0;
		        padding: 0 0 6px 0;
		        border-bottom: 2px solid #3db7e4;
		        transition: width 0.3s ease-in-out;
		        margin: auto;
    		}

    		.fishgarbageContent{
    			background: #678196;
    			position: relative;
    		}

		}

	</style>
</head>


<body class="fishgarbageContent">
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
				
				<li><a href="shoppingCart.php">
					<i class="fas fa-cart-plus"></i>
					</a>
				</li>
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
				    <li><a href="coach.php">教練團隊</a></li>
				    <li><a href="chBot.php">教練諮詢</a></li>
				    <li><a href="aboutus.php">關於我們</a></li>
				    <li class="lastMenu thispage"><a href="FishingGarbage.php">守護海洋</a></li>
				</ul>
			</div>
		</label>	
	</div>
</nav>
<!--nav end-->
<div class="headBanner">

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
			<a class="right psw" href="memPassMail.php">忘記密碼</a>
			<div class="clearfix"></div>
		</div>
		<img class="cuGrass" src="images/cuGrass.png">	
	  </div>
    </form>
</div>


	
<!--內容 start-->
<div class="contentArea">
<!-- 鯨魚圖片1 start-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<rect width="100%" height="100%" fill="#678196"/><!-- 背景底顏色 -->
		<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="svg/cachalote.svg" width="100%" height="100%"/><!-- 進去後看到的第一張圖 -->
</svg>
<!-- 鯨魚圖片1 end-->


<!-- 鯨魚圖片2 start-->
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<defs>
			<clipPath id="mask">
				<circle id="mask-circle" cx="50%" cy="50%" r="10%" style="fill:#fff"/>
			</clipPath>
		</defs>
		<g clip-path="url(#mask)">
			<rect width="100%" height="100%" fill="#272730"/>
			<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="svg/cachalote_xrays.svg" width="100%" height="100%"/><!-- 遮罩看到的圖 -->
		</g>
		<circle id="circle-border" cx="50%" cy="50%" r="10%" style="stroke:#b2c3d1; fill:transparent; stroke-width:2;"/><!-- 遮罩的邊框顏色 -->
	</svg>
<!-- 鯨魚圖片2 end-->

<div class="garbage garbage1 textHover" hovertext="塑膠瓶"></div>
<div class="garbage garbage2 textHover" hovertext="鐵罐"></div>
<div class="garbage garbage3 textHover" hovertext="塑膠瓶"></div>
<div class="garbage garbage4 textHover" hovertext="紙張"></div>
<div class="garbage garbage6 textHover" hovertext="電池"></div>
<div class="garbage garbage7 textHover" hovertext="玻璃瓶"></div>
<div class="garbage garbage8 textHover" hovertext="衣服"></div>
<div id="theDiv"></div>


<!-- The Modal -->
<div id="garbageBox" class="fishmodal">
    
  <!-- Modal content -->
  <div class="modal-content">
	<span class="fishingclose">&times;</span>

	
	<div class="fishingContent">

	   <div class="fishingLeft">
	   	<h4>守護海洋永遠不嫌晚，你今天開始就可以為海洋做的3件事:</h4>
		    <p> 人類的日常生活千絲萬縷地影響著整個海洋環境，只要透過一些習慣的改變，甚至觀念的改變，就可以在日常生活中的消費選擇中落實「友善海洋」的理念，讓我們從現在就開始做起：
			</p>
            

            <h5>1.減少塑膠物品的使用：</h5>
			<p> 
				根據統計，台灣一年使用160億個塑膠袋（每人每日平均2個），15億個飲料杯、45億個寶特瓶。這些塑膠製品在回收的過程中並無法真正地進入再利用的循環，反而隨之而來產生了垃圾處理的問題。最根本的方法，是從每個人的日常生活中有意識地「減塑」開始。
			</p>

			<h5>2.清靜海灘，從離家最近的海濱動手撿：</h5>
			<p> 
				台灣四面環海，唯一不靠海的縣市是南投縣，這些離我們不遠的海岸線，每一段都有不同的海洋廢棄物面貌。若能夠定期在自己家附近的海岸作淨灘工作，並配合海廢登記表統計該地區海廢的類型，匯整資料上傳到台灣的海洋廢棄物監測平台，長期累積下來可作為縣市政府環保局制定相關垃圾回收法令的參考數據。
			</p>

			<h5>3.透過消費支持責任海鮮（Responsible Seafood Index）：</h5>
			<p> 
				為了挽救岌岌可危的漁業資源、鼓勵永續的漁業模式，以國際保育團體世界自然基金會（WWF）為首，和其他組織於1997年創設了「MSC」。任何的規模的漁業、任何魚種、漁法、任何國家、海域只要符合MSC的「資源的可持續性」、「減少對環境的衝擊」、「有效的管理制度」三項原則，都可以獲得MSC永續海鮮認證標章的肯定，讓消費者得以安心選購。
			</p>

	  </div>

	  <div class="fishingRight">
		    <img src="images/fishing_pic.jpg">
	  </div>
	</div>

</div>



</div>
<!--內容 end-->


<!--footer start-->
<footer class="garbageFooter">
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>	
<!--footer end-->	


<!-- <div class="gotoTop">
	<a href="#top">
	<span>Top</span>
    <img src="images/gotop.png">
    </a>
</div>
 -->




<!--動態偵測 js start-->
<script>
	$(document).ready(function(){
	//動態偵測螢幕上的X座標和Y座標
	/*=====
		$('.textHover').mousemove(function(e){
			$('#theDiv').text('X: '+e.clientX+' | Y: '+e.clientY);
		});
	=====*/
		// $('.textHover').mousemove().mouseout();
		$('.textHover').mousemove(function(e){
			var theText = $(this).attr('hovertext');

			$('#theDiv').text(theText).show().css({
				left : e.clientX + 15 + 'px',
				top : e.clientY + 15 + 'px'
			});
		}).mouseout(function(){
			$('#theDiv').hide();
		});
	});			
</script>
<!--動態偵測 js end-->




<!--撈垃圾 js start-->
<script>
		var svgElement = document.querySelector('svg');
		var maskedElement = document.querySelector('#mask-circle');
		var circleFeedback = document.querySelector('#circle-border');
		var svgPoint = svgElement.createSVGPoint();

		// 

		function cursorPoint(e, svg) {
		    svgPoint.x = e.clientX;
		    svgPoint.y = e.clientY;
		    return svgPoint.matrixTransform(svg.getScreenCTM().inverse());
		}

		function update(svgCoords) {
		    maskedElement.setAttribute('cx', svgCoords.x);
		    maskedElement.setAttribute('cy', svgCoords.y);
		    circleFeedback.setAttribute('cx', svgCoords.x);
		    circleFeedback.setAttribute('cy', svgCoords.y);
  
		}

		window.addEventListener('mousemove', function(e) {
		  update(cursorPoint(e, svgElement));
		}, false);

		document.addEventListener('touchmove', function(e) {
		    e.preventDefault();
		    var touch = e.targetTouches[0];
		    if (touch) {
		        update(cursorPoint(touch, svgElement));
		    }
		}, false);
	</script>

<!--撈垃圾 js end-->

<!--GOTO TOP JS start-->
<!-- <script>
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
</script> -->
<!--GOTO TOP JS end-->

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






<!--點擊 有跳出視窗 start-->
<script>
// Get the modal
var modal = document.getElementById('garbageBox');

// Get the button that opens the modal
var btns = document.querySelectorAll('.garbage');

// Get the <span> element that closes the modal
var span = document.querySelector(".fishingclose");

for(var i=0;i<btns.length;i++){
	// When the user clicks the button, open the modal 
	btns[i].onclick = function() {
	    modal.style.display = "block";
	   
	}
// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!--點擊 有跳出視窗 end-->





</body>
</html>