<?php 
ob_start();
session_start();

if(isset($_SESSION["memNo"])){
 // unset($_SESSION["memNo"]);
 $memToNo = $_SESSION["memNo"];
 echo $memToNo;
 }
 else{
	echo '123';
 header('location:seatunnel.php');
 exit();
 }
//  echo $memToNo;
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/member.css"> 
	<link rel="stylesheet" type="text/css" href="css/memUpdate.css">
	<link rel="stylesheet" type="text/css" href="css/newOrderList.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="js/memlogin.js"></script>
	<title>客製化訂單查詢</title>
	<style type="text/css">
	*{
		/* outline:1px solid #f00; */
	}
		
	</style>
</head>


<body class="content">
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
					<!-- <div class="con"></div> -->
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
<div class="headBanner">

</div>

<!--麵包屑 start-->
<!-- <div class="navbarBottom">
	<p><a href="index.html">首頁</a>  / <a href="#">內頁</a></p>
</div> -->
<!--麵包屑 end-->


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

<?php
$memPic = 'images/'.$_SESSION["memImg"];
?>

<div class="wrapper clearfix">
	<div class="upFish1Swim">
		<div class="upFish1">
			<img src="images/memfish1.png" alt="fish1">
		</div>
	</div>
	<div class="upFish2Swim">
		<div class="upFish2">
			<img src="images/memfish2.png" alt="fish2">
		</div>
	</div>
	<div class="col-3">
		<!-- item1 -->
		<div class="item ">
			<div class="moving-grad moving1">
				<div class="left20">
					<div class="sidebar20">
						<div class="base20">
					
							<div class="block20">
								<div class="account20"><span></span></div>
								<div class="row20">
									<div class="icon20">
										<img src="<?PHP echo $memPic; ?>">
									</div>
									<!-- <span class="hello20"></span> -->
								</div>
							</div><!-- block20 -->
					
						</div><!-- base20 -->

						<div class="menu20 menu20NameColor" id="showName"><?php echo $_SESSION['memName']; ?></div>

						<ul class="menu20">
							<li>
								<i class="far fa-address-book"></i>
								<a class="memlefticonMeunu" id="mem_1" href="memUpdate.php">個人資料</a>
							</li>
							<li>
								<i class="fas fa-align-center"></i>
								<a class="memlefticonMeunu" id="mem_2" href="memOrderCheck.php">客製化訂單查詢</a>
							</li>
							<li>
								<i class="fas fa-align-center"></i>
								<a class="memlefticonMeunu" href="memOrderGear.php">裝備訂單查詢</a>
							</li>
							<li>
								<i class="fas fa-align-center"></i>
								<a class="memlefticonMeunu" href="memOrderAct.php">活動訂單查詢</a>
							</li>
							<!-- <li><a id="logout">登出</a></li> -->
						</ul><!-- menu20 -->
					</div><!-- sidebar20 -->
				</div><!-- left20 -->
			</div>
		</div>
	</div>
 <script type="text/javascript">
                      //<!--客製化潛水衣訂單 start-->
                     
               

                     
                  

			//      $(function(){
			//             memNo = <?php echo $memToNo; ?> ;

			//             $.ajax({
			//    url: 'custorderList_memNo.php', 
			//    dataType: 'text', 
			//    data: {memNo:memNo}, 
			//    type: 'POST',    
			//    success: function(data){
			//     console.log(memNo);
			//      $('#cusOrderC').html(data);
			//    }
			//   }); 
			// })


           // <!--客製化潛水衣訂單 end-->

            //  $(document).on('click', '#gearOrderR', function(){
            //          memNo = <?php echo $memToNo; ?> ;
            //          console.log("=======");

            //         $.ajax({
			// 		url: 'gearOrderR.php',	
			// 		dataType: 'text',	
			// 		data: {memNo:memNo},	
			// 		type: 'POST',				
			// 		success: function(data){
			// 			console.log(memNo);
			// 			 $('#gearOrderC').html(data);
                         
			// 		     }
			// 	    }); 
                  
            //     })  

            //   $(document).on('click', '#actOrderR', function(){
            //          memNo = <?php echo $memToNo; ?> ;

            //         $.ajax({
			// 		url: 'm_actOrder.php',	
			// 		dataType: 'text',	
			// 		data: {memNo:memNo},	
			// 		type: 'POST',				
			// 		success: function(data){
			// 			console.log(memNo);
			// 			 $('#actOrderC').html(data);
                         
			// 		     }
			// 	    }); 
                  
            //     })  

        

    </script>
	<div class="col-9">
		<!-- item2 -->
		<div class="item ">
			<div class="moving-grad moving2">
				<div>
					<h3 class="title20">客製化訂單查詢</h3>
					<div class="memContainerTab">
						<!-- <div class="orderBox">
							<div class="orderImg"><h4>訂單編號:1</h4><img src="images/cuGreenShortWetsuit.png"></div>
							<div class="orederDtail">
								<div class="orederbox spec">
									<h4>產品規格</h4>
									<div class="specbox productSize">尺寸:XL</div>
									<div class="specbox productColor">顏色:粉紅色</div>
									<div class="specbox productVersion">版型:長板</div>
								</div>
								<div class="orederbox receivePer">收件人:M77</div>
								<div class="orederbox receiveAdd">收件人地址:平鎮市中大路113號2樓</div>
								<div class="orederbox receiveTel">收件人電話:091234567</div>
								<div class="orederbox orderDate">訂單日期:2018-09-21</div>
								<div class="orederbox orderPrice">價格:81000元</div>
							</div>
						</div> -->
						<!-- <div class="orderBox"></div>
						<div class="orderBox"></div>
						<div class="orderBox"></div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="upGrass">
	<img src="images/cuGrass.png">
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



<!-- tab start -->
<!-- <script>
	const tabs = document.querySelector('.memContainerTab ul');
	const content = document.querySelectorAll('.contentCon > .content');

	tabs.onclick = function(event) {
		let c = event.target.classList;
		let num = event.target.getAttribute('data-key');
		if (!c.contains('activeTab')) {
			for (let i = 0; i < tabs.children.length; i++) {
			tabs.children[i].classList.remove('activeTab');
			content[i].classList.remove('activeCon');
			}
			c.add('activeTab');
			//event.target.style.background = 'url("http://halongtoursbooking.com/hinhanh/sanpham/13-day-discover-vietnam-cambodia.jpg") no-repeat left top';
			content[num-1].classList.add('activeCon');
		}
	};
</script> -->
<!-- tab start -->
<script>
	
	var memNo = <?php echo (int)$memToNo; ?> ;
	console.log(memNo);
	$.ajax({
		url: 'custorderList_memNo.php',	
		dataType: 'text',
		type: 'POST',		
		data: {memOrderNo:memNo},	
		success: function(data){
			$('.memContainerTab').html(data);
			$('.orderBox').unbind('click').click(function(){
				if($(this).hasClass('active')){
					$(this).removeClass('active');
				}else{
					$('.orderBox').removeClass('active');
					$(this).addClass('active');
				}
				
				// $(this).children('.orderImg').css('width','30%');
			})
		}
	});
</script>

</body>
</html>