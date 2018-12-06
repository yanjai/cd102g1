<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/banner.css" />
	<link rel="stylesheet" type="text/css" href="css/member.css">
	<link rel="stylesheet" type="text/css" href="css/gearList.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<!-- <link rel="stylesheet" href="css/swiper.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/notLoggin.js"></script>
	<script src="js/memlogin.js"></script>
	<title>潛水裝備</title>
</head>


<body class="content">

<a name="top"></a>
<div id="NotLogged">
	<div id="NotBtnBox">
		<p>您還沒登入</p>
		<button id="reBtn">返回</button>
		<button id="GoToBtn">登入</button>
	</div>
</div>	
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
					<li><a href="customWetsuitSex.php">客製潛水衣</a></li>
					<li class="thispage"><a class="divinggear" href="divinggear.php">潛水裝備</a></li>
				    <li><a href="wholeActivity.php">活動總覽</a></li>
				    <li><a href="coach.php">教練團隊</a></li>
				    <li><a href="chBot.php">教練諮詢</a></li>
				    <li><a href="aboutus.php">關於我們</a></li>
				    <li class="lastMenu"><a href="FishingGarbage.php">守護海洋</a></li>
				</ul>
			</div>
		</label>	
	</div>
</nav>
<!--nav end-->
<div class="headBanner1">
	    <svg class="hidden">
			<!-- All deco shapes -->
			<defs>
			<path id="deco4" d="M 38.35,160.1 C 74.92,86.34 178.1,44.04 260.1,51.51 348.2,59.54 441.6,126.9 473.5,209.4 499.3,276 485,371.9 431.9,419.6 348.2,494.9 185.6,517.4 95.49,449.9 16.71,390.8 -5.393,248.3 38.35,160.1 Z"/>
			<path id="deco5" d="M 49.94,386.5 C 9.795,286.4 7.674,129.7 94.72,65.99 188.4,-2.586 371.8,28.99 438.1,124.3 486.9,194.5 503.7,389.2 390.4,376.4 277.1,363.5 238.6,482 155.1,469.7 110.9,463.2 66.57,428 49.94,386.5 Z"/>
			<path id="deco6" d="M 261.7,380.3 C 204.7,399.8 154.1,482.7 98.91,458.5 26.64,426.9 13.2,309.8 29.35,232.6 43.76,163.6 101.4,97.37 167.4,72.34 248,41.97 422.1,-2.762 423.4,107.7 424.6,218.1 507.5,272.4 464.3,336.7 425.7,394.2 327,357.9 261.7,380.3 Z" />
			</defs>
			</svg>
    	<main>

				<div class="item item--style-4 gearBody " data-animation-path-duration="1700" data-animation-path-easing="easeInOutBack" data-morph-path="M 440.9,118.5 C 486.5,189.8 499,297.9 458.3,371.8 422.2,437.2 335.8,475.1 261.5,477.3 181.4,479.6 83.9,445.4 43.22,376.1 -0.2483,302.1 13.51,189.9 61.98,119.1 104.5,56.88 190.6,20.5 265.7,22.71 332.2,24.67 405,62.28 440.9,118.5 Z" data-path-translateY="-20" data-animation-image-duration="2000" data-animation-image-easing="easeInOutQuart" data-image-translateY="40" data-image-scaleX="1.3" data-image-scaleY="1.3" data-deco-scaleX="0.8" data-deco-scaleY="1.3">
					<svg class="item__svg" viewBox="0 0 500 500">
						<clipPath id="clipShape4">
							<path class="item__clippath" d="M 189,80.37 C 243,66.12 307.3,87.28 350.9,124.1 389.3,156.6 417,211.2 418.1,263.4 419.1,305.7 401.8,355.6 368.5,379.1 298.8,428 179.2,446.4 117.6,386.3 65.4,335.3 78.55,230.3 105.5,160.5 119.7,123.6 152.6,89.85 189,80.37 Z" />
						</clipPath>
						<g class="item__deco">
							<use xlink:href="#deco4" />
						</g>
						<g clip-path="url(#clipShape4)">
							<image class="item__img" xlink:href="images/wetsuitM01.jpg" x="0" y="0" height="500px" width="500px" />
						</g>
					</svg>
					<div class="item__meta">
						<div class="item__number">
							<span class="item__specimen">服飾</span>
							<span class="item__reference">BODY</span>
						</div>
						<span class="item__title">一件不能缺少的潛水衣</span>
						<span class="item__subtitle">點擊查看</span>
					</div>
				</div>

				<div class="item item--style-4 gearAcc" data-animation-path-duration="1700" data-animation-path-easing="easeInOutBack" data-morph-path="M 440.9,118.5 C 486.5,189.8 499,297.9 458.3,371.8 422.2,437.2 335.8,475.1 261.5,477.3 181.4,479.6 83.9,445.4 43.22,376.1 -0.2483,302.1 13.51,189.9 61.98,119.1 104.5,56.88 190.6,20.5 265.7,22.71 332.2,24.67 405,62.28 440.9,118.5 Z" data-path-translateY="-20" data-animation-image-duration="2000" data-animation-image-easing="easeInOutQuart" data-image-translateY="40" data-image-scaleX="1.3" data-image-scaleY="1.3" data-deco-scaleX="0.8" data-deco-scaleY="1.3">
					<svg class="item__svg" viewBox="0 0 500 500">
					<svg class="item__svg" viewBox="0 0 500 500">
						<clipPath id="clipShape5">
							<path class="item__clippath" d="M 451.5,185.8 C 441.5,266.2 339.6,305 272.3,350.2 207.7,393.6 226.7,444.7 182.6,447.9 132.8,451.4 83.97,399.9 66.37,353.1 34.6,268.4 41.16,141.8 112,85.44 186.1,26.33 313.8,54.1 396,101.4 425.2,118.2 455.6,152.4 451.5,185.8 Z" />
						</clipPath>
						<g class="item__deco">
							<use xlink:href="#deco5" />
						</g>
						<g clip-path="url(#clipShape5)">
							<image class="item__img" xlink:href="images/ACC07.jpg" x="0" y="0" height="500px" width="500px" />
						</g>
					</svg>
					<div class="item__meta">
						<div class="item__number">
							<span class="item__specimen">配件</span>
							<span class="item__reference">ACCS</span>
						</div>
						<span class="item__title">配件也是不能缺少的哦</span>
						<span class="item__subtitle">點擊查看</span>
					</div>
				</div>

				<div class="item item--style-4 gearTools " data-animation-path-duration="1700" data-animation-path-easing="easeInOutBack" data-morph-path="M 440.9,118.5 C 486.5,189.8 499,297.9 458.3,371.8 422.2,437.2 335.8,475.1 261.5,477.3 181.4,479.6 83.9,445.4 43.22,376.1 -0.2483,302.1 13.51,189.9 61.98,119.1 104.5,56.88 190.6,20.5 265.7,22.71 332.2,24.67 405,62.28 440.9,118.5 Z" data-path-translateY="-20" data-animation-image-duration="2000" data-animation-image-easing="easeInOutQuart" data-image-translateY="40" data-image-scaleX="1.3" data-image-scaleY="1.3" data-deco-scaleX="0.8" data-deco-scaleY="1.3">
					<svg class="item__svg" viewBox="0 0 500 500">
					<svg class="item__svg" width="500px" height="500px" viewBox="0 0 500 500">
					<svg class="item__svg" viewBox="0 0 500 500">
						<clipPath id="clipShape6">
							<path class="item__clippath" d="M 189,80.37 C 243,66.12 307.3,87.28 350.9,124.1 389.3,156.6 417,211.2 418.1,263.4 419.1,305.7 401.8,355.6 368.5,379.1 298.8,428 179.2,446.4 117.6,386.3 65.4,335.3 78.55,230.3 105.5,160.5 119.7,123.6 152.6,89.85 189,80.37 Z" />
						</clipPath>
						<g class="item__deco">
							<use xlink:href="#deco6" />
						</g>
						<g clip-path="url(#clipShape6)">
							<image class="item__img" xlink:href="images/GT13.jpg" x="0" y="0" height="500px" width="500px" />
						</g>
					</svg>
					<div class="item__meta">
						<div class="item__number">
							<span class="item__specimen">裝置</span>
							<span class="item__reference">EQUM</span>
						</div>
						<span class="item__title">有了這些裝置就可以探索深海了</span>
						<span class="item__subtitle">點擊查看</span>
					</div>
				</div>
				
		
		</main>
		<div class="clearfix"></div>
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
		
		<button class="member sign log" type="button" id="btnLogin" onclick="document.getElementById('memJump').style.display='none'">登入
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
<!-- member login end -->

