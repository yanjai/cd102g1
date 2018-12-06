<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css">
	<link rel="stylesheet" href="css/holeActivity.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/memlogin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<title>活動總覽</title>
</head>


<body class="content">
	<div class="contentMask"></div>

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
    <li><a href="customWetsuitSex.php">客製潛水衣</a></li>
	<li><a href="divinggear.php">潛水裝備</a></li>
	<li class="thispage"><a href="wholeActivity.php">活動總覽</a></li>
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

<!-- // -->
<div class="headBanner">
	<div class="actTabBox">
		<div class="actTab actTab1 actSelect1">
			<div class="actMask actMaskAct"></div>
			<span class="actTabEn">DIVING</span>
			<span class="actTabCh">浮潛類</span>
		</div>
		<div class="actTab actTab2 actSelect2">
			<div class="actMask actMaskAct"></div>
			<span class="actTabEn">DEEP DIVING</span>
			<span class="actTabCh">深潛類</span>
		</div>
		<div class="actTab actTab3 actSelect3">
			<div class="actMask actMaskAct"></div>
			<span class="actTabEn">CHALLENGING</span>
			<span class="actTabCh">冒險類</span>
		</div>
		<div class="actTab actTab4 actSelect4">
			<div class="actMask"></div>
			<span class="actTabEn actTitleAct">ALL ACTIVITIES</span>
			<span class="actTabCh actTitleAct">所有活動</span>
		</div>
		<div class="actTabModel ">
			<img src="images/changing animate1.png" alt="">
		</div>
		<div class="actTabModel">
			<img src="images/changing animate2.png" alt="">
		</div>
		<div class="actTabModel">
			<img src="images/changing animate3.png" alt="">
		</div>
		<div class="actTabModel actModelAct">
			<img src="images/changing animate4.png" alt="">
		</div>
	</div>
</div>
<!--麵包屑 start-->

<!--麵包屑 end-->

<div class="chTitle"><h3>活動總覽</h3></div>
<!--內容 start-->
<!-- <ul class="actNav">
	<li class="actSelect"><p>全部</p></li>
	<li class="actSelect1"><p>浮潛</p></li>
	<li class="actSelect2"><p>深潛</p></li>
	<li class="actSelect3"><p>冒險類</p></li>
	<li class="actSelect4"><p>觀察類</p></li>
</ul> -->
	<!-- <div class="chTitle"><h3>活動總覽</h3></div> -->
<div class="actWrap">
<script>
	$(document).ready(function(){

			$.ajax({
					url: 'wholeActivityP.php',							
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						$('.actWrap').html(data);
						
						for (var i = 0; i < $('.actBoxContent').length; i++) {
						var totalsc = parseInt($('.actBoxContent').eq(i).children('.chtotalScore').text());
						// console.log('總評分燈箱'+totalsc);
						$('.actBoxContent').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
							width: totalsc + '%'
						}, 600);
			}
						
						for(var i = 0; i<100 ;i++){
						if( i%2 == 0){
							$('.actBoxImg').eq(i).addClass('ActAnimate');
						}
						else{
							$('.actBoxImg').eq(i).addClass('ActAnimate2');
						}
							
						}

				}


			});
			$('.actSelect1').click(function(){
				$.ajax({
					url: 'wholeActivitySelect.php',	
					data: {selectType:'浮潛類'},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actWrap').html(data);
						 for (var i = 0; i < $('.actBoxContent').length; i++) {
						var totalsc = parseInt($('.actBoxContent').eq(i).children('.chtotalScore').text());
						// console.log('總評分燈箱'+totalsc);
						$('.actBoxContent').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
							width: totalsc + '%'
						}, 600);
			}


						 for(var i = 0; i<100 ;i++){
						if( i%2 == 0){
							$('.actBoxImg').eq(i).addClass('ActAnimate');
						}
						else{
							$('.actBoxImg').eq(i).addClass('ActAnimate2');
						}
							
						
					}
					}
				});
				
			});
			$('.actSelect2').click(function(){
				$.ajax({
					url: 'wholeActivitySelect.php',	
					data: {selectType:'深潛類'},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actWrap').html(data);
						 for (var i = 0; i < $('.actBoxContent').length; i++) {
						var totalsc = parseInt($('.actBoxContent').eq(i).children('.chtotalScore').text());
						// console.log('總評分燈箱'+totalsc);
						$('.actBoxContent').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
							width: totalsc + '%'
						}, 600);
			}
						 for(var i = 0; i<100 ;i++){
						if( i%2 == 0){
							$('.actBoxImg').eq(i).addClass('ActAnimate');
						}
						else{
							$('.actBoxImg').eq(i).addClass('ActAnimate2');
						}
							
						
					}
					}
				});
				
			});
			$('.actSelect3').click(function(){
				$.ajax({
					url: 'wholeActivitySelect.php',	
					data: {selectType:'冒險類'},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actWrap').html(data);
						 for (var i = 0; i < $('.actBoxContent').length; i++) {
						var totalsc = parseInt($('.actBoxContent').eq(i).children('.chtotalScore').text());
						// console.log('總評分燈箱'+totalsc);
						$('.actBoxContent').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
							width: totalsc + '%'
						}, 600);
			}
						 for(var i = 0; i<100 ;i++){
						if( i%2 == 0){
							$('.actBoxImg').eq(i).addClass('ActAnimate');
						}
						else{
							$('.actBoxImg').eq(i).addClass('ActAnimate2');
						}
							
						
					}
					}
				});
				
			});
			// $('.actSelect4').click(function(){
			// 	$.ajax({
			// 		url: 'wholeActivitySelect.php',	
			// 		data: {selectType:'觀察類'},	
			// 		type: 'POST',				
			// 		dataType: 'text',			
			// 		success: function(data){
			// 			 $('.actWrap').html(data);
			// 			 for (var i = 0; i < $('.actBoxContent').length; i++) {
			// 			var totalsc = parseInt($('.actBoxContent').eq(i).children('.chtotalScore').text());
			// 			// console.log('總評分燈箱'+totalsc);
			// 			$('.actBoxContent').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
			// 				width: totalsc + '%'
			// 			}, 600);
			// }
			// 			 for(var i = 0; i<100 ;i++){
			// 			if( i%2 == 0){
			// 				$('.actBoxImg').eq(i).addClass('ActAnimate');
			// 			}
			// 			else{
			// 				$('.actBoxImg').eq(i).addClass('ActAnimate2');
			// 			}
							
						
			// 		}
			// 		}
			// 	});
				
			// });
			$('.actSelect4').click(function(){
				$.ajax({
					url: 'wholeActivityP.php',	
						
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actWrap').html(data);
						 for (var i = 0; i < $('.actBoxContent').length; i++) {
						var totalsc = parseInt($('.actBoxContent').eq(i).children('.chtotalScore').text());
						// console.log('總評分燈箱'+totalsc);
						$('.actBoxContent').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
							width: totalsc + '%'
						}, 600);
			}
						 for(var i = 0; i<100 ;i++){
						if( i%2 == 0){
							$('.actBoxImg').eq(i).addClass('ActAnimate');
						}
						else{
							
							$('.actBoxImg').eq(i).addClass('ActAnimate2');
						}
							
						
					}
					}
				});
				
			});
			



		});	
		// $(document).on('click', '.actSelect1', function(){
		// 		$.ajax({
		// 			url: 'wholeActivitySelect.php',							
		// 			type: 'POST',				
		// 			dataType: 'text',
		// 			data: {selectType:'浮潛'}			
		// 			success: function(data2){
		// 				$('.actWrap').html(data2);
		// 			}
				
				
		// 		});
		// 	});
