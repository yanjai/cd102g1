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
	<link rel="stylesheet" type="text/css" href="css/customize.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/member.css">
    <link rel="stylesheet" href="css/memUpdate.css">
    <link rel="stylesheet" type="text/css" href="css/CSS animation.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/odometer-theme-default.css">
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="js/cuDrag.js"></script>
	<script src="js/odometer.js"></script>
	<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
	<script src="js/cugetWetsuit.js"></script>
	<script src="js/cugetUserdata.js"></script>	
	<script src="js/notLoggin.js"></script>
	<script src="js/memlogin_custo.js"></script>
	<script src="js/jquery.ui.touch-punch.js"></script>
	<title>客製潛水衣</title>
	<style>
        *{
            /*outline: 1px solid #f00;            */
        }
        .cuButtonsContent button{
		   padding: 0;
		  }
		  .cuButtonsContent button a{
		    display: block;
		    padding: 8px 15px;
		    width: 100%;
		    height: 100%;
		  }
		  .cuButtonsContent .cuNext3{
		   padding: 8px 15px;
		  }
    </style>
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

<div id="fish">
	<img src="images/dag2.png" id='dag'>
	<p>開始客製化GO</p>
	<img src="images/culogo2.png">
</div>

<div class="cuTitle">
	<h3>客製化潛水衣</h3>
</div>

<div class="cuMove">
	<img src="images/cujellyfish.png">
</div>
<div class="cuMovefish">
	<img src="images/cujellyfish.png">
</div>
<div class="cuMovejelly">
	<img src="images/cujellyfish2.png">
</div>

