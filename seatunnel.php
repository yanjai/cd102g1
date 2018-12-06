<?php 
ob_start();
session_start();
if(isset($_SESSION["memNo"])){
 
 $memToNo = $_SESSION["memNo"];
 // echo $memToNo;
}
else{
  $memToNo = 0;
}

 ?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>seatunnel</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover"> -->
<link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<link rel="stylesheet" href="css/jquery.fullPage.css">

<link rel="stylesheet" type="text/css" href="css/style.css"> 
<link rel="stylesheet" type="text/css" href="css/member.css"> 
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/coachIndex.css">

<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/loading.css">

<link href="https://fonts.googleapis.com/css?family=Anton|Fjalla+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/jquery.fullPage.min.js"></script>

<script src="js/jquery.drawsvg.js"></script>
<script src="js/jquery.ripples.js"></script>
<script src="js/loading.js"></script>
<script src="js/memlogin2.js"></script>

<script>
	document.documentElement.className = "js";
	var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e };
	supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
</script>
</head>

<body>

	<!-- loading 畫面 start -->
	<div class="culoading">
		<svg class="loading" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="574.558px" height="190px" viewBox="0 0 574.558 120" enable-background="new 0 0 574.558 120" xml:space="preserve">
		  <defs>
		    <pattern id="water" width=".25" height="1.1" patternContentUnits="objectBoundingBox">
		      <path fill="#fff" d="M0.25,1H0c0,0,0-0.659,0-0.916c0.083-0.303,0.158,0.334,0.25,0C0.25,0.327,0.25,1,0.25,1z"/>
		    </pattern>
		    
		    <text id="text" transform="matrix(1 0 0 1 -8.0684 116.7852)" font-size="161.047">LOADING</text>
		    
		    <mask id="text_mask">
		      <use x="0" y="0" xlink:href="#text" opacity="1" fill="#3498db"/>
		    </mask>
		  </defs>
		 
		  <use x="0" y="0" xlink:href="#text" fill="#3498db"/>
		  
		  <rect class="water-fill" mask="url(#text_mask)" fill="url(#water)" x="-400" y="0" width="1600" height="120"/>
		</svg> 
	</div>
	<!-- loading 畫面 end -->



<!-- 燈箱：登入 start -->
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

<!-- 燈箱：登入end -->

<div class="inIndexMenu animateIndex">
		<a href="seatunnel.php"><img src="images/inlogo.png"></a>
		<ul>
			<li><a href="customWetsuitSex.php">客製潛水衣</a></li>
			<li><a href="divinggear.php">潛水裝備</a></li>
			<li><a href="wholeActivity.php">活動總覽</a></li>
			<li><a href="coach.php">教練團隊</a></li>
			<li><a href="chBot.php">教練諮詢</a></li>
			<li><a href="aboutus.php">關於我們</a></li>
			<li><a href="FishingGarbage.php">守護海洋</a></li>
			<li>
					<a id="inmemUp" class="memUp" href="memUpdate.php">
						<i class="fas fa-user"></i>
					</a>
					<span id="memName" class="seaName">&nbsp;</span>
					<span id="spanLogin" onclick="document.getElementById('memJump').style.display='block'" style="width:auto;">登入</span>
					<!-- <div class="con"></div> -->
			</li>
			<li class="inshopcart">
				<a href="shoppingCart.php">
					<i class="fas fa-cart-plus">
					<span class="incart">&nbsp;購物車</span>
					</i>
				</a>
		    </li>
		</ul>
</div>
<!-- 我改了選單拉到body下面 -->
<!--第一屏 start-->

