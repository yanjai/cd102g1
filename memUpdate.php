<?php
ob_start();
session_start();
if(isset($_SESSION['memNo'])){
	$memNo = $_SESSION['memNo'];
}else{
	header("location:seatunnel.php");
	exit();
	$memNo = 0;
}

// if(isset($_SESSION['memId'])){
// 	$memId = $_SESSION['memId']);
// }else{
// 	$memId = 0;
// }

// $_SESSION['memNo'] = 1;


// if(isset($_SESSION["memNo"])){
// 	unset($_SESSION["memNo"]);
// 	$memToNo = $_SESSION["memNo"];
// }else{
// 	$memToNo = 0;
// }

require_once("connectcd102g1.php");

//$isModified = $_REQUEST['isModified'];
//$memberPsw = $_REQUEST['newPsw'];

/* 
TODOa: remove
*/
// echo $_REQUEST['isModified'];
// echo $_REQUEST['newPsw'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/member.css"> 
	<link rel="stylesheet" type="text/css" href="css/memUpdate.css">
	<link rel="stylesheet" type="text/css" href="css/memMove.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="js/memlogin.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>

	<!-- 判斷密碼是否存在 start -->
	<script>
		$(function(){
			$('#oldMemPsw').keyup(function(){
				function changeC(){
					if($('#oldPsw').text() == '密碼成功'){
					$('#oldPsw').css('color','green');
					}
					else{
						$('#oldPsw').css('color','red');
					}
				}	
			setTimeout(changeC,1000)
			})
			console.log($('#oldPsw').text());
		});
	</script>
	<!-- 判斷密碼是否存在 end -->

	<!-- 判斷確認密碼是否存在 start -->
	<script>
		$(function(){
			$('#confirm').keyup(function(){
				function changeC(){
					if($('#memBox').text() == '密碼相符'){
						$('#memBox').css('color','green');
					}
					else{
						$('#memBox').css('color','red');
					}
				}	
			setTimeout(changeC,1000)
			})
			console.log($('#memBox').text());
		});
	</script>
	<!-- 判斷確密碼是否存在 end -->

	<!-- 海草移動 start-->
	<script>
		var scene = document.getElementById('parallax_box');
		//把滾動視差加入場景
		var parallax = new Parallax(scene);
	</script>
	<!-- 海草移動 end-->


	<style>
		#oldPsw{
			padding-left: 20px;
			/*color: #f00;*/
		}
		/* #memBox{
			color: #f00;
		} */
	</style>
	<title>個人資料</title>

	<style type="text/css">
		#checkPN {
			padding-left: 20px;
		}
	</style>

	<?php
		//檢查是否已登入
		//已登入
		// if( isset($_SESSION["memName"]) === true ){ 
		//   echo '<a href="memUpdate.php" id="link_member"><img src="images/'.$_SESSION["memImg"].'" id="memPic"></a>';
		//   echo '<span id="spanLogin">登出</span>';
		// }else{
		//   echo '<a href="#" id="link_member"><img src="php/member_pic/pic.jpg" id="m_pic"></a>';
		//   echo '<span id="spanLogin">登入</span>';
		// }
	?>  


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
					<span class="topName" id="memName">&nbsp;</span>
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
	<!-- moving-grad -->
	<div class="col-3 ">
		<!-- item1 -->
		<div class="item memLeftSidebar">
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
								<!-- <i class="fas fa-address-book"></i> -->
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
	<div class="col-9">
		<!-- item2 -->
		<div class="item">
			<div class="moving-grad moving2">
				<div class="right20">
					<h3 class="title20">基本資料</h3>
					<form method="post" enctype="multipart/form-data" action="newMemUpInfo.php" class="personal21" id="basicform">
				
						<input type="hidden" name="isModified" value=true>
					
						<div class="row21">
							<label class="label21">姓名</label>
							<input type="text" class="input21 short21 memCommon_inputtext" id="name21" name="newMemName" value="<?php echo $_SESSION['memName']; ?>" required>
						</div>
						<div class="row21">
							<label class="label21">手機
								<span id="checkPN"></span>
							</label>
							<input type="text" maxlength="10" name="newMemTel" class="input21 short21 memCommon_inputtext" id="phoneNumber" value="<?php echo $_SESSION['memTel']; ?>" required>
						</div>
						<div class="row21">
							<label class="label21">電子郵件</label>
							<input type="email" name="newMemEmail" class="input21 long21 memCommon_inputtext" id="email21" value="<?php echo $_SESSION['memEmail']; ?>" required>
						</div>
						<div class="memCenterBtn">
							<button type="submit" class="submit21 checkUpBtn" id="send1">確認修改基本資料</button>
						</div>
						
					</form><!-- personal20 -->
				
					<!-- <div id="showName">< echo $_SESSION['memId']; ?></div>  -->
				
					<h3 class="title20 label21 h3Pic" id="mugshot21">修改大頭照</h3>
					<form method="post" action="newMemUpfile.php" enctype="multipart/form-data" id="file" class="member_img">
		                <input type="hidden" name="memNo" value="140">
		                <div class="row21pic">
							<!-- <label class="label21" id="mugshot21">修改大頭照</label> -->
							<label class="memCenterBtn color">
								<div class="upFilePic">
									<img class="pic" id="showPic" src="images/memberWhite.png">
								</div>
								<!-- src="images/< echo $_SESSION["memImg"]?>" -->
								<input class="inputPic" id="upfile" name="upfile" type="file" name="upfile" required>
								<button type="submit" class="btnPic">變更大頭照</button>
							</label>
						</div>
					</form>
				
					<h3 class="changePsw">變更密碼</h3>
					<form class="changepsw21" action="newMemUpPsw.php" method="post">
						<div class="row21">
							<label class="label21">輸入舊密碼
								<span id="oldPsw"></span>
							</label>
							<input type="password" minlength="6" maxlength="12" name="oldMemPsw" class="input21  short21 memCommon_inputtext" id="oldMemPsw" value="" required>
						</div>
						
						<div class="row21">
							<label class="label21">輸入新密碼</label>
							<input type="password" minlength="6" maxlength="12" name="newMemPsw" class="input21 short21 memCommon_inputtext" id="newMemPsw" placeholder='請輸入6-12碼"英數"字組合' required>
						</div>
					
						<div class="row21">
							<label class="label21">確認新密碼</label>
							<input type="password" minlength="6" maxlength="12" name="confirm" class="input21 short21 memCommon_inputtext" id="confirm" placeholder='請輸入6-12碼"英數"字組合' required>
							<span id="memBox"></span>
						</div>
					
						<!-- <input type="button" class="memCenterBtn submit21" id="send2" value="確認修改密碼"> -->
						<div class="memCenterBtn">
							<button type="submit" class="submit21" id="send2">確認修改密碼</button>
						</div>
						
					</form><!-- changepsw20 -->
					
					<div id="trigger20"></div>
				</div><!-- right20 -->
			</div>
		</div>
	</div>
	<!-- <img class="upGrass" src="images/cuGrass.png"> -->
