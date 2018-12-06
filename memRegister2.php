<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel='stylesheet' type='text/css' href='css/style.css'> 
	<link rel='stylesheet' type='text/css' href='css/memReg.css'>
	<link rel='stylesheet' type='text/css' href='css/member.css'>
    <link rel='Shortcut Icon' type='image/x-icon' href='images/ico.ico'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css' integrity='sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ' crossorigin='anonymous'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src='libs/jquery/dist/jquery.min.js'></script>
	<script src="js/memlogin.js"></script>
	<title>註冊</title>
</head>


<body class='content'>
<a name='top'></a>
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
				    <li><a href="chBot.php">教練諮詢</a></li>
				    <li><a href="aboutus.php">關於我們</a></li>
				    <li class="lastMenu"><a href="FishingGarbage.php">守護海洋</a></li>
				</ul>
			</div>
		</label>	
	</div>
</nav>
<!--nav end-->
<div class='headBanner'>

</div>

<!--麵包屑 start-->
<!-- <div class='navbarBottom'>
	<p><a href='index.html'>首頁</a>  / <a href='#'>內頁</a></p>
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



	<!-- class='contentArea' -->
<!-- =====================會員註冊B==================== -->

<?php
	$memId = $_POST["memId2"];
	$memPsw = $_POST["memPsw2"];
?>

<div class='register'>
	<div style='visibility: visible;' class='setdown' id='setdown'>

		<div class='prompt'>
			<p>超越巔峰</p>
			<p>覓淨讓您擁有獨一無二的客製化淺水衣，</p>
			<p>和前所未有淺水活動和教練教導！</p>
		</div><!-- prompt -->

		<form id='form' action='memRegister3.php' method='post'>
		<!-- <form id='form'> -->
			<div class='title'>
				<h2>填寫基本資料</h2>
			</div>

			<div class='detail'>
				<input type='hidden' name='memId' value='<?php echo $memId; ?>' >
				<input type='hidden' name='memPsw' value='<?php echo $memPsw; ?>' >
				
				<div class='item'>
					<label class='label'>姓名</label>
					<input type='text' minlength='2' maxlength='10' placeholder='請輸入全名' class='input26 arikicommon_inputtext regName2' id='memNameReg2' name='memNameReg2' required>
				</div>
				<div class='item'>
					<label class='label' style='padding-bottom: 5px;'>性別</label>
					<div class='arikicommon_radio gender26 genderSex'>
                        <label>
                            <input type='radio' id='male' name='memSex' value='0' required>
                            <!-- <div class='circle'></div> -->
                            <span>男</span>
                        </label>
                    </div>
                    <div class='arikicommon_radio gender26'>
                        <label>
                            <input type='radio' id='female' name='memSex' value='1' required>
                            <!-- <div class='circle'></div> -->
                            <span>女</span>
                        </label>
                    </div>
				</div>
				<div class='item'>
					<label class='label'>生日</label>
					<input type='date' placeholder='' class='input26 arikicommon_inputtext' id='memBir' name='memBir' required>
				</div>
				<div class='item'>
					<label class='label'>手機</label>
					<input type='text' maxlength='10' placeholder='0930123456' class='input26 arikicommon_inputtext' id='memTel' name='memTel' required>
					<span id="checkPN"></span>
				</div>

				<!-- 判斷手機是否存在 start -->
			<!-- 	<script>
					$(function(){
						$('#memTel').keyup(function(){
							function changeC(){
								if($('#checkPN').text() == '手機號碼不符合規範'){
									$('#checkPN').css('color','red');
								}
								else{
									$('#checkPN').css('color','green');
								}
							}	
						setTimeout(changeC,1000)
						})
						console.log($('#checkPN').text());
					});
				</script> -->
				<!-- 判斷手機是否存在 end -->



				<div class='item'>
					<label class='label'>電子郵件</label>
                    <input type='email' minlength='6' placeholder='seatunnel@seatunnel.com' class='input26 arikicommon_inputtext' id='memEmail' name='memEmail' required>
				</div>
				<div class='item itembut' >
					<button class='arikicommonBtn' id='submit26'>註冊</button>
				</div>
			</div><!-- detail -->

		</form><!-- form -->

	</div><!-- setdown -->
</div><!-- register -->









<!--內容 end-->


<!--footer start-->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>	
<!--footer end-->	


<div class='gotoTop'>
	<a href='#top'>
	<span>Top</span>
    <img src='images/gotop.png'>
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
	document.querySelector('.gotoTop').style.display = 'none';	
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

				$id('navbar').style.top = '0px';
				$id('navbar').style.opacity = '1';
			}
			else {
				$id('navbar').style.top = '-200px';
				$id('navbar').style.opacity = '.2'; }
		});
	}
</script>

<!--首頁選單JS 測試 end-->