<div class="section inIndexBg">

	<div class="inIndexFirstTitle">
	
			<!--svg start-->
			<div class="inloader">
				<div class="loader-content draw">
				<svg class="inwetsuitLine animateupAnddown" version="1.1" id="indexSvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 595.3 841.9" style="enable-background:new 0 0 595.3 841.9;" xml:space="preserve">
				<style type="text/css">
					.st0{fill:none;stroke:#fff;stroke-miterlimit:10;}
				</style>
				<path class="st0" d="M359.5,59.5c-71,54-111,0-111,0 M344.5,266.5c0,0,20-71,22-89s9-24,9-24c14-44-31-75-31-75 M248.5,71.5
					c0,0-48,32-46,54s8,29,8,29 M165.5,226.5c40-41,24-88,24-88 M165.5,278.5c1-23-13-32-13-32 M434.5,295.5c2-14,30-19,28-33
					s-12-16-12-16c-50-58-44-115-44-115 M210.5,282.5c0,0,14,30,38,28s62-18,74-22s37-10,37-10 M298.5,501.5c0,0-9-56-14-85
					s-43.6-23.4-52-8c-18,33,3,142,11,167s30,51,41,76s29,71,29,71 M344.5,740.5c7,1,33-5,44-18s10-22,10-22 M344,34.6
					C339.5,56.5,301,55.9,301,55.9c-32.5-2.6-31.8-18-31.8-18l-7.6,2.6c0,0-5,2-24,10s-44,26-44,26s-24,15-27,44s-8,51-8,51s-5,51-15,75
					s-17,78-25,124l-3,16c0,0-1,5,22,7c23.4,2,33-11,31-18s26-70,30-79s-1,19-1,19s-22,84-26,101s-9,57-5,76s9,50,10,59s-5,35,5,46
					s25,21,29,32s23,41,44,78s28,45,28,45s45.2,7.2,48.8-19.5c0.2-1.4,0.3-2.9,0.2-4.5v-10c0,0-15-27-23-62s-19-59-23-62s-14-24-16-35
					s12-78,12-78c3,1,12,56,16,84s13,56,17,65s5,13,5,13s-2,26,8,53s16,60,19,67s10,30,10,37s3,10,3,10c11,12,65-6,57-14s-8-11-8-11
					s1-114,0-130s-14-31-21-45s-1-21-4-35s6-74,8-88s-11-99-15-149s-9-40-8-54s30-68,30-68c2-4,11,29,12,51s-2,59,0,71s-4,65-4,65
					s2,28.9,40,18c7-2,6-5,6-5s10-43,19-70s8-53,8-53s-2-8-5-50s-27-119-32-134s-7-26-31-38s-58-34-58-34l-9.4-5c0,0-0.6-13.1-35.1-12.5
					c-28.4,0.5-36.7,11.2-38.8,15c-0.4,0.8-0.6,1.3-0.6,1.3"/>
				</svg>
				</div>
			</div>
			<!--svg end-->
			<div class="indexWetsuitBox">	
				<div class="indexWetsuit">
					<img src="images/index_first_wetsuit.png">
				</div>
			</div>

			<div class="indexWetsuitCircle indexWetsuitCircle1"></div>
			<div class="indexWetsuitLine indexWetsuitLine1"></div>
			<div class="indexWetsuitText indexWetsuitText1"><p>保暖度</p></div>

			<div class="indexWetsuitCircle indexWetsuitCircle2"></div>
			<div class="indexWetsuitLine indexWetsuitLine2"></div>
			<div class="indexWetsuitText indexWetsuitText2"><p>舒適度</p></div>

			<div class="indexWetsuitCircle indexWetsuitCircle3"></div>
			<div class="indexWetsuitLine indexWetsuitLine3"></div>
			<div class="indexWetsuitText indexWetsuitText3"><p>延展度</p></div>
	
	  

		<div class="intextFont">

			<h2 class="intitle1">DESIGN YOUR CUSTOM</h2>
			<div class="intextEffect">
				<h1>WETSUIT</h1>
			</div>
			<span>WE PRODUCE EACH SUIT INDIVIDUALLY</span>
		</div>
	</div>
</div>



<!--內容 end-->
<!--第一屏 end-->



<!--第二屏 start-->

<div class="section inIndexBgCloth" id="inIndexBgCloth">
	<h2>客製化潛水衣</h2>
	
	<!--漢堡選單 start-->
	<div id="main" onclick="w3_open()">
		<div id="inHanMenu" class="inHanMenu" onclick="openNav()">
			<span class="inhan hanTop"></span>
			<span class="inhan hanMid"></span>
			<span class="inhan hanBtm"></span>
		</div>
	</div>


	<div id="indexNav" class="inNavBar inoverlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<ul class="inNav inoverlayContent">
				<li class="inmenulist indexwave"><a href="customWetsuitSex.php">客製潛水衣</a></li>
				<li class="inmenulist indexwave"><a href="divinggear.php">潛水裝備</a></li>
			    <li class="inmenulist indexwave"><a href="wholeActivity.php">活動總覽</a></li>
			    <li class="inmenulist indexwave"><a href="coach.php">教練團隊</a></li>
				<li class="inmenulist indexwave"><a href="chBot.php">教練諮詢</a></li>
				<li class="inmenulist indexwave"><a href="aboutus.php">關於我們</a></li>
				<li class="inmenulist indexwave"><a href="FishingGarbage.php">守護海洋</a></li>
				<li class="inmenulist inLogin">
					<a id="inmemUp" class="memUp" href="memUpdate.php">
						<i class="fas fa-user"></i>
					</a>
					<span id="memName2">&nbsp;</span>
					<span id="spanLogin2" onclick="document.getElementById('memJump').style.display='block'" style="width:auto;">登入</span>
				</li>
				<li>
					<a href="shoppingCart.php">
						<i class="fas fa-cart-plus">
							<span class="incart">&nbsp;購物車</span>
						</i>
					</a>
				</li>
			</ul>
	</div>

<!--漢堡選單 end-->




	<div class="inCustomWetsuitAll">
			<div class="inCustomProcess section05">
				<div class="inCustomProcessBox">
					<h4>客製化流程介紹</h4>
					<div class="stepOne">
							            <div class="num"><p>1</p></div>
							            <div class="pic"><img src="images/index_icon1.png"></div>
						<div class="txt">
							<p>選擇樣式</p>
							<p>選擇版型、顏色、圖案</p>
					    </div>
					</div>
					<div class="stepTwo">
						<div class="num"><p>2</p></div>
								        <div lass="pic"><img src="images/index_icon2.png"></div>
						<div class="txt">
							<p>填寫購買資料</p>
							<p>填寫個人資訊</p>
					    </div>
					</div>
					<div class="stepThree">
						<div class="num"><p>3</p></div>
								        <div class="pic"><img src="images/index_icon3.png"></div>
						<div class="txt">
							<p>確認購買資料</p>
							<p>確認購買資訊</p>
					    </div>
					</div>
					<div class="indexButton">
						<button><a href="customWetsuitSex.php">前往內頁</a></button>
					</div>
				</div>
	        </div>

			<div class="inCustomWetsuit">
				<div class="inCustomWetsuitBox">
					<img src="images/in_logo1_small.png" class="patternOneSmall" id="insmall">
					<img src="images/index_second_wetsuit_girl.png">
				</div>
				
			</div>
			<div class="indexLogoBox">
				<div class="indexLogo">
					<div class="parttern patternOne">
						<img src="images/in_logo1.png" class="inbig inColorChange">
					</div>
					<div class="indexCircle indexCircle1"></div>
					<div class="indexLine indexLine1"></div>	
					
					<div class="parttern patternTwo">
						<img src="images/in_logo2.png" class="inbig">
					</div>
					<div class="indexCircle indexCircle2"></div>
					<div class="indexLine indexLine2"></div>
					
					<div class="parttern patternThree">
						<img src="images/in_logo3.png" class="inbig">
					</div>
					<div class="indexCircle indexCircle3"></div>
					<div class="indexLine indexLine3"></div>
					
					<div class="parttern patternForth">
						<img src="images/in_logo4.png" class="inbig">
					</div>
					<div class="indexCircle indexCircle4"></div>
					<div class="indexLine indexLine4"></div>
			  </div>
		 </div>	  
		 	  
	</div>
</div>

<!--第二屏 end-->



<!--第三屏 start-->

<div id="indexVideo" class="section inIndexVideo">

	<h2>熱門活動</h2>
	
	<div class="indexVideoBox">
	    <video autoplay="" loop="" muted=""  poster="images/index_video_bg.jpg" width="100%" height="auto" id="bgvid">
		<source src="video/Diving with Sea Turtles!.mp4" type="video/mp4"/>
		</video>
	</div>
	<div class="indexPopularEventBox">
		<div class="indexPopularEvent">
			<div class="incontentGroup">	
				<div class="content content1 active">
					<h3>【海龜共游體驗潛水】</h3>
					<p class="insecondP">告別在水面與綠蠵龜打招呼的年代，
					潛入海中近距離欣賞保育類動物-綠蠵龜，體驗在水中無重力的漂浮感，
					海底奇觀不再只是透過Discovery頻道而是親自探訪神秘海底。</p>
					<p class="incontentGroup2">
					感受日常生活無法體驗的全新享受，讓你進入另一個意想不到的奇幻世界。
					由國際合格潛水教練教導如何在水底呼吸，安全愉快的進行體驗潛水活動。
					在水裡時間約40分鐘，你將體驗到前所未有的樂趣。
				    </p>
				</div>
				<div class="content content2">
					<h3>【與鯊魚共舞】</h3>
					<p class="insecondP">
					感受日常生活無法體驗的全新享受，讓你進入另一個意想不到的奇幻世界。
					由國際合格潛水教練教導如何在水底呼吸，安全愉快的進行體驗潛水活動。
					在水裡時間約40分鐘，你將體驗到前所未有的樂趣。</p>
				</div>
				<div class="content content3">
					<h3>【海豚冒險】</h3>
					<p class="insecondP">
					一輩子一定要體驗一次，感受日常生活無法體驗的全新享受，讓你進入另一個意想不到的奇幻世界。
					由國際合格潛水教練教導如何在水底呼吸，安全愉快的進行體驗潛水活動。
				   </p>
				</div>
				<div class="content content4">
					<h3>【前往更多活動】</h3>
					<p>
					潛水又可以分為浮潛、深潛、自由潛水，浮潛就如同字面上的意思，只要配戴面鏡呼吸管並穿上蛙鞋，浮在水面上一覽海下風情，是最為方便也最簡單的水上活動。深潛又稱為水肺潛水，就是我們常常會在海邊看到揹著氧氣瓶穿著厚重裝備的人，因為有氧氣瓶供給氧氣，所以可以潛到相當深的海底世界，能看到的海洋生物種類更是豐富，但需要的技巧也較為複雜。</p>
				</div>
			</div>
			<div class="indexButton">
				<button><a href="wholeActivity.php">前往更多活動</a></button>
			</div>	
	    </div>



	    <div class="indexVideoText">
	    	   <div class="indexTextPic indexTextPic1"> 
			    	<a href="#" class="tab tab1 active">
			    		<img src="images/index_seaturtle.jpg" class="inturtle">
			    		<h4>與海龜共遊</h4>
			        </a>
		       </div>

			   <div class="indexTextPic indexTextPic2">
				<a href="#" class="tab tab2">
		    		<img src="images/index_shark.jpg" class="inshark">
		    		<h4>與鯊魚共舞</h4>
		        </a>
		       </div>
		       <div class="indexTextPic indexTextPic3"> 
		        <a href="#" class="tab tab3">
		    		<img src="images/index_dophin.jpg" class="inship">
		    		<h4>海豚冒險</h4>
		    	</a>
			   </div>
			   <div class="indexTextPic indexTextPic4"> 
		    	<a href="#" class="tab tab4">
		    		<img src="images/index_diving.jpg" class="inship">
		    		<h4>前往更多活動</h4>
		    	</a>
		       </div>	
		        
		</div>
	</div>		
		
</div>
<!--第三屏 end-->



<!--第四屏 start-->
<div class="section inIndexBgCoachTeam">
	<h2>教練團隊</h2>
	<main class="coMain">
		<div class="coSlideshow">
		
		

		</div>
	</main>
</div>

<!--第四屏 end-->



<!--第五屏 start-->

<div class="section inIndexBgAbout indexAboutTitle" id="parallax_box" data-hover-only="true">
	<h2>關於我們</h2>

<div class="inIndexArea">
	<div class="inIndexAboutPic" data-depth="0.8">
		<img src="images/index_fish_yellow.png" class="inyellowFish">
		<img src="images/index_left_pic.jpg" class="indivers">
	</div>

	<div class="inIndexAboutTxt" data-depth="0.3">
		<h2>「近年來環境污染愈發嚴重，純淨的海灘和海域僅          
	   存於記憶中。」</h2>
	   <p class="inaboutLast">在整個安靜的水世界，只聽到自己的一呼一吸的感覺。
		眼前只有無盡的藍，有時甚至被魚風暴包圍。
		奇妙的失重感，感覺自己在飛，在翱翔。</p>

		<p class="inaboutLast">自此，我們愛上了海，愛上這種無法言喻的美妙。
		沒有親身體會過，永遠無法想像是怎樣的場景。
		如果你喜歡旅行，想著「世界這麼大，我想去看看」，
		卻從來沒有接觸過潛水或考獲潛水牌，
		那我們要告訴你，
		「世界確實很大，但很多地方要潛水才能看」！</p>

		<button><a href="aboutus.php">前往內頁</a></button>
	</div>

</div>

<!--footer start-->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>	
<!--footer end-->	
</div>
<!--第五屏 end-->


<!--js start-->
<script>
	
//fullpage js start
$(document).ready(function() {
	$.fn.fullpage({
		slidesColor: ['#0b1f44', '#40c7db', '#40c7db', '#185e97', '#072966'],
		anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
		navigation: true,
		navigationTooltips: ['專業客製化潛水衣', '客製化潛水衣', '熱門活動', '教練團隊', '關於我們'],
		afterRender: function(){
		}
		,
		afterLoad: function(anchorLink,index){
			if(index==1 && $(window).width()>992){
				$('#inHanMenu').css('display','none');
				$('.indexWetsuitCircle').css('display','none');
				$('.indexWetsuitText').css('display','none');
				$('.indexWetsuitLine').css('display','none');

				$('.inIndexMenu').css('display','block');
				$('.inIndexMenu').css('background','none');
				$('.inIndexAboutTxt').removeClass('animateIndexAbout');
				$('.inIndexAboutPic').removeClass('animateIndexAboutRight');
				$('.indexPopularEvent').removeClass('animateIndex');


				$('.patternOne').removeClass('indexPattern1');
				$('.patternTwo').removeClass('indexPattern2');
				$('.patternThree').removeClass('indexPattern3');
				$('.patternForth').removeClass('indexPattern4');

				$('.stepOne').removeClass('animateIndexPatternLeft1');
				$('.stepTwo').removeClass('animateIndexPatternLeft2');
				$('.stepThree').removeClass('animateIndexPatternLeft3');

				$('.intextFont').addClass('animateIndex');
				$('.indexWetsuitBox').addClass('animateIndex');
				$('.indexWetsuitBox').removeClass('animateIndexDelay');

				$('.indexTextPic1').removeClass('animateIndex');
				$('.indexTextPic3').removeClass('animateIndex');
				$('.indexTextPic2').removeClass('animateIndexLittleLate');
				$('.indexTextPic4').removeClass('animateIndexLittleLate');

				$('#indexNav').css('left','-100%');

				
			}else{
				$('#inHanMenu').css('display','block');
				$('.inIndexMenu').css('display','none');
				
			}


			if(index==2){
				$('#inHanMenu').css('display','block');
				$('.inIndexMenu').css('display','none');

				$('.stepOne').addClass('animateIndexPatternLeft1');
				$('.stepTwo').addClass('animateIndexPatternLeft2');
				$('.stepThree').addClass('animateIndexPatternLeft3');

				$('.patternOne').addClass('indexPattern1');
				$('.patternTwo').addClass('indexPattern2');
				$('.patternThree').addClass('indexPattern3');
				$('.patternForth').addClass('indexPattern4');


				$('.inIndexAboutTxt').removeClass('animateIndexAbout');
				$('.inIndexAboutPic').removeClass('animateIndexAboutRight');
				$('.indexPopularEvent').removeClass('animateIndex');
				$('.intextFont').removeClass('animateIndex');
				$('.indexWetsuitBox').removeClass('animateIndex');
				console.log('ccc');

				$('.indexTextPic1').removeClass('animateIndex');
				$('.indexTextPic3').removeClass('animateIndex');
				$('.indexTextPic2').removeClass('animateIndexLittleLate');
				$('.indexTextPic4').removeClass('animateIndexLittleLate');

				$('#indexNav').css('left','-100%');
			}

			if(index==3){
				$('#inHanMenu').css('display','block');
				$('.inIndexMenu').css('display','none');
				$('.inIndexAboutTxt').removeClass('aanimateIndexAbout');
				$('.inIndexAboutPic').removeClass('animateIndexAboutRight');
				$('.indexPopularEvent').addClass('animateIndex');
				$('.intextFont').removeClass('animateIndex');
				$('.indexWetsuitBox').removeClass('animateIndex');
			
				$('.patternOne').removeClass('indexPattern1');
				$('.patternTwo').removeClass('indexPattern2');
				$('.patternThree').removeClass('indexPattern3');
				$('.patternForth').removeClass('indexPattern4');

				$('.indexTextPic1').addClass('animateIndex');
				$('.indexTextPic3').addClass('animateIndex');
				$('.indexTextPic2').addClass('animateIndexLittleLate');
				$('.indexTextPic4').addClass('animateIndexLittleLate');
		
				$('.stepOne').removeClass('animateIndexPatternLeft1');
				$('.stepTwo').removeClass('animateIndexPatternLeft2');
				$('.stepThree').removeClass('animateIndexPatternLeft3');



				document.getElementById('bgvid').play();
				$('#indexNav').css('left','-100%');
				
			}
			if(index==4){
				$('#inHanMenu').css('display','block');
				$('.inIndexMenu').css('display','none');
				$('.inIndexAboutTxt').removeClass('animateIndexAbout');
				$('.inIndexAboutPic').removeClass('animateIndexAboutRight');
				$('.indexPopularEvent').removeClass('animateIndex');
				$('.intextFont').removeClass('animateIndex');
				$('.indexWetsuitBox').removeClass('animateIndex');
				
				$('.patternOne').removeClass('indexPattern1');
				$('.patternTwo').removeClass('indexPattern2');
				$('.patternThree').removeClass('indexPattern3');
				$('.patternForth').removeClass('indexPattern4');
				$('.stepOne').removeClass('animateIndexPatternLeft1');
				$('.stepTwo').removeClass('animateIndexPatternLeft2');
				$('.stepThree').removeClass('animateIndexPatternLeft3');

				$('.indexTextPic1').removeClass('animateIndex');
				$('.indexTextPic3').removeClass('animateIndex');
				$('.indexTextPic2').removeClass('animateIndexLittleLate');
				$('.indexTextPic4').removeClass('animateIndexLittleLate');

				$('#indexNav').css('left','-100%');
			}
			if(index==5){
				$('#inHanMenu').css('display','block');
				$('.inIndexMenu').css('display','none');
				$('.inIndexAboutTxt').addClass('animateIndexAbout');
				$('.inIndexAboutPic').addClass('animateIndexAboutRight');
				$('.indexPopularEvent').removeClass('animateIndex');
				$('.intextFont').removeClass('animateIndex');
				$('.indexWetsuitBox').removeClass('animateIndex');
				
				$('.patternOne').removeClass('indexPattern1');
				$('.patternTwo').removeClass('indexPattern2');
				$('.patternThree').removeClass('indexPattern3');
				$('.patternForth').removeClass('indexPattern4');

				$('.stepOne').removeClass('animateIndexPatternLeft1');
				$('.stepTwo').removeClass('animateIndexPatternLeft2');
				$('.stepThree').removeClass('animateIndexPatternLeft3');

				$('.indexTextPic1').removeClass('animateIndex');
				$('.indexTextPic3').removeClass('animateIndex');
				$('.indexTextPic2').removeClass('animateIndexLittleLate');
				$('.indexTextPic4').removeClass('animateIndexLittleLate');

				$('#indexNav').css('left','-100%');
			
			}


		},
		onLeave: function(index, nextIndex, direction){
			if(index==1){

			}
			if(index==3){
				document.getElementById('bgvid').pause();
			}
		}
		//M7改了
	});
});
//fullpage js end






//第一屏連續動畫 start

$(document).ready(function(){
	 $('.indexWetsuitBox').addClass('animateIndexDelay');	
	 $('.indexWetsuitCircle').addClass('animateIndexDelay2');
	 $('.indexWetsuitText').addClass('animateIndexDelay3');
});


//設定延遲時間	
setTimeout(
	  function() {
	  	// 第一屏動畫 SVG線 start

	  	if($('body').width()<1200){
		    $('#indexSvg').css('display','none');
		    $('.indexWetsuitCircle').css('display','none');	
		    $('.indexWetsuitLine').css('display','none');
		    $('.indexWetsuitText').css('display','none');			

		}else{
			$('#indexSvg').css('display','block');
		};

		var $svg = $('svg').drawsvg({
	      duration: 6000,
	      easing: 'linear'
	    });

		$svg.drawsvg('animate');
		// 第一屏動畫 SVG線 end	   
}, 3600);	




$(document).ready(function(){
	$('.indexWetsuit').addClass('animateupAnddown');	

});
//第一屏連續動畫 end




//漢堡選單 js start
 function openNav() {
	if($('body').width()>992){
			$('.inoverlay').css('left','0');

	//看要螢幕小於多少的時候用另一個選單
		if($('.inIndexMenu').css('display')=='none'){
			$('.inIndexMenu').css('display','none');
		}else{
			$('.inIndexMenu').css('display','none');
		}
	}else{
		document.getElementById("indexNav").style.display = "block";
		document.getElementById("indexNav").style.width = "100%";
		
	}
	

}

function closeNav() {
    $('.inoverlay').css('left','-100%');

}

function w3_open() {
  $('.inoverlay').css('left','0');
  
}
function w3_close() {
  $('.inoverlay').css('left','-100%');
 
}



 //漢堡選單 js end









//第二屏 點圖片換 小LOGO js start

$(document).ready(function(){
  $(".patternOne").click(function(){
        $("#insmall").animate({
            right: '10px',
            opacity: '1',
            height: '70px',
            width: '70px'
        });
        $('.indexCircle1').css("display", "block");
        $('.indexLine1').css("display", "block");
        $('.indexCircle2').css("display", "none");
        $('.indexLine2').css("display", "none");
        $('.indexCircle3').css("display", "none");
        $('.indexLine3').css("display", "none");
        $('.indexCircle4').css("display", "none");
        $('.indexLine4').css("display", "none");
        
    });
	

  $(".patternTwo").click(function(){
        $("#insmall").animate({
            right: '10px',
            opacity: '1',
            height: '60px',
            width: '60px'
        });
        $('.indexCircle2').css("display", "block");
        $('.indexLine2').css("display", "block");
        $('.indexCircle1').css("display", "none");
        $('.indexLine1').css("display", "none");
        $('.indexCircle3').css("display", "none");
        $('.indexLine3').css("display", "none");
        $('.indexCircle4').css("display", "none");
        $('.indexLine4').css("display", "none");
    });


  $(".patternThree").click(function(){
        $("#insmall").animate({
            right: '10px',
            opacity: '1',
            height: '70px',
            width: '70px'
        });
        $('.indexCircle3').css("display", "block");
        $('.indexLine3').css("display", "block");
        $('.indexCircle1').css("display", "none");
        $('.indexLine1').css("display", "none");
        $('.indexCircle2').css("display", "none");
        $('.indexLine2').css("display", "none");
        $('.indexCircle4').css("display", "none");
        $('.indexLine4').css("display", "none");
    });

  $(".patternForth").click(function(){
        $("#insmall").animate({
            right: '10px',
            opacity: '1',
            height: '60px',
            width: '60px'
        });
        $('.indexCircle4').css("display", "block");
        $('.indexLine4').css("display", "block");
        $('.indexCircle1').css("display", "none");
        $('.indexLine1').css("display", "none");
        $('.indexCircle2').css("display", "none");
        $('.indexLine2').css("display", "none");
        $('.indexCircle3').css("display", "none");
        $('.indexLine3').css("display", "none");
    });		  			
    
});


//第二 屏點圖片換 小LOGO js end






//第三屏 影片點換jquery start



$(function(){  

		
		$('.tab1').click( function(){
			$('.tab,.content').removeClass('active');
			$('.tab1, .content1').addClass('active');
		})

		$('.tab2').click( function(){
			$('.tab,.content').removeClass('active');
			$('.tab2, .content2').addClass('active');
		})

		$('.tab3').click( function(){
			$('.tab,.content').removeClass('active');
			$('.tab3, .content3').addClass('active');
		})

		$('.tab4').click( function(){
			$('.tab,.content').removeClass('active');
			$('.tab4, .content4').addClass('active');
			window.location.href = "wholeActivity.php";
			
		})

	});




$(document).ready(function(){
	$(".tab1").click(function(){
 		$("video").attr("src","video/Diving with Sea Turtles!.mp4");

    });


    $(".tab2").click(function(){
        $("video").attr("src","video/Sharks Love To Be Petted - Theyre Like Dogs.mp4");

    });


    $(".tab3").click(function(){
        $("video").attr("src","video/Healing songs of Dolphins  Whales  Deep Meditative Music for Harmony of Inner Peace.mp4");
    });
});
//第三屏 影片點換jquery end




//第五屏 水波動畫 js start
$(document).ready(function() {
	try {
		$('.inIndexBgAbout,.inIndexBg,.inIndexBgCloth').ripples({
			resolution: 500,
			dropRadius: 30, //px
			perturbance: 0.002,
		});
	}
	catch (e) {
		$('.error').show().text(e);
	}
});

//第五屏 水波動畫 js end
</script>

<script>
	$(function(){
		$('.parttern img').click(function(){
			$('.parttern img').css('background','transparent');
			$(this).css('background','#fff');
		})
	})
</script>
<!--js end-->


<script type="text/javascript">
     //點小圖換大圖　start
	function showLarge(e){
	  var inbig = e.target;
	  var large = document.getElementById("insmall");
	  large.src = inbig.src.replace("inbig","small").replace("SP_","");
	}

	function init(){
	  var imgs = document.getElementsByClassName("inbig");
	  for( var i=0; i<imgs.length; i++){
	  	imgs[i].onclick = showLarge;
	  }
	  
	}
	window.onload = init;

	//點小圖換大圖　end

</script>

<!-- <script src="js/tween.js"></script>	 -->
<script>
	$.ajax({
		url: 'indexCoach.php',
		dataType: 'text',
		async: false,
		success: function(data){
			$('.coSlideshow').html(data);

		}

	})
</script>


<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/coach.js"></script>
</body>
</html>