</div>

<div id="parallax_box" data-hover-only="true">
	<div class="upGrass" data-depth="0.8">
		<img src="images/cuGrass.png">
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
	var memNo = <?php echo $memNo?>;
	if(memNo==0){
		$('.memUp').css('display','none');
	}else{
		$('.memUp').css('display','block');
	}
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



<!-- 變更大頭貼 -->
<script>
window.addEventListener("load",function(){

	document.getElementById('upfile').onchange=function(e){

			var file = e.target.files[0];

			var reader = new FileReader();

			reader.onload=function(){

				document.getElementById('showPic').src=reader.result;
			}

			reader.readAsDataURL(file);

		}

},false)	
</script>


<!-- 修改手機密碼 -->
<script>
function $id(id){
	return document.getElementById(id);
}	

function updatePhone(){
	var xhr = new XMLHttpRequest();

	xhr.onload = function(){
		
		if(xhr.status == 200){
			var reply_phone = xhr.responseText

			if( reply_phone == "請通知服務人員"){
				alert('reply_phone');
			}else{
				document.getElementById("tel21").value = reply_phone;
				alert('更新成功');
			}

		}else{
			alert(xhr.status);
		}
	}
	

	  xhr.open("Post", "newMemUpInfo.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data_info = "change_tel=" + document.getElementById("phoneNumber").value
      				+ "&memNo=" + document.getElementById("memNo").value;      
      xhr.send(data_info);
}


function  checkOldPsw(){
	// alert($(this).val());
	$.ajax({
		url:"checkOldPsw.php",
		dataType: "text",
		type: "POST",
		data:{
			oldMemPsw: $(this).val(),
		},
		success: function(data){
			$('#oldPsw').text(data);
		},
	})
	// var xhr = new XMLHttpRequest();
	// xhr.onload=function(){
	// 	if(xhr.status == 200){
	// 		alert(xhr.responseText);
	// 		// if( xhr.responseText == "密碼錯誤" ){
	// 		// 	alert("舊密碼輸入錯誤");
	// 		// }else{
	// 		// 	console.log(xhr.responseText);
	// 		// }
	// 	}else{
	// 		alert(xhr.status);
	// 	}
	// }

	//  xhr.open("Post", "checkOldPsw.php", true);
 //     xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
 //     var data_info = "oldMemPsw =" + document.getElementById("oldMemPsw").value
 //      				+ "&memNo=" + document.getElementById("memNo").value; 
      			   
 //     xhr.send(data_info);

}

function  checkNewPsw(){

	var new_psw1 = $id('newMemPsw').value;
    var new_psw2 = $id('confirm').value;

    PswPattern = /^(?=^.{6,12}$)((?=.*[0-9])(?=.*[a-z|A-Z]))^.*$/;

    if (!PswPattern.test(new_psw1)){
    	$('#memBox').text("密碼格式有誤！");
    	$('#send2').attr('disabled', true);
		return;
    }else if( new_psw1 == new_psw2 ){ 
    	$('#memBox').text('密碼相符'); 
      	$('#send2').removeAttr('disabled');

    }else{
    	$('#memBox').text('密碼不一致,請更改');
     	$('#send2').attr('disabled', true);
     	return;
    }

}

function update_psw(){

	if($id('oldMemPsw').value != "" & $id('newMemPsw').value != '' & $id('confirm').value != '' ){

		var xhr = new XMLHttpRequest();

		xhr.onload = function(){
			
			if(xhr.status == 200){
				var reply_psw = xhr.responseText

				if( reply_psw == "密碼更新成功"){
					alert(reply_psw);
				}else{
					
					alert('系統發生錯誤,請通知服務人員');
				}

			}else{
				alert(xhr.status);
			}
		}
	

		  xhr.open("Post", "newMemUpPsw.php", true);
	      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	      var data_info = "newMemPsw=" + document.getElementById("newMemPsw").value
	      				+ "&memNo=" + document.getElementById("memNo").value;      
	      xhr.send(data_info);

	}else{

		alert('表單填寫不完整');
	}

	$id('oldMemPsw').value='';	
	$id('newMemPsw').value='';	
	$id('confirm').value='';	

}

function checkPhone(){
	// alert('keyup');
	phone = /^[09]{2}[0-9]{8}$/;
  if(!phone.test($id('phoneNumber').value)){
  	$('#checkPN').text('手機號碼不符合規範');
  	$('#checkPN').css('color','red');
    // alert('手機號碼不符合規範');
    // changeC();
    $id('send1').disabled = true;
  }else{
  	$('#checkPN').text('手機符合規範');
  	$('#checkPN').css('color','green');
  	console.log('手機符合規範');
  	// alert('手機符合規範');
  	$id('send1').disabled = false;
  	// updatePhone
  }

}


function init(){
	//送出修改手機號碼   updatePhone
	$id('send1').onclick = updatePhone;
	// 確認手機號碼是否符合格式
	$id('phoneNumber').onchange = checkPhone;

	//修改密碼

	//確認原先密碼一致
	$id('oldMemPsw').onchange = checkOldPsw;

	//確認新密碼和確認密碼欄位輸入一致
	$('#newMemPsw').keyup(function(){
		checkNewPsw();
	});
	$('#confirm').keyup(function(){
		checkNewPsw();
	});

	// $id('newMemPsw').onchange = checkNewPsw;
	// $id('confirm').onchange = checkNewPsw;
	//送出確認修改密碼
	$id('send2').onclick = update_psw;
}

	
 // window.onload=init; 不要用onload!!!!!多人一起用會出錯!!!!!
	window.addEventListener("load", init, false);
	
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


</body>
</html>