<?php 
    ob_start();
	session_start();
	// if(isset($_SESSION['coachDate'])){echo $_SESSION['coachDate'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css"> 
	<link rel="stylesheet" type="text/css" href="css/chBot.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link href="css/CSS animation.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/memlogin.js"></script>
	<script src='js/notLoggin.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<title>教練諮詢</title>
	<style>
		*{
			/* outline: 1px solid #f00; */
		}
		#chCon2{
			font-family: 'Microsoft JhengHei';
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			var navHeight = $('#navbar').height();
				   $('body').css('margin-top',navHeight);
				   $('#chLightBox').css('top',navHeight);
				   $('#chLightBox').css('min-height','100vh-navHeight');
	               $(window).resize(function(){
	                   navHeight = $('#navbar').height();
					   $('body').css('margin-top',navHeight);
					   $('#chLightBox').css('top',navHeight);
				   	   $('#chLightBox').css('min-height','100vh-navHeight');
					//    console.log($('body').width());
	               })
			quail = 0;
			$('#chOpBox').click(function(){
				if($('#chNumber').html()==''){
					console.log($('#chNumber').html());
				}else{
					quail = 0;
					console.log($('#chNumber').html());
					$('#chNumber').html('');
				}
				$('#chMesRd').toggleClass('active');
				$('#chMesRd').scrollTop(0);
			});
			$('#chMesRd').click(function(){
				if($('#chNumber').html()==''){
					console.log($('#chNumber').html());
				}else{
					quail = 0;
					console.log($('#chNumber').html());
					$('#chNumber').html('');
				}
			})
			$('#chCon').keyup(function(e){
				var convalue = this.value;
				if(this.value==""){
				}
				else{
					if (event.keyCode == 13) {
						for(i=0;i<7;i++){
							diver = document.getElementsByClassName('chDialog')[i];
							diverpapa = $('.chDialog').eq(i).parent();
								if(diver.hasChildNodes()){
									for(i=0;i<7;i++){
									diver.removeChild(diver.firstChild);
									break;
								}
								if(diverpapa.hasClass("active")){
									diverpapa.removeClass('active');
									diverpapa.addClass('act');
									break;
								}
							}
						}
						i =Math.floor(Math.random(0,1)*7);
						console.log(i);
						diver = document.getElementsByClassName('chDialog')[i];
						var diverpapa = $('.chDialog').eq(i).parent();
						diverpapa.removeClass('act');
						diverpapa.addClass('active');
					$.ajax({
						url: 'bot.php',				
						data: {content:convalue},				
						type: 'POST',				
						dataType: 'text',			
						success: function(data){
							$('#fish').fadeOut(200);
							var dialog = document.createElement('div');
							diver.appendChild(dialog);
							dialog.id='chDialogBox';
							$("#chDialogBox").animate({width: "100%",height: "150px"},500,'easeOutBounce');
							console.log(data);
							dialog.innerText=data;
							index= 0;
							var time = 100;
							function type(){
								document.getElementById('chDialogBox').innerText = data.substring(0,index++);
								if(data.length<index){
									// console.log(index);
									stop();
								}
							}
							var setime = setInterval(type,time);
							function stop(){
								clearInterval(setime);
								time= 200;
							}
							var mesbox = document.createElement('div');
							var mestext = document.createElement('span');
							mesbox.id='chCtrl';
							mestext.id='chtext';
							var mesrd = document.getElementById('chMesRd');
							mesrd.appendChild(mesbox);
							mesbox.appendChild(mestext);
							mestext.innerText=convalue;

							var mesbox = document.createElement('div');
							var mestext = document.createElement('span');
							mesbox.id='chCtrl';
							mestext.id='chtext';
							var mesrd = document.getElementById('chMesRd');
							mesrd.appendChild(mesbox);
							mesbox.appendChild(mestext);
							mestext.innerText=data;
							
							mesrd.scrollTop = mesrd.scrollHeight;
							quail+=1;
							console.log(quail);
							$('#chNumber').html(quail);
						}
					});
					this.value="";
					}
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#chCon2').keyup(function(e){
				var convalue = this.value;
				if(this.value==""){
				}
				else{
					if (event.keyCode == 13) {
						for(i=0;i<7;i++){
							diver = document.getElementsByClassName('chDialog')[i];
								if(diver.hasChildNodes()){
									for(i=0;i<7;i++){
									diver.removeChild(diver.firstChild);
									break;
								}
							}
						}
						i =Math.floor(Math.random(0,1)*7);
						console.log(i);
						diver = document.getElementsByClassName('chDialog')[i];
						diver.parentElement.getAttribute('top');
						
					$.ajax({
						url: 'bot.php',				
						data: {content:convalue},				
						type: 'POST',				
						dataType: 'text',			
						success: function(data){
							$('#fish').fadeOut(200);
							var mesrd = document.getElementById('chMesRd2');
							var mesbox = document.createElement('div');
							var mestext = document.createElement('span');
							mesbox.id='chCtrl';
							mestext.id='chtext';
							mesrd.appendChild(mesbox);
							mesbox.appendChild(mestext);
							mestext.innerText=convalue;
							var chRwdBox = document.getElementById('chMessage');


							var mesbox = document.createElement('div');
							var mestext = document.createElement('span');
							mesbox.id='chCtrl';
							mestext.id='chtext';
							// var mesrd = document.getElementById('chMesRd2');
							mesrd.appendChild(mesbox);
							mesbox.appendChild(mestext);
							mestext.innerText=data;
							// index= 0;
							// var time = 200;
							// function type(){
							// 	document.getElementById('chtext').innerText = data.substring(0,index++);
							// 	if(data.length<index){
							// 		// console.log(index);
							// 		stop();
							// 	}
							// }
							// var setime = setInterval(type,time);
							// function stop(){
							// 	clearInterval(setime);
							// 	time= 150;
							// }
							// var mesbox = document.createElement('div');
							// var mestext = document.createElement('span');
							// mesbox.id='chCtrl';
							// mestext.id='chtext';
							// mesrd.appendChild(mesbox);
							// mesbox.appendChild(mestext);
							// mestext.innerText=convalue;
							
							var chRwdBox = document.getElementById('chMesRd2');
							var chRwdBox2 = document.getElementById('chMessage');
							console.log('活動距離'+chRwdBox.scrollTop);
							console.log('卷軸長度'+chRwdBox.scrollHeight);
							chRwdBox2.scrollTop = chRwdBox.scrollHeight;
						}
					});
					this.value="";
					}
				}
			});
		});
	</script>