<div class="cuContentArea">

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

	<div class="cuStepContent">
		

		<!--操作面板 start-->
		<div class="cuSelectPanel">
		<form action="userUpload.php" method="post" enctype="multipart/form-data">		
		
			<!--選擇顏色 start-->
			<div class="cuSelectColor">
				
				<input type="hidden" name="usercolor" id="usercolor">	
				<h4 class="cuSelectColorTitle"><img class="cunumber" src="images/cuone.png"> 顏色
					<img class="cuuparrow" src="images/cuuparrow.png">
					<img class="cudownarrow" src="images/cudownarrow.png">
				</h4>
				<div class="cuSelectColorContent"></div>
			</div>
			<!--選擇顏色 end-->

			<!--選擇圖案 start-->
			<div class="cuSelectLogo">
				<input type="hidden" name="userofficialImg" id="userofficialImg">
				<h4 class="cuSelectLogoTitle"><img class="cunumber" src="images/cutwo.png"> 圖案
					<img class="cuuparrow" src="images/cuuparrow.png">
					<img class="cudownarrow" src="images/cudownarrow.png">
				</h4>
				<div class="cuSelectLogoContentWrap">
					<div class="cuSelectLogoContent">
						<div class="culogobtns"></div>
						<label class="cuLogoPlus">
							<input name="cuupfile" id="cuupfile" type="file" style="display: none">
							<p>上傳您的圖案</p>
							<p>8M內，jpg、png之圖檔。</p>
							<img src="images/cuLogoPlus.png">
						</label>
						<div class="cuControlBtn">
							<img id="culargeButton" src="images/cuControlBig.png">
							<img id="cusmallButton" src="images/cuControlSmall.png">
							<img id="cuturnrightButton" src="images/cuControlRight.png">
							<img id="cuturnleftButton" src="images/cuControlLeft.png">
							<img id="cudeleteButton" src="images/cuControlDelete.png">
						</div>
					</div>
				</div>
			</div>
			<!--選擇圖案 end-->

			<!--選擇版型 start-->
			<div class="cuSelectVersion">
				<input type="hidden" name="userversion" id="userversion">
				<h4 class="cuSelectVersionTitle"><img class="cunumber" src="images/cuthree.png"> 版型
					<img class="cuuparrow" src="images/cuuparrow.png">
					<img class="cudownarrow" src="images/cudownarrow.png">
				</h4>
				<div class="cuSelectVersionContent"></div>
			</div>
			<!--選擇版型 end-->

			<!--選擇尺寸 start-->
			<div class="cuSelectSize">
				<input type="hidden" name="usersize" id="usersize">
				<h4 class="cuSelectSizeTitle"><img class="cunumber" src="images/cufour.png"> 尺寸
					<img class="cuuparrow" src="images/cuuparrow.png">
					<img class="cudownarrow" src="images/cudownarrow.png">
				</h4>
				<div class="cuSelectSizeContent">
					<button class="cusizebtn">XS</button>
					<button class="cusizebtn">S</button>
					<button class="cusizebtn">M</button>
					<button class="cusizebtn">L</button>
					<button class="cusizebtn">XL</button>
				</div>
			</div>
			<!--選擇尺寸 end-->

		</div>
		<!--操作面板 end-->	

		<!--潛水衣 start-->

		<!-- 放值潛水衣 start -->
		<svg preserveAspectRatio="">
			<g>
		    	<defs>
		        	<clipPath id="svgPath">
		            	<path id="cusvg2" fill="" stroke="" stroke-width="" stroke-miterlimit="" d=""/>
		        	</clipPath>
		    	</defs>
	    	</g>
		</svg>
		<!-- 放值潛水衣 end -->

		<!-- 男生短版潛水衣 start -->
		<svg preserveAspectRatio="" style="display:none;">
			<g>
		    	<defs>
		        	<clipPath>
		            	<path id="boyS" fill="" stroke="" stroke-width="" stroke-miterlimit="" d="M149,218.9l10-26l11-63c0,0,10-68,53-76s29-7,29-7s7-22,19-26s29-10,38-8s25,6,25,6s9,16,15,18s35,9,35,9s27,1,41,27s22,51,22,51l14,92c0,0-17,11-21,13s-29,10-33,5s-14-48-14-48s-22,44-21,52s-4,23-1,38s10,74,10,74l12,74l1,125c0,0-28,4-39,4s-40,0-42-5s-3-43-3-43l-15-48l-15,90c0,0-3,5-20,6s-52,0-55-3s-8-46-8-46l-4-48l6-66l8-89l9-53v-58l-14,21l-6,22c0,0-18,1-25-2S149,218.9,149,218.9z"/>
		        	</clipPath>
		    	</defs>
	    	</g>
		</svg>
		<!-- 男生短版潛水衣 end -->

		<!-- 男生長版潛水衣 start -->
		<svg preserveAspectRatio="" style="display:none;">
			<g>
		    	<defs>
		        	<clipPath >
		            	<path id="boyL" fill="" stroke="" stroke-width="" stroke-miterlimit="" d="M91.1,47c0,0,37.5-12,45-13.5S149.6,14,149.6,14s69-19.5,73.5-6s58.5,27,67.5,28.5s49.5,51,55.5,129s18,207,18,207s-39,15-46.5,4.5s-37.5-207-37.5-207s-34.5,46.5-16.5,138s15,174,15,201c0,27,19.5,157.5,19.5,157.5l-12,142.5l-42-1.5c0,0,6-45,0-61.5s-16.5-97.5-13.5-117s-21-39-27-99s-22.5-87-22.5-87s-24,171-18,183s-1.5,58.5-7.5,78s-19.5,88.5-19.5,88.5s-48,10.5-46.5-1.5s-1.5-187.5,6-187.5s-6-16.5,3-45s-21-40.5-18-94.5s25.5-283.5,25.5-283.5S104.6,167,92.6,194s-16.5,61.5-16.5,61.5l-37.5,117c0,0-30,4.5-36-3s16.5-142.5,28.5-147s33-130.5,31.5-132S91.1,47,91.1,47z"/>
		        	</clipPath>
		    	</defs>
	    	</g>
		</svg>
		<!-- 男生長版潛水衣 end -->

		<!-- 女生短版潛水衣 start -->
		<svg preserveAspectRatio="" style="display:none;">
			<g>
		    	<defs>
		        	<clipPath>
		            	<path id="girlS" fill="" stroke="" stroke-width="" stroke-miterlimit="" d="M31.1,242.5c0,0,18-156,46.5-166.5s52.5-19.5,55.5-28.5c3-9,7.5-30,33-31.5s42,1.5,42,1.5s7.5,24,25.5,28.5s54,6,66,25.5c12,19.5,40.5,156,40.5,156s-12,13.5-19.5,15s-25.5,6-25.5,6L266.6,166c0,0-22.5,60-18,66s-1.5,40.5,13.5,67.5c15,27,31.5,103.5,31.5,129c0,25.5-12,151.5-12,151.5s-27,6-37.5,4.5c-10.5-1.5-42-4.5-46.5-6c-4.5-1.5-13.5-123-13.5-123s-12,15-9,28.5s-6,88.5-6,88.5s-61.5,10.5-79.5,3s-15-138-15-138l3-61.5c0,0,27-79.5,33-91.5c6-12-13.5-78-13.5-78l-15,49.5C82.1,256,35.6,250,31.1,242.5z"/>
		        	</clipPath>
		    	</defs>
	    	</g>
		</svg>
		<!-- 女生短版潛水衣 end -->

		<!-- 女生長版潛水衣 start -->
		<svg preserveAspectRatio="" style="display:none;">
			<g>
		    	<defs>
		        	<clipPath >
		            	<path id="girlL" fill="" stroke="" stroke-width="" stroke-miterlimit="" d="M3,372.9l9-43l10-38l14-43l13-57l10-66l10-37c0,0,15-26,31-29s26-8,26-8l14-8l-1-12c0,0,5-15,23-19s38-2,44,0s3,12,10,18s29,13,29,13s32,4,37,10s22,27,28,50s20,88,20,88l18,76l20,99c0,0-6,10-11,12s-20,3-23,0s-13-56-19-62s-15-50-15-50l-19-65l-18-49c0,0-14,44-14,50s-6.2,32,1,50c8,20,15,36,20,46s10,49,10,49l7,55l2,29l-8,63l-6,72l2,39l3,24l8,54l-6,66l-4,51l-5-3l-3,4c0,0-37,7-38,1s-4-63-4-63l-7-85c0,0-9-41-12-46s-8-48-8-48l-9-90l-8-48l-7,10l-2,61l-3,79l-4,41c0,0-6,28-5,32s2,32,2,32l-5,56l-7,68l-25,5l-21-4v-36l-5-48v-36l3-39l1-42l-6-36l-12-61l-5-60c0,0-4-42-1-57s9-52,9-52s13-35,16-44s11-38,9-50s-8-41-8-41l-7-14l-10,33l-6,37l-16,41l-15,38l-22,45c0,0-12,3-17,2S3,372.9,3,372.9z"/>
		        	</clipPath>
		    	</defs>
	    	</g>
		</svg>
		<!-- 女生長版潛水衣 end -->

		<div class="cuWetsuit" id="ourdiv">
						
			<div class="cuWetwrap" id="containment-wrapper" style="clip-path: url(#svgPath);">

				<div class="cuWetsuitwrap">
					<img id="cuCustomizeWetSuit">
				</div>				

				<img id="cuWetsuitImg" class="draggable ui-widget-content" style="left:40px; top: 25px; margin: 0px; cursor: pointer;">

				
			</div>
		</div>
		<!--潛水衣 end-->

		<div class="cuPVwrap">			

			<!--版型資訊 start-->
			<div class="cuVersion"></div>
			<!--版型資訊 end-->

			<!--價格 start-->
			<div class="cuPrice" >
				<input type="hidden" name="userprice" id="userprice">
				<h3 class="cuPriceTitle">價格</h3>
				<div class="cuPriceContent">
					<ul>
						<li class="cuPriceVersion"><p class="cuVersionPrice"></p></li>
						<li class="cuImg"><p class="cuImgPrice"></p></li>
						<li id="cuPriceTotal">總價<p id="odometer" class="odometer"></p></li>				
					</ul>
				</div>
			</div>
			<!--價格 end-->

		</div>

		<!--填寫資料 start-->
		<div class="cuWrite">
			<img class="cuTurtleGreen" src="images/cuTurtleGreen.png">
			<h4 class="cuWriteTitle">填寫資料</h4>
			<p class="cuPriceTotal">總價：<span></span></p>
				姓名：<input type="text" id="cuUserName" class="cuWriteContent" name="cuuserName" value='<?php 

				if (isset($_SESSION["memName"])){
					echo $_SESSION["memName"];
				}
				?>'>
				<!-- placeholder="Please enter your name." -->
				電話：<input type="text" name="cuuserPhone" id="cuUserPhone" class="cuWriteContent" value='<?php

				if (isset($_SESSION["memTel"])){
					echo $_SESSION["memTel"];

				}
				?>'>
				<!-- placeholder="Please enter your telephone." -->
				地址：<input type="text" name="cuuserAddr" id="cuUserAddr" class="cuWriteContent">
				<!-- placeholder="Please enter your address." -->
			<div class="cuStep3Buttons">
				<button class="cuPrev2"><a>上一步</a></button>
				<button class="cuNext4"><a>下一步</a></button>
			</div>	
			<img class="cuGrass" src="images/cuGrass.png">
		</div>
		<!--填寫資料 end-->

		<!--確認資料 start-->
		<div class="cuWriteConfirm">
			<img class="cuTurtleGreen" src="images/cuTurtleGreen.png">
			<h4 class="cuWriteTitle">確認資料</h4>
			<p class="cuWriteConfirmPriceTotal">總價：<span></span></p>

				<span class="cuWriteColor"></span>
				<span class="cuWriteImg"></span>
				<span class="cuWriteVersion"></span>	
				<span class="cuWriteSize"></span>	
				姓名：<span class="cuWriteName"></span>
				電話：<span class="cuWriteTel"></span>
				地址：<span class="cuWriteAddr"></span>	

			<div class="cuWriteConfirmButtons">
				<button class="cuPrev3"><a>上一步</a></button>
				<input type="hidden" name="custorderStatus" value="0">
				<button type="submit" id='sendForm'><a>確認下單</a></button>


			</div>	
			<img class="cuGrass" src="images/cuGrass.png">
		</div>
		<input name="userwetsuit" id="userwetsuit" type="hidden">
		<!-- style="display: none" -->
		<!--確認資料 end-->
		</form>
	</div>		

	<!--按鈕們 start-->
	<div class="cuButtons">		
		<div class="cuButtonsContent">
			<button><a href="customWetsuitSex.php">上一步</a></button>
			<button><a id="auto">下載圖片</a></button>
			<button class="cuNext3">下一步</button>
			<!-- <a class="cugetWetsuit">下一步</a> -->
		</div>
	</div>
	<!--按鈕們 end-->
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