<!-- content start -->
<div class="gearcontentArea">
    <script type="text/javascript">
     	$(document).ready(function(){
            $.ajax({
					url: 'gearfilter.php',	
					dataType: 'text',				
					success: function(data){
						 $('#gearlist').html('<div class="gearitem">'+data+'</div>');
					}
				});
            $('.allGear').click(function(){

				$.ajax({
					url: 'gearfilter.php',	
					dataType: 'text',				
					success: function(data){
						 $('#gearlist').html('<div class="gearitem">'+data+'</div>');

					}
				});
			});
          	$('.gearBody , .gearMenuBody').click(function(){
				$.ajax({
					url: 'gearfilter.php',	
					data: {gearTypeNo:'GB'},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('#gearlist').html('<div class="gearitem">'+data+'</div>');
					}
				});
			});
			$('.gearAcc , .gearMenuAcc').click(function(){
				$.ajax({
					url: 'gearfilter.php',	
					data: {gearTypeNo:'ACC'},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('#gearlist').html('<div class="gearitem">'+data+'</div>');
					}
				});
				
			});
			$('.gearTools , .gearMenuTools').click(function(){
				$.ajax({
					url: 'gearfilter.php',	
					data: {gearTypeNo:'GT'},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('#gearlist').html('<div class="gearitem">'+data+'</div>');
					}
				});
				
			});
		});
 

     </script>
	<div class="gearWrapper">
      <!-- gearlist start -->
        <div id="gearMenu">
           <h3 class="gearmenuItem allGear">潛水裝備</h3>
        	<div>
        	    <span class="gearmenuItem gearactive allGear">所有裝備</span>
        	    <span class="gearmenuItem gearMenuBody">潛水服飾</span>
        	    <span class="gearmenuItem gearMenuAcc">潛水配件</span>
        	    <span class="gearmenuItem gearMenuTools">水肺裝置</span>
        	</div>
		</div>

        <div id="gearlist">
        </div>
       <!-- gearlist end -->
	</div>
</div>
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
<!-- banner plugin -->
<script src="js/anime.min.js"></script>
<script src="js/banner.js"></script>
<!-- banner plugin -->
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
<script type="text/javascript">
	$('.gearmenuItem').click(function(){
		$(this).addClass('gearactive');

		$('.gearmenuItem').not(this).removeClass('gearactive');
	})
	$('.gearBody').click(function(){
		$('.gearMenuBody').addClass('gearactive');

		$('.gearmenuItem').not('.gearMenuBody').removeClass('gearactive');
	})
	$('.gearAcc').click(function(){
		$('.gearMenuAcc').addClass('gearactive');

		$('.gearmenuItem').not('.gearMenuAcc').removeClass('gearactive');
	})
	$('.gearTools').click(function(){
		$('.gearMenuTools').addClass('gearactive');

		$('.gearmenuItem').not('.gearMenuTools').removeClass('gearactive');
	})
</script>
</body>
</html>