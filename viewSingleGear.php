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
	<link rel="stylesheet" type="text/css" href="css/gearList.css">
	<link rel="stylesheet" type="text/css" href="css/member.css"> 
	<link rel="stylesheet" href="css/swiper.min.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/notLoggin.js"></script>
	<script src="js/memlogin.js"></script>
	<script src='js/jquery.elevatezoom.js'></script>
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
				    <li><a href="FishingGarbage.php">守護海洋</a></li>
				</ul>
			</div>
		</label>	
	</div>
</nav>
<!--nav end-->
<div class="headBanner2" style="height:80px;">

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
<div class="contentArea">
        <!-- gearlist end -->
     <div id="gearDetails">
        

<?php 

$CartgearNo = $_REQUEST['CartgearNo'];

try {
require_once("connectcd102g1.php"); 
	$sql="select * from gearlist where gearNo='$CartgearNo'";
	$gearlist = $pdo->query($sql);  //gearlist 是 PDOStatement物件
	$gearRow = $gearlist->fetchAll(PDO::FETCH_ASSOC);
	foreach($gearRow as $data){
		echo '
	        <form method="post" action="cartAdd.php">
				<input type="hidden" name="gearNo" value="',$data["gearTypeNo"],'">
				<input type="hidden" name="gearNo" value="',$data["gearNo"],'">
				<input type="hidden" name="gearName" value="',$data["gearName"],'">
				<input type="hidden" name="gearPic" value="',$data["gearPic"],'">
				<input type="hidden" name="gearPrice" value="',$data["gearPrice"],'">
		        <div class="CartgItem">
					<div class="CartgearPic">
					    <img id="zoomImg" src="images/',$data["gearPic"],'" data-zoom-image="images/',$data["gearPic"],'">
					</div>
					<div class="CartgearDetails">

						<div class="CartgearName">',$data["gearName"],' </div>
						<div class="CartgearCode">',$data["gearTypeNo"],$data["gearNo"],'</div>
				        <div class="CartgearPrice">$',$data["gearPrice"],'</div>
						<div class="CartgearInfo">',$data["gearInfo"],'</div>
                    </div>
                    <div class="readyToCart">
						<fieldset>
							<label>
							    <span class="CartgearSize">尺碼:
							        <select name="gearSize">
								        <option value="S">S</option>
								        <option value="M">M</option>
								        <option value="L">L</option>
								        <option value="XL">XL</option>
							        </select>
							    </span>
							</label>
							<br>
							<label>
							       數量: <span><input type="text" size="2" maxlength="2" name="gearQty" value="1"/>
							    </span>
							</label>
					    </fieldset> 
					<input type="submit" value="加入購物車" class="addGearToCart">
					</div> 	
			    </div>
		     </form>
          ';
	}
}catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
        <div class="clearfix"></div>
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
<script type="text/javascript">
$("#zoomImg").elevateZoom({
			zoomWindowFadeIn: 100,
			zoomWindowFadeOut: 100,
			lensFadeIn: 500,
			lensFadeOut:500,
});
</script>
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

<!--首頁選單JS 測試 end-->



</body>
</html>