</head>


<body class="content">
<div class="chDiver chDiver1 act">
	<div class="chDiverImg"><img src="images/diver01.png"></div>
	<div class="chDialog"></div>
</div>
<div class="chDiver chDiver2 act">
	<div class="chDiverImg"><img src="images/diver02.png"></div>
	<div class="chDialog"></div>
</div>
<div class="chDiver chDiver3 act">
	<div class="chDiverImg"><img src="images/diver10.png"></div>
	<div class="chDialog"></div>
</div>
<div class="chDiver chDiver4 act">
	<div class="chDialog"></div>
	<div class="chDiverImg"><img src="images/diver11.png"></div>
</div>
<div class="chDiver chDiver5 act">
	<div class="chDiverImg"><img src="images/diver05.png"></div>
	<div class="chDialog"></div>
</div>
<div class="chDiver chDiver6 act">
	<div class="chDialog"></div>
	<div class="chDiverImg"><img src="images/diver12.png"></div>
</div>
<div class="chDiver chDiver7 act">
	<div class="chDiverImg"><img src="images/diver07.png"></div>
	<div class="chDialog"></div>
</div>
<div id="fish">
	<img src="images/dag.png" id='dag'>
	<p>這裡您可以盡情問教練問題唷!</p>
	<img src="images/culogo2.png" id="cutefish">
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
					<li><a href="divinggear.php">潛水裝備</a></li>
				    <li><a href="wholeActivity.php">活動總覽</a></li>
				    <li><a href="coach.php">教練團隊</a></li>
				    <li class="thispage"><a href="chBot.php">教練諮詢</a></li>
				    <li><a href="aboutus.php">關於我們</a></li>
				    <li class="lastMenu"><a href="FishingGarbage.php">守護海洋</a></li>
				</ul>
			</div>
		</label>	
	</div>
</nav>
<!--nav end-->
<!-- 判斷燈箱 -->
<div id="NotLogged">
	<div id="NotBtnBox">
		<p>您還沒登入</p>
		<button id="reBtn">返回</button>
		<button id="GoToBtn">登入</button>
	</div>
</div>	
<!-- 判斷燈箱結束 -->
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
<!-- 燈箱：結束 -->
<!--內容 start-->
<div class="contentArea">
	<div class="chBotBox">
		<div id="chInput">
			<input type="text" id='chCon' maxlength="80" placeholder='輸入您想問的問題。'>
		</div>
		<div id="chMessage">
			<div id="chOpBox"><span id="optitle">諮詢紀錄</span><span id='chNumber'></span></div>
			<div id="chMesRd">
			</div>	
		</div>
	</div>
</div>
<div id="chRwdBox">
	<div id="rwdtitle"><h3>教練諮詢</h3></div>
	<div id="chMessage">
		<div id="chMesRd2">
			<!-- <div id="chCtrl">
				<div id="chtext">左邊</div>
			</div>
			<div id="chCtrl">
				<div id="chtext">右邊</div>
			</div> -->
		</div>	
	</div>
	<div id="chInput">
		<input type="text" id='chCon2' maxlength="80" placeholder='輸入您想問的問題。'>
	</div>
</div>
<!--內容 end-->


<!--footer start-->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>	
<!--footer end-->	
		

<script type='text/javascript'>
	function $id(id){
	return document.getElementById(id);
	}
	$('body').on('mousewheel', function(e){
		if(e.originalEvent.wheelDelta > 0) {

			$id("navbar").style.top = '0px';
			$id("navbar").style.opacity = '1';
		}
		else {
			$id("navbar").style.top = '-200px';
			$id("navbar").style.opacity = '.2'; }
	});
</script>

</body>
</html>