<!-- 下載圖片 start-->
<script>	
	$(document).ready(function() {
  		changlogo();  		
 	});
	function changlogo(){
	  	html2canvas($("#containment-wrapper"), {
		   	onrendered: function(canvas) {
			    $("#auto").attr('href', canvas.toDataURL("image/png"));
			    $("#auto").attr('download','myseatunnel.png');
			    var imagedata = canvas.toDataURL('image/png');
		       	var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
		       	$("#userwetsuit").val(imgdata);	 
	   		}
	  	});
 	};		
</script>
<!-- 下載圖片 end-->

<!-- 上傳圖片後把logo的值刪除 start-->
<script>	
	$(document).ready(function() {
		$('#cuupfile').on("change",function(){
			for(var i =0; i<$('.culogobtn').length;i++){
				$('#userofficialImg').val('');	
				$('.culogobtn').eq(i).css('backgroundColor','transparent');
			}
		});
 	});			
</script>
<!-- 上傳圖片後把logo的值刪除 end-->

<script>	
	$(document).ready(function(){
		var storage = sessionStorage;		

		// 進到頁面時,延遲500毫秒,並花1秒緩慢滾動到我設定的位置
		$('html,body').delay(500).animate({scrollTop: $('.cuProcrss').offset().top - 120}, 1000);

		// 判斷使用者一開始所選的性別,呈現出對應的潛水衣
		if(storage['gender']==0){
			$('#cuCustomizeWetSuit').attr('src','images/cuBlueLongWetsuit.png');
			changesvg(1);
		}else {
			$('#cuCustomizeWetSuit').attr('src','images/cuGreenLongWetsuit2.png');
			changesvg(3);
		}	


		// 判斷使用者一開始所選的性別,呈現出對應的svg
		function changesvg(no2){
			var gen = storage['gender'];
			var svgd = "";
			var trf = "";
			switch(gen){
				case '0':
					if(no2 == 1){
						// if($(window).width() > 768){
							svgd = $("#boyL").attr("d");
							trf = "scale(0.67) translate(1%,0%)";
						// }else{
							// svgd = $("#boyL").attr("d");
							// trf = "scale(0.4) translate(-5%, -1%)";
						// }						
					}
					else if(no2 == 2){
						svgd = $("#boyS").attr("d");
						trf = "scale(0.74) translate(-44%, -2%)";
					}
					break;
				case '1':
					if(no2 == 3){
						svgd = $("#girlL").attr("d");
						trf = "scale(0.65) translate(2%,-1%)";
					}
					else if(no2 == 4){
						svgd = $("#girlS").attr("d");
						trf = "scale(0.71) translate(-3%, -1%)";
					}
					break;
			}
			$("#cusvg2").attr("d",svgd);
			$('#cusvg2').css('transform', trf);
		}

		// if($('body').width() < 1200 ){
		// 	$('.cuWetwrap').css('left','60%');
		// }else{			
		// 	$('.cuWetwrap').css('left','50%');}

		// if($('body').width() < 768 ){
		// 	$('.cuWetsuit').css('display','block');
		// 	$('svg').css('display','none');
		// }else{			
		// 	$('.cuWetsuit').css('display','block');
		// 	$('svg').css('display','block');}

		// $(window).resize(function(){
		// 	if($('body').width() < 1200 ){
		// 		$('.cuWetwrap').css('left','60%');
		// 	}else{
		// 		$('.cuWetwrap').css('left','50%');}
		// });

		// $(window).resize(function(){
		// 	if($('body').width() < 768 ){
		// 		$('.cuWetsuit').css('display','block');
		// 		$('svg').css('display','block');
		// 	}else{
		// 		$('.cuWetsuit').css('display','block');}
		// });		

		// 撈官方圖片資料庫		
		$.ajax({
			url: 'cuofficialimgName.php',		
			dataType: 'text',			
			success: function(data){
				$('.cuLogoPlus').before(data);
				// $('.culogobtns').html(data);
				$('.culogobtn').click(function(e){
					event.preventDefault();	
					$('.culogobtn').css('backgroundColor','transparent');
					$(this).css('backgroundColor','#07336e');
					no = $(this).children('input').val();

					$('#cuupfile').val('');
					// console.log($(this).children('input').val());
					$("#userofficialImg").val(no);							
					officialimgajax(no);					
				});		
			}
		});	
		function officialimgajax(no){
			// 撈官方圖片資料庫		
			$.ajax({
				url: 'cuofficialimgName1.php',
				data: {officialImgNo:no},
				type: 'POST',		
				dataType: 'text',
				success: function(data){
					$('.cuImg').html(data);
					Pricetotal();		
				}
			});	
		};

		$.ajax({
		// 撈顏色資料庫,顯示按鈕文字跟圖片
			url: 'cucolorName.php',		
			dataType: 'text',	 
			data: {
				gender: storage['gender'],
			},		
			success: function(data){				
				$('.cuSelectColorContent').append(data);
				$('.cucolorbtn:first-child').css('backgroundColor','#07336e');
				// 點擊顏色按鈕,抓到版型是哪一個
				$('.cucolorbtn').click(function(e){
					event.preventDefault();
					$('.cucolorbtn').css('backgroundColor','transparent');
					$(this).css('backgroundColor','#07336e');
					var no1 = $(this).children('input').val();
					
					for(var cui = 0;cui <= no1.length;cui++){
						if($('.cuversionbtn').eq(cui).css('backgroundColor') == 'rgb(7, 51, 110)'){
							var no2 = $('.cuversionbtn').eq(cui).children('input').val();
						}						
					}
					$("#usercolor").val(no1);
					// console.log('顏色'+no1,'版型'+no2);
					wetsuitajax(no1,no2);
				});					
			}
		});	

		// 撈潛水衣資料庫,顯示潛水衣顏色
		function wetsuitajax(no1,no2){
			$.ajax({			
				url: 'cucolorWetsuit.php',
				data: {colorNo:no1,versionNo:no2},
				type: 'POST',		
				dataType: 'text',			
				success: function(data){
					$('.cuWetsuitwrap').html(data);
			 		doFirst();
					changlogo();	
					changesvg(no2);
				}
			});
		};
		// window.addEventListener('load',wetsuitajax(colorNo,versionNo));	
	

		$.ajax({
		// 撈版型資料庫,顯示按鈕文字	
			url: 'cuversionName1.php',				
			dataType: 'text',
			data: {
				gender: storage['gender'],
			},				
			success: function(data){	
				$('.cuSelectVersionContent').append(data);
				$('.cuversionbtn:first-child').css('backgroundColor','#07336e');
				// 點擊版型按鈕,抓到顏色是哪一個
				$('.cuversionbtn').click(function(e){
					event.preventDefault();
					$('.cuversionbtn').css('backgroundColor','transparent');
					$(this).css('backgroundColor','#07336e');		
					var no = $(this).children('input').val();
					// console.log($(this).children('input').val());
					for(var cui = 0;cui <= $('.cucolorbtn').length;cui++){
						if($('.cucolorbtn').eq(cui).css('backgroundColor') == 'rgb(7, 51, 110)'){
							var no2 = $('.cucolorbtn').eq(cui).children('input').val();
						}						
					}
					$("#userversion").val(no);
					versionajax(no);
					versionajax2(no);
					// console.log('版型'+no,'顏色'+no2);
					wetsuitajax(no2,no);					
				});
			}
		});		
		
		function versionajax(no){	
			$.ajax({
			// 撈版型資料庫,顯示版型資訊
				url: 'cuversionName.php',	
				data: {versionNo:no},
				type: 'POST',	
				dataType: 'text',			
				success: function(data){				
					$('.cuVersion').html(data);
				}
			});	
		};
		window.addEventListener('load',versionajax(no=1));

		function versionajax2(no){	
			$.ajax({
			// 撈版型資料庫,顯示價格
				url: 'cuversionName2.php',	
				data: {versionNo:no},
				type: 'POST',	
				dataType: 'text',			
				success: function(data){				
					$('.cuPriceVersion').html(data);
					Pricetotal();
				}
			});	
		};
		window.addEventListener('load',versionajax2(no=1));

		$('.cusizebtn:first-child').css('backgroundColor','#07336e');
		$('.cusizebtn').click(function(){
			$('.cusizebtn').css('backgroundColor','transparent');
			$(this).css('backgroundColor','#07336e');
		});	

		// 預設第一個選擇打開	
		$("h4").first().find('.cuuparrow').show();
		$("h4").first().find('.cudownarrow').hide();	
		$("h4").next('div').slideUp("fast");		
		$("h4").find('div').slideUp("slow");
		$("h4").first().next('div').slideDown("slow");
		
  		$("h4").click(function () {	
            $("h4").not($(this)).find('.cuuparrow').hide();
            $("h4").not($(this)).find('.cudownarrow').show();
            $(this).find('.cudownarrow').toggle();
            $(this).find('.cuuparrow').toggle();
            $("h4").not($(this)).next('div').slideUp("slow");
            $(this).next('div').slideToggle("slow");       
        });

		// 數字跳動
		setTimeout(function(){
		    $('.odometer').html()
		}, 3000);

		$('#fish').fadeOut(4500);

		$('.cusizebtn').click(function(e){
			event.preventDefault();	
			no = $(this).text();
			// console.log($(this).text());
			$("#usersize").val(no);					
		});		
});
</script>

