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
	<link rel="stylesheet" type="text/css" href="css/customizeSex.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/member.css">
	<link rel="stylesheet" href="css/memUpdate.css">
    <link rel="stylesheet" type="text/css" href="css/CSS animation.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/odometer-theme-default.css">
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
    <script src="js/cuGender.js"></script>    
    <script src="js/notLoggin.js"></script>
    <script src="js/memlogin_custo.js"></script>
	<title>客製潛水衣</title>
	<style>
	     .cuManbtn{
	      padding: 0;
	     }
	     .cugender{
	     display: block;
	     padding: 8px 15px;
	     width: 100%;
	     height: 100%;
	  }
	  .cuBig{
      cursor: pointer;
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
					<li class="thispage"><a href="customWetsuitSex.php">客製潛水衣</a></li>
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
	<p>先選擇性別唷</p>
	<img src="images/culogo2.png">
</div>

<div class="cuTitle">
	<h3>客製潛水衣</h3>
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
	<div id="cutrigger_02"></div>
	<div class="cuSexContent">
		
		<div class="cuMan">
			<div class="cuBig cuManFront" data-val='0'>
				<img src="images/cuBlueLongWetsuit.png">
			</div>
			<!-- <div class="cuManBack">
				<img src="images/cuBlueLongWetsuitBackk.png">
			</div> -->
			<div><button class="cuManbtn"><a class="cugender" data-val='0'>男生</a></button></div>
		</div>
		<div class="cuWoman">
			<div class="cuBig cuWomanFront" data-val='1'>
				<img src="images/cuGreenLongWetsuit2.png">
			</div>
			<!-- <div class="cuWomanBack">
				<img src="images/cuGreenLongWetsuitBack.png">
			</div> -->
			<div><button class="cuManbtn"><a class="cugender" data-val='1'>女生</a></button></div>
		</div>	
	</div>		
</div>
<!--內容 end-->

<!--footer start-->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>	
<!--footer end-->	

<audio preload="true" loop id="music"></audio>
<canvas id="bubbles"></canvas>

<div class="gotoTop">
	<a href="#top">
	<span>Top</span>
    <img src="images/gotop.png">
    </a>
</div>

<script>	
	$(document).ready(function(){

		// 進到頁面時,延遲一秒,並花三秒緩慢滾動到我設定的位置
		$('html,body').delay(500).animate({scrollTop: $('.cuProcrss').offset().top - 120}, 1000);

		$('#fish').fadeOut(3500);
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

<!-- 滾輪到某處fadeIn start-->
<script>
		var controller = new ScrollMagic.Controller({globalSceneOptions: {duration: 0}});//設定開始跟結束的距離
		//setClassToggle 前面是要被附加的元素 後面是要附加甚麼class上去
		var scence_01 = new ScrollMagic.Scene({triggerElement: "#cutrigger_02",offset: -150,reverse: false})//觸發的元素 、 元素位置下方200才觸發 、true滾輪回去會重複動作
		.setClassToggle('.cuSexContent .cuMan,.cuSexContent .cuWoman',"active")
		// .addIndicators()//看你設定的觸發位置
		.on("enter" ,function(){
			$('.cuSexContent').children('.cuMan').fadeIn(); 
			$('.cuSexContent').children('.cuWoman').fadeIn(); 
		})		
		.addTo(controller);
</script>
<!-- 滾輪到某處fadeIn end-->

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



<script>
	(function(window){
		// 'use strict';
		function debounce(func,wait,immediate){//监听屏幕大小变化时，给点延迟，减少重新绘制canvas的频率
			var timeout;
			return function(){
				var context=this,args=arguments;
				var later = function(){
					timeout=null;
					if(!immediate) func.apply(context,args);
				};
				var callNow=immediate && !timeout;
				clearTimeout(timeout);
				timeout=setTimeout(later, wait);
				if(callNow) func.apply(context,args);
			}

		}
		var winsize={
		width:window.innerWidth,
		height:window.innerHeight
		},//用于记录屏幕的大小
			bubbles={
				canvas:null,
				ctx:null,
				mousex:winsize.width,
				mousey:winsize.height,
				cntr:0,
				circleArr:new Array(),//用于气泡队列
				requestTd:undefined,
				init:function(){
					console.log(winsize.width,winsize.height);
					console.log($('body').height());
					this.canvas=document.getElementById('bubbles');//获取canvas
					this.ctx=this.canvas.getContext('2d');//2d绘画模式
					this.canvas.width=winsize.width;
					this.canvas.height=winsize.height;
					//音乐
					var music=document.getElementById('music');
					music.play();
					//浏览器resize调整canvas画布的大小
					var self=this;
					this.debounceResize=debounce(function(){
						winsize={width:window.innerWidth,height:window.innerHeight};
						self.canvas.height=winsize.height;
						self.canvas.width=winsize.width;
					},10);
					window.addEventListener('resize', this.debounceResize);
				},
				loop:function(){//每一帧调用的方法（循环）
					this.requestId=requestAnimationFrame(bubbles.loop.bind(this));//requestID 是一个长整型非零值,作为一个唯一的标识符.你可以将该值作为参数传给
					//这就要求你的动画函数执行会先于浏览器重绘动作。通常来说，被调用的频率是每秒60次
					this.update();//庚子年气泡的位置
					this.render();//重新绘制
				},
				update:function(){
					if(this.cntr++ % 1 ==0){//多少次循环，执行添加一个圆
						this.createCircle();
					}
					for(var circle in this.circleArr){
						circle=this.circleArr[circle];
						var max = 2,min=-2;
						if(this.mousex<=winsize.width/2-winsize.width*0.1){//当处于左边
							min=-4;
						}else if(this.mousex>=winsize.width/2+winsize.width*0.1){//当处于右边
							max=4;
						}
						circle.x +=Math.floor(Math.random()*(max-min+1))+min;//floor向下取整，泡泡的左右移动，当处于屏幕左右两边上升过程有偏移
						circle.y -=Math.random()*15;
					}
					//当泡泡跑出可视范围则把该泡泡从队列中去除
					while (this.circleArr.length>2&&(this.circleArr[0].x+this.circleArr[0].s>winsize.width||this.circleArr[0].x+this.circleArr[0].s<0||this.circleArr[0].y+this.circleArr[0].s>winsize.height||this.circleArr[0].y+this.circleArr[0].s<0)) {
						this.circleArr.shift();//方法用于把数组的第一个元素从其中删除，并返回第一个元素的值
					}
				},
				render:function(){//遍历队列，调用画圆方法
					//console.log('render');
					this.ctx.clearRect(0,0,this.canvas.width,this.canvas.height);//clear
					//console.log( this.circleArr);
					for(var circle in this.circleArr){
						var current=this.circleArr[circle];
						this.drawCircle(current.x,current.y,current.s);
					}
				},
				createCircle:function(){//间隔时间在队列中添加气泡圆
					var temp=this.circleArr[this.circleArr.length-1];
					this.circleArr[this.circleArr.length] ={
						x:this.mousex,
						y:this.mousey,
						s:Math.random()*winsize.height/60
					};
				},
				drawCircle:function(x,y,radius){//画圆方法
					this.ctx.fillStyle="rgba(255,255,255,0.5)";
					this.ctx.beginPath();
					this.ctx.arc(x,y,radius,0,Math.PI*2,false);
					this.ctx.fill();
					//console.log('drawCircle');
				},
				start:function(){//开始画圆
					if(!this.requestId){
						document.onmousemove=this.getMouseCoordinates.bind(this);
						this.loop();
					}
				},
				stop:function(){//停止画圆
					if(this.requestId){
						window.canclelAnimationFrame(this.requestId);
						this.requestId=undefined;
						document.onmousemove=null;
						this.ctx.clearRect(0,0,this.canvas.width,this.canvas.height);
					}

				},
				getMouseCoordinates:function(ev){//记录鼠标当时所在的位置，mousemove..
					var ev=ev||window.event;
					// console.log(ev);
					this.mousex=ev.pageX;
					this.mousey=ev.pageY - 190;
				}
			};
			bubbles.init();
			bubbles.start();

	})(window);
	</script>
</body>
</html>