<!--登入 start-->
<script>
	function $id(id){
		return document.getElementById(id);
	}	

	function cancelLogin(){
		//將登入表單上的資料清空，並將燈箱隱藏起來
		$id('memJump').style.display = 'none';
		$id('memId').value = '';
		$id('memPsw').value = '';
	}

	function checkPhone(){
		// alert('keyup');
		phone = /^[09]{2}[0-9]{8}$/;
	  if(!phone.test($id('memTel').value)){
	  	$('#checkPN').text('手機號碼不符合規範');
	  	$('#checkPN').css('color','red');
	    // alert('手機號碼不符合規範');
	    // changeC();
	    $id('submit26').disabled = true;
	  }else{
	  	$('#checkPN').text('手機符合規範');
	  	$('#checkPN').css('color','green');
	  	console.log('手機符合規範');
	  	// alert('手機符合規範');
	  	$id('submit26').disabled = false;
	  	// updatePhone
	  }

	}

	function init2(){

		// 確認手機號碼是否符合格式
		$id('memTel').onchange = checkPhone;

		//===設定spanLogin.onclick 事件處理程序是 showLoginForm

		// $id('spanLogin').onclick = showLoginForm;

		//===設定btnLogin.onclick 事件處理程序是 sendForm
		// $id('btnLogin').onclick = sendForm;

		//===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
		$id('btnLoginCancel').onclick = cancelLogin;

		$id('rule26').onclick = ShowRule;
	    $id('submit22').onclick = HaveRead;
	
	    ResetNumber();
	    $id('reset26').onclick = RemoveNumber;
	
	    $id('submit26').onclick = verifyA;

		//檢查是否已登入
		var xhr = new XMLHttpRequest();
		xhr.onload = function(){
		if(xhr.status == 200){
			if( xhr.responseText !=''){ //己登入
			document.getElementById('memName').innerHTML = xhr.responseText;
			document.getElementById('spanLogin').innerHTML = '登出';  
			}
			
		}else{
			alert( xhr.status);
		}
		}
		xhr.open('get', 'getMemLoginInfo.php', true);
		xhr.send(null);
	}; //window.onload

	window.addEventListener('load',init2,false);
	
</script>
<!--登入 end-->
	
	
<!--跳窗 start-->
<script>
	// Get the memberArea
	var modal = document.getElementById('memJump');

	// When the user clicks anywhere outside of the modalJump, close it
	window.onclick = function(event) {
		if (event.target == modal) {
		modal.style.display = 'none';
		}
	}
</script>
<!--跳窗 end-->

<script type='text/javascript'>

	function $id(id){return document.getElementById(id);}
	
	//==========================會員註冊A==========================
	//-------------------------檢查帳號--------------------------
	function Uniqueness(ID){
		console.log('1');
			$.post('Uniqueness.html',{ 
			'accountcheck' : ID ,
			 },function(R){
				if( R == 1){
					alert('此帳號已被使用<br>');
					return;
				 }
			}
		);
	}
	//--------------------------驗證碼--------------------------
	var CheckText;
	
	function ResetNumber(){
		var verifyImgs = new Array('6ne3','D7YS','e5hb','H2DE','HRA1','k4ez','mqKi','w62K','XDHY','M8k2');
		var i = Math.floor(Math.random()*10);
	
		var verifyImg = document.createElement('img');
		verifyImg.src = 'images/7member/VarifyImages/' + verifyImgs[i] + '.jpg';
		verifyImg.alt = '驗證碼';
		$id('number').appendChild(verifyImg);
		CheckText = verifyImgs[i];
	}
	function RemoveNumber(){
		$id('number').removeChild($id('number').childNodes[0]);
		ResetNumber();
	}
	
	//--------------------------下一步--------------------------
	function verifyB(){
	
		memId = $id('memId').value;

		// console.log(memId);

		memPsw = $id('memPsw').value;

		memSex = document.getElementsByName('memSex');

		// memPswCheck = $id('memPswCheck').value;
		// verify = $id('verify').value;
	
		// IDPattern = /^.[A-Za-z0-9]+$/;
		// PswPattern = /^(?=^.{6,12}$)((?=.*[0-9])(?=.*[a-z|A-Z]))^.*$/;
		// verifyPattern = /^\w{4,5}$/;
	
		// if (!IDPattern.test(memId)){
		// 	alert('帳號格式有誤！<br>');
		// 	return;
		// }else if (!PswPattern.test(memPsw)){
		// 	alert('密碼格式有誤！<br>');
		// 	return;
		// }else if (memPsw !== memPswCheck){
		// 	alert('兩次輸入密碼不相符！<br>');
		// 	return;
		// } 

		// if ($('input[type="radio"]').is(':checked')==""){
  //      		alert("請選擇性別");
  //      	}

       	if(!memSex.sex[0].checked && !memSex.sex[1].checked){
            alert("未選擇性別");
        }

		// else if (verify !== CheckText){
		// 	alert('請輸入正確驗證碼！<br>');
		// 	return;
		// }
		else{
			$('#form').submit();
			 // $.post('member_register2.php',{ 
			 //    'memId' : memId ,
			 //    'memPsw':memPsw
			 //     },function(rs){
			 //        console.log(rs);
			 //        // window.location='傳值後再送值又消失，只能用submit。member_register2.php';
			 //     }); 
			 /*注意格式，最後一個不用，function後是必需的格式*/
			 /*window.location必須放在function內才管用，不知為何?!*/
		}
	}
	//=========================會員條款=========================
	function ShowRule(){
		$id('memberRule').style.display = '';
		$id('setdown').style.display = 'none';
	}
	function HaveRead(){
		$id('memberRule').style.display = 'none';
		$id('setdown').style.display = '';
		$id('Read26').checked = true;
	}
	
	
	// function init(){
	  
	// }; 
	
	// window.addEventListener('load',init,false);

		
	
</script>


</body>
</html>