<!--總價加總 start-->
<script>
	function Pricetotal(){		
		var total;

		var cuVersionPrice = document.getElementsByClassName('cuVersionPrice')[0];
		var cuImgPrice = document.getElementsByClassName('cuImgPrice')[0];
		// console.log(cuVersionPrice.innerText);
		// console.log(cuImgPrice.innerText);
		if(cuImgPrice.innerText){
			total = parseInt(cuVersionPrice.innerText) + parseInt(cuImgPrice.innerText);
			// console.log(total);
		}else{
			total = parseInt(cuVersionPrice.innerText);
			// console.log(total);
		}	
		document.getElementById('odometer').innerText = total;
		storage['PriceTotal'] = total ;
		$("#userprice").val(total);
		// console.log(total);
		// $("#userprice").val() = $('#odometer').text();	
	};
	function Pricedelete(){
		// alert('delete');
		var total2;
		var cuVersionPrice = document.getElementsByClassName('cuVersionPrice')[0];
		total2 = parseInt(cuVersionPrice.innerText);
		// console.log($('#odometer').text());	
		document.getElementById('odometer').innerText = total2;
		storage['PriceTotal'] = total2;
		// $("#userprice").val() = $('#odometer').text();
		$("#userprice").val(total2);	
	}	
</script>
<!--總價加總 end-->