</script>
<!-- <script>
	$(document).on('click', '.actSelect1', function(){
				$.ajax({
					url: 'wholeActivitySelect.php',							
					type: 'POST',				
					dataType: 'text',
					data: {selectType:'浮潛'}			
					success: function(data2){
						$('.actWrap').html(data2);
					}
				
				
				});
			});
</script>	 -->

	<!-- <div class="activityBox"></div> -->

</div>
<!--內容 end-->



<div class="clearfix"></div>
<div class="error"></div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(function(){
		for(var i = 0; i<100 ;i++){
			if( i%2 == 0){
				$('.actBoxImg').eq(i).addClass('ActAnimate');
			}
			else{
				$('.actBoxImg').eq(i).addClass('ActAnimate2');
			}
				
			
		}
		
		
	})
	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(function(){
		$('.actTab').eq(0).click(function(){
			$('.actTabEn').removeClass('actTitleAct');
			$('.actTabCh').removeClass('actTitleAct');
			$('.actMask').addClass('actMaskAct');
			$('.actTabModel').removeClass('actModelAct');
			$('.actTabModel').eq(0).addClass('actModelAct');
			$('.actMask').eq(0).removeClass('actMaskAct');
			$('.actTabEn').eq(0).addClass('actTitleAct');
			$('.actTabCh').eq(0).addClass('actTitleAct');

		})
		$('.actTab').eq(1).click(function(){
			$('.actTabEn').removeClass('actTitleAct');
			$('.actTabCh').removeClass('actTitleAct');
			$('.actMask').addClass('actMaskAct');
			$('.actTabModel').removeClass('actModelAct');
			$('.actTabModel').eq(1).addClass('actModelAct')
			$('.actMask').eq(1).removeClass('actMaskAct');
			$('.actTabEn').eq(1).addClass('actTitleAct');
			$('.actTabCh').eq(1).addClass('actTitleAct');
		})
		$('.actTab').eq(2).click(function(){
			$('.actTabEn').removeClass('actTitleAct');
			$('.actTabCh').removeClass('actTitleAct');
			$('.actMask').addClass('actMaskAct');
			$('.actTabModel').removeClass('actModelAct');
			$('.actTabModel').eq(2).addClass('actModelAct')
			$('.actMask').eq(2).removeClass('actMaskAct');
			$('.actTabEn').eq(2).addClass('actTitleAct');
			$('.actTabCh').eq(2).addClass('actTitleAct');
		})
		$('.actTab').eq(3).click(function(){
			$('.actTabEn').removeClass('actTitleAct');
			$('.actTabCh').removeClass('actTitleAct');
			$('.actMask').addClass('actMaskAct');
			$('.actTabModel').removeClass('actModelAct');
			$('.actTabModel').eq(3).addClass('actModelAct')
			$('.actMask').eq(3).removeClass('actMaskAct');
			$('.actTabEn').eq(3).addClass('actTitleAct');
			$('.actTabCh').eq(3).addClass('actTitleAct');
		})
	})
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="js/jquery.ripples.js"></script>
<script>
$(document).ready(function() {
 try {
  $('.contentMask').ripples({
   resolution: 512,
   dropRadius: 20, //px
   perturbance: 0.002,
  });
  
 }
 catch (e) {
  $('.error').show().text(e);
 }

});
</script>
<!--首頁選單JS 測試 end-->
</body>
</html>