<!-- 點擊步驟二下一步觸發事件 start -->
<script type="text/javascript">
	$(document).ready(function(){
		memNo = <?php echo $memToNo; ?> ;
		memName = '<?php echo $memName; ?>' ;
		memTel = <?php echo $memTel; ?> ;
	})
</script>


<script>
$(document).ready(function(){

	// console.log(1);
	$('.cuNext3').on('click', function(e){
		event.preventDefault();

		if( memNo != 0){
			$('#cuUserName').attr('value',memName);
   			$('#cuUserPhone').attr('value',memTel);
	    var memNum = memNo;	    
	    // console.log(memNum);

		$('.cuSelectPanel').css('display','none');
		$('.cuPVwrap').css('display','none');
		$('.cuWrite').css('display','block');
		$('.cuButtons').css('display','none');

		if($('body').width() < 1200 ){
			$('.cuWetwrap').css('left','5%');
		}else{			
			$('.cuWetwrap').css('left','25%');}

		if($('body').width() < 768 ){
			$('.cuWetsuit').css('display','none');
			$('svg').css('display','none');
		}else{			
			$('.cuWetsuit').css('display','block');
			$('svg').css('display','block');}

		$(window).resize(function(){
			if($('body').width() < 1200 ){
				$('.cuWetwrap').css('left','5%');
			}else{
				$('.cuWetwrap').css('left','25%');}
		});

		$(window).resize(function(){
			// console.log('2');
			if($('body').width() < 768 ){
				$('.cuWetsuit').css('display','none');
				$('svg').css('display','none');
			}else{
				$('.cuWetsuit').css('display','block');
				$('svg').css('display','block');}
		});

		$('.cuPro3 span').css('color','#333');
		$('.cuPro3 p').css('color','#333');

		$('.cuPriceTotal span').html(storage['PriceTotal']);

		$( "#cuWetsuitImg" ).draggable( 'disable' ).css('cursor','auto');

		// var storage = sessionStorage;
		// console.log($('#userofficialImg').val());
		// storage['color'] = $('#usercolor').val();
		// storage['officialImg'] = $('#userofficialImg').val();
		// storage['version'] = $('#userversion').val();
		// storage['size'] = $('#usersize').val();

		// 判斷是否已經登入會員
		
		}else{
	    $('#NotLogged').fadeIn(500);
	    var memNum = 0;
	    // alert("還未登入");
	    console.log(memNum);
	   }

	});
});	
</script>
<!-- 點擊步驟二下一步觸發事件 end -->

<!-- 點擊步驟三上一步觸發事件 start -->
<script>
$(document).ready(function(){
	// console.log(1);
	$('.cuPrev2').on('click', function(e){
		event.preventDefault();
		$('.cuSelectPanel').css('display','block');
		$('.cuPVwrap').css('display','block');
		$('.cuWrite').css('display','none');
		$('.cuButtons').css('display','block');

		if($('body').width() < 1200 ){
			$('.cuWetwrap').css('left','60%');
		}else{			
			$('.cuWetwrap').css('left','50%');}

		if($('body').width() < 768 ){
			$('.cuWetsuit').css('display','block');
			$('svg').css('display','none');
		}else{			
			$('.cuWetsuit').css('display','block');
			$('svg').css('display','block');}

		$(window).resize(function(){
			if($('body').width() < 1200 ){
				$('.cuWetwrap').css('left','60%');
			}else{
				$('.cuWetwrap').css('left','50%');}
		});

		$(window).resize(function(){
			if($('body').width() < 768 ){
				$('.cuWetsuit').css('display','block');
				$('svg').css('display','block');
			}else{
				$('.cuWetsuit').css('display','block');}
		});

		$('.cuPro3 span').css('color','#fff');
		$('.cuPro3 p').css('color','#fff');

		$("#cuWetsuitImg").draggable({disabled: false}).css('cursor','pointer');
		$("#cuWetsuitImg").draggable({ containment: "#containment-wrapper", scroll: false });
	});
});	
</script>
<!-- 點擊步驟三上一步觸發事件 end -->

<!-- 點擊步驟三下一步觸發事件 start -->
<script>
$(document).ready(function(){

	var storage = sessionStorage;

	$('.cuWriteColor').html(storage['color']);
	$('.cuWriteImg').html(storage['officialImg']);
	$('.cuWriteVersion').html(storage['version']);
	$('.cuWriteSize').html(storage['size']);

	// console.log(1);
	$('.cuNext4').on('click', function(e){
		event.preventDefault();

		if ($('.cuWriteContent').val()==''){
			alert('請填寫您的資料');
		}else if ($('#cuUserPhone').val()==''){
			alert('請填寫您的資料');
		}else if ($('#cuUserAddr').val()==''){
			alert('請填寫您的資料');
		}else{


		// console.log(2);
		$('.cuWrite').css('display','none');
		$('.cuWriteConfirm').css('display','block');

		if($('body').width() < 1200 ){
			console.log(1);
			$('.cuWetwrap').css('left','5%');
		}else{			
			$('.cuWetwrap').css('left','25%');}

		if($('body').width() < 768 ){
			console.log(1);
			$('.cuWetsuit').css('display','none');
		}else{			
			$('.cuWetsuit').css('display','block');}

		$(window).resize(function(){
			// console.log('2');
			if($('body').width() < 1200 ){
				$('.cuWetwrap').css('left','5%');
			}else{
				$('.cuWetwrap').css('left','25%');}
		});

		$(window).resize(function(){
			// console.log('2');
			if($('body').width() < 768 ){
				$('.cuWetsuit').css('display','none');
			}else{
				$('.cuWetsuit').css('display','block');}
		});

		$('.cuPro4 span').css('color','#333');
		$('.cuPro4 p').css('color','#333');

		$('.cuWriteConfirmPriceTotal span').html(storage['PriceTotal']);

		$( "#cuWetsuitImg" ).draggable( 'disable' ).css('cursor','auto');
		
		// 抓到使用者填寫資訊的值
		$('.cuWriteName').html(storage['UserName']);
		$('.cuWriteTel').html(storage['UserPhone']);
		$('.cuWriteAddr').html(storage['UserAddr']);

		}

	});

});	
</script>
<!-- 點擊步驟三下一步觸發事件 end -->

<!-- 點擊步驟四上一步觸發事件 start -->
<script>
$(document).ready(function(){
	// console.log(1);
	$('.cuPrev3').on('click', function(e){
		event.preventDefault();
		$('.cuWrite').css('display','block');
		$('.cuWriteConfirm').css('display','none');

		if($('body').width() < 1200 ){
			console.log(1);
			$('.cuWetwrap').css('left','5%');
		}else{			
			$('.cuWetwrap').css('left','25%');}

		if($('body').width() < 768 ){
			console.log(1);
			$('.cuWetsuit').css('display','none');
		}else{			
			$('.cuWetsuit').css('display','block');}

		$(window).resize(function(){
			// console.log('2');
			if($('body').width() < 1200 ){
				$('.cuWetwrap').css('left','5%');
			}else{
				$('.cuWetwrap').css('left','25%');}
		});

		$(window).resize(function(){
			// console.log('2');
			if($('body').width() < 768 ){
				$('.cuWetsuit').css('display','none');
			}else{
				$('.cuWetsuit').css('display','block');}
		});

		$('.cuPro4 span').css('color','#fff');
		$('.cuPro4 p').css('color','#fff');

		$( "#cuWetsuitImg" ).draggable( 'disable' ).css('cursor','auto');
	});
});	
</script>
<!-- 點擊步驟四上一步觸發事件 end -->

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

</body>
</html>