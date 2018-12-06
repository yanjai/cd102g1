<?php 
ob_start();
session_start();
if(isset($_SESSION["memNo"])){

	$memToNo = $_SESSION["memNo"];

	}
	else{
		$memToNo = 0;
	}
if(isset($_SESSION['chOption'])){
		$chDate = (string)$_SESSION['coachDate'];
	    // $chImg = $_SESSION['chImg'];
	    // $chName = $_SESSION['chName'];
	    // echo $chDate;
	}
	else{
		$chDate='1';
	}
if(isset($_SESSION['chImg'])){
	$chImg = $_SESSION['chImg'];
	// echo $chImg;
}
else{
	$chImg="";
}
if(isset($_SESSION['chName'])){
	$chName = $_SESSION['chName'];
	// echo $chName;
}
else{
	$chName="";
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="css/member.css">
	<link rel="stylesheet" href="css/calendar2.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/comment.css">
	<link rel="stylesheet" href="css/chLightBox.css">
	<link rel="stylesheet" type="text/css" href="css/flickity.css">
	<link rel="stylesheet" href="css/oneActivity.css">
	<script src="js/memlogin_custo.js"></script>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/notLoggin.js"></script>

	<title>活動詳情</title>
	<style>
		#chCalendar #chCalBody .chDayList #chDays .chOrange{
				color: rgb(206,153,53);
				cursor: default;
		  }
		  #chCalendar #chCalBody .chDayList #chDays .chRed{
			color: rgb(255, 98, 101);
		  }
	
	</style>

</head>


<body class="content">
<div id="chBlack">
	<div id="chLightBox">
		<div id="chLbClose"></div>
		<div class="chLbtitle"><h3>活動評論</h3></div>
		<div id='ajaxcoach'>

		</div>
		<div class="chLbBtn">
			<button id='chMoreBtn'>More</button>
		</div>
		<div class="chScMeBox">
			<!-- <div class="chLbNowRtTitle"><h4>評分:</h4></div> -->
			<div id="water-progress-wrapper">
				<div id="wrapper">
					<div class="wave-progress far"></div>
					<div class="wave-progress mid"></div>
					<div class="wave-progress near"></div>
				</div>
				<div id="chLbScBox">評分</div>
			</div>
			<div id="chLbMessageBox">
				<div id="enterBox"><img src="images/enter.png"></div>
				<input type="hidden" id='hdsc'>
				<textarea type="text" maxlength="100" id='con' placeholder='我要評論' maxlength="80"></textarea>
			</div>
		</div>
	</div>
</div>
<?php
try {
	require_once("connectcd102g1.php");
	$pageNo = $_REQUEST["pageNo"];
	$pageNo1 = $pageNo - 1;

	if(isset($_REQUEST['NewPage'])){
		
		$NewPage =$_REQUEST['NewPage'];

		$sql = "select * from activitycategory where actName = '{$NewPage}'";
	}
	else{
		$sql = "select * from activitycategory where actNo = $pageNo";
	}
	
	$sql3 = "select * from activitycategory";
	$Activitys3 = $pdo->query($sql3);   
	$X = $Activitys3->rowCount();
	$sql2="select * from activitycategory order by actNo limit 0,$pageNo1";//該物件前面
	$Activitys = $pdo->query($sql);   
	$sql3="select * from activitycategory order by actNo limit $pageNo1,$X"; //該物件後面全部
	$Activitys2=$pdo->query($sql2);
	$ActRows2=$Activitys2->fetchAll(PDO::FETCH_ASSOC);
	$Activitys3=$pdo->query($sql3);
	$ActRows3=$Activitys3->fetchAll(PDO::FETCH_ASSOC);
	// print_r($Activitys3);
	// print_r($ActRows2);
	$sql4="select * from activitycategory acg join activitycomment acm on acg.actNo = acm.actNo where acg.actNo = $pageNo";

	$actBars=$pdo->query($sql4);
	$count = $actBars->rowCount();
	$actBarRows=$actBars->fetchAll(PDO::FETCH_ASSOC);
	if($count==0){

	}else{
		$totalScore = 0;
			foreach($actBarRows as $j=>$actBarRow){
		$totalScore += $actBarRow['score'];

		}

		$sumScore = $totalScore/$count;
	}
	
	
	$ActRowPU = array_merge($ActRows3,$ActRows2);
	$ActRowPUlen = count($ActRowPU);
	$sql5 = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actNo =$pageNo";
	$actCoachActive = $pdo->query($sql5);
	$actCoachRows = $actCoachActive->fetchAll(PDO::FETCH_ASSOC);
	$sql6 = "select * from coach c join coachact cc on c.coachNo = cc.coachNo left outer join activitycategory acg on cc.actNo = acg.actNo where acg.actNo = $pageNo order by c.coachNo  limit 1";
	$actLimitCoach = $pdo->query($sql6);
	$actLmCoachs= $actLimitCoach->fetchAll(PDO::FETCH_ASSOC);
	foreach($actLmCoachs as $m=>$actLmCoach){
		$actFirstLmCoach = $actLmCoach['coachName'];

		$actFirstLmCoachNo = $actLmCoach['coachNo'];

	}
	if(isset($_SESSION['chOption'])){
		$actFirstLmCoachNo = $_SESSION['chOption'];
	}




	$sql7 = "select * from coach c join coachcomment acm on c.coachNo = acm.coachNo where c.coachName = '{$actFirstLmCoach}'";

	$sql8 = "select * from activitycategory";
	$actORI = $pdo->query($sql8);
	$actORIs = $actORI->fetchAll(PDO::FETCH_ASSOC);
	foreach($actORIs as $s=>$actORIRow){

	}
	$actCoachScoreActive = $pdo->query($sql7);
	$actCoachScoreCount = $actCoachScoreActive->rowCount();
	
	$actCoachScoreRows = $actCoachScoreActive->fetchAll(PDO::FETCH_ASSOC);
	$actCoachTotalScore = 0;
	foreach($actCoachScoreRows as $n=>$actCoachScoreRow){
		$actCoachTotalScore += $actCoachScoreRow['score'];
	}
	

	$actCoachSumScore = $actCoachTotalScore/$actCoachScoreCount;
	// echo $actCoachSumScore;
	


	foreach($actCoachRows as $k=>$actCoachRow){

		// echo $actCoachRow['coachName'];
	}


	$ActRows = $Activitys->fetchAll(PDO::FETCH_ASSOC);
	foreach($ActRows as $i=>$ActRow){
?>

<?php
	$ActImgs= explode("| ", $ActRow["actItemImg"]);
	// echo $ActImgs[0];

		
;?>



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


<!--麵包屑 start-->
<div class="headBanner">
</div>
<!--麵包屑 end-->


<!--內容 start-->

<div class="contentArea">
	<div class="actOnlyBox">
		<div class="actLeftImg js-tilt" data-tilt>
			<img src="images/<?php echo $ActImgs[1] ?>" alt="">
		</div>
		
		<div class="actRightContent">
			<h4 class="actFontWeight"><?php echo $ActRow['actName']; ?></h4>
			<p><span class="actFontStyleCh">潛水類型:</span> <?php echo $ActRow['actType']; ?></p>
			<!-- <p>適合對象:大</p> -->
			<p><span class="actFontStyleCh">活動地點: </span><?php echo $ActRow['actLoc']; ?></p>
			<p><span class="actFontStyleCh">活動費用: </span><?php echo $ActRow['actPrice']; ?></p>
			<p><span class="actFontStyleCh">活動介紹: </span></p>
			<p><?php echo $ActRow['actContent']; ?></p>
			<p><span class="actFontStyleCh">推薦裝備:</span></p>
			<ul class="actContentIcon ">
				<li class="aIcon swing animated"><img src="images/iconGlass.png"></li>
				<li class="aIcon aIPipe swing animated"><img src="images/iconPipe.png"></li>
				<li class="aIcon swing animated"><img src="images/iconSuit.png"></li>
				<li class="aIcon swing animated"><img src="images/iconFrog.png"></li>
				<li class="aIcon aIBottle swing animated"><img src="images/iconBottle.png"></li>
			</ul>
			<button class="actSignBtn">立刻報名</button>
		</div>
	</div>   
	<div class="actCoachImgBox">
		<?php 

		foreach($actCoachRows as $k=>$actCoachRow){
		?>
		
		<div class="actCoachImg">
			<a href="coach.php#catch<?php echo $actCoachRow['coachNo']?>">  
				<img src="images/s-<?php  echo $actCoachRow['coachImg'];?>" alt="">
				<div class="actMaskCoach"><p><?php  echo $actCoachRow['coachName'];?></p></div>
			</a>
		</div>


		<?php 
		} ?>
		
		
	</div>

</div>

<!-- 活動評論 -->
<div class="clearfix"></div>
<div class="checkArea">
	<button class="chBtnComment">我要評論</button>
</div>
	<div class="commentArea">
		
		

	</div>
	<!-- <div class="moreArea"></div> -->
	<button class="chMoreBtnFont">More</button>
<script>
	$(document).ready(function(){
		$('.chMoreBtnFont').click(function(){
			$('.chMoreBtnFont').css('display', 'none');
			$('.chLbAllcommentBox').css('height', 'auto');
		})
	})
</script>
<!-- lightBox -->
<script type="text/javascript">
	$('.chBtnComment').click(function(){
			if (memNo == 0) {
				$('.chScMeBox').css('display', 'none');
			}else{
				$('.chScMeBox').css('display', 'flex');
			}
			$('#chBlack').stop().animate({
				height:100+'vh',
				width:100+'%'
			},600);
			$('#water-progress-wrapper').delay(600).queue(function(){
				var all = $('#water-progress-wrapper').width();
				// console.log('寬'+all);
				$('#water-progress-wrapper').css('height',all+'px');
				$('#wrapper').css('height',all+'px');
				if($('body').width()>768){
					$('#con').css('height',all+'px');
				}else{
					$('#con').css('height','300px');
				}
			});
			$('#chLbselectCh ul .chSelectLi').addClass('active');
			var liHeight = $('.chLbcommentBox ul li').index();
			console.log('高度'+liHeight);
			$('.chLbcommentBox').css('height','300px');
			
			$('#chMoreBtn').css('display','block');
			
		});
		

</script>

<div class="actLightBoxBackGd">
	<!-- 活動重切 -->
	<div class="actLightBox actLightBox1">
		<div class="actBLMask"></div>
		<div class="actSelectMesseage">
			
			<span class="actSMBig bounce animated"><?php echo $ActRow['actName']; ?></span>
			<p class="actIntr bounce animated"><?php echo $ActRow['actContent']; ?></p>
			<p class="bounce animated"><span class="actFontWeight">費用:</span><?php echo $ActRow['actPrice']; ?></p>
			<p class="bounce animated"><span class="actFontWeight">評分:</span></p>
			<div class="chLbPerRating">
				<div class="chLbPerRatingBar"></div>
			</div>
			<div class="chtotalScore">
				<?php 
				if($count==0){

				}else{
					echo round($sumScore).'%';
				}

					
						
				?>
			
			</div>

			<select class="actRWDselect" name="" id="">
				<?php for($s=0;$s<$ActRowPUlen;$s++){
					?>
					<option value="<?php echo $ActRowPU[$s]['actName']; ?>"><?php echo $ActRowPU[$s]['actName']; ?></option>
					<?php
				} ?>
				
				
			</select>
			<div class="actNextStep"><p>下一步</p></div>
			<?php 
			$actTypeSelect = explode("| ", $ActRow["actType"]);
			
			 ?>
			<input type="hidden" name="" value="<?php echo $actTypeSelect[0]; ?>">
			<script>
				$(document).ready(function(){
					var actSType =$('.actSelectMesseage').find('input').val();
					// console.log($('.actSelectMesseage').find('input').val());
					if(actSType == '浮潛類'){

						$('.actIconBottle').css('display','none');
						$('.actTxtBottle').css('display','none');
						$('.aIBottle').css('display','none');
						$('.actLineBox3').removeClass('actGearAct');
						$('.actBottle').removeClass('actGeatActive');

					}else if(actSType == '深潛類'){
						$('.actIconPipe').css('display','none');
						$('.actTxtPipe').css('display','none');
						$('.aIPipe').css('display','none');
						$('.actLineBox1').removeClass('actGearAct');
						$('.actGearPipe').removeClass('actGeatActive');
					}
				})
			</script>
		</div>
		

		<!-- <button id='rightBtn'>其他活動</button> -->
		<?php 

		$X = 0 ;
		$Y = 0 ;
for($i=0; $i < $ActRowPUlen/4 ; $i++){ 
    echo'<ul class="actActivityRight">';
    
    for($j=0+$X; $j<4+$Y ; $j++){

        $ActStr1 = mb_substr($ActRowPU[$j]['actName'],0,1,"utf-8");
        $ActStr2 = mb_substr($ActRowPU[$j]['actName'],1,1,"utf-8");
        $ActStr3 = mb_substr($ActRowPU[$j]['actName'],2,1,"utf-8");
        $ActStr4 = mb_substr($ActRowPU[$j]['actName'],3,1,"utf-8");
        $ActStrAll = $ActRowPU[$j]['actName'];
        // echo $ActRowPU[5]['actName'];
        $ActImgAll  =explode("| ", $ActRowPU[$j]['actItemImg']);
        // echo $ActImgAll[1];
        // echo $ActRowPU[$j]['actItemImg'];
        ?>

        <li class="actRLi">
        	<input type="hidden"  value='<?php echo $ActStrAll ?>'>
        	<input type="hidden"  value='<?php echo $ActRowPU[$j]['actNo']; ?>'>
            <div class="actRightCP"></div>
            <div class="actRightTxt">
            <p class="actFontAni1 "><?php echo $ActStr1; ?></p>
            <p class="actFontAni2 "><?php echo $ActStr2; ?></p>
            <p class="actFontAni3 "><?php echo $ActStr3; ?></p>
            <p class="actFontAni4 "><?php echo $ActStr4; ?></p>
            </div>
            <div class="actRightImg" style="background-image: url('images/<?php echo $ActImgAll[1]; ?> ')">
                        
            </div>
        </li>
 
        <?php 
    }
    echo"<button class='rightBtn'>其他活動</button>";
    echo'</ul>';
    if($ActRowPUlen -$X -4 < 4){
    	$Y += $ActRowPUlen % 4;
    	$X += 4;
    }else{
    	$X += 4;
    	$Y +=4;
    }

    

}


?>
<script>
  var memNo = <?php echo $memToNo; ?>;	
  if (memNo == 0) {
	$('.chScMeBox').css('display', 'none');
}else{
	$('.chScMeBox').css('display', 'flex');
}
	$(document).ready(function(){
		$('.actRightImg').eq(0).addClass('actRImgActive');
		$('.actFontAni1').eq(0).addClass('actFontActive1');
		$('.actFontAni2').eq(0).addClass('actFontActive2');
		$('.actFontAni3').eq(0).addClass('actFontActive3');
		$('.actFontAni4').eq(0).addClass('actFontActive4');
		$('.actRightCP').eq(0).addClass('actCPActive');
		
	})
</script>
<script>

	$(document).ready(function(){
		
		$('.actRLi').click(function(){
			actNumCd = $(this).children('input').eq(1).val();
			slact = actNumCd;
			// console.log(actNumCd);
			var NewPage  = $(this).children('input').val();
			// console.log($(this).children('input').val());
				$.ajax({
					url: 'oneActivity2.php',	
					data: {NewPage:NewPage},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actSelectMesseage').html(data);


		var x = 0 ;
		
		$('.actNextStep').click(function(){
			x += 1 ;
			
			if(x==0){
				$('.actSelectMesseage').delay(0).animate({'transform':'translateX(0%)'},2,function(){
				$('.actSelectMesseage').css('transform','translateX(0%)');
			});

			$('.actActivityRight li').delay(1000).animate({'left':'7%'},1,function(){
				$('.actActivityRight li').css('left','7%');
			});
			$('.actCircleImg').css('display','block');
			}else if(x==1){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actSelectCH').animate({'transform':'translateX(0%)'},1,function(){
				$('.actSelectCH').css('transform','translateX(0%)');
			});

			$('.actCoachCd').animate({'transform':'translateX(0%)'},function(){
				$('.actCoachCd').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			}else if(x==2){
				if($('.actSelectDay').text()==''){
					alert('日期還未填選喔');
					x-=1;


				}else{
					$('.actLightBox').css('display','none');
					$('.actLightBox').eq(x).css('display','block');
					$('.actLightBox').eq(5).css('display','block');
					$('.actSelectGear').animate({'transform':'translateX(0%)'},2,function(){
					$('.actSelectGear').css('transform','translateX(0%)');
					$('.actCircleImg').css('display','none');
					$('.actStep').html('<span class="actStepFont">步驟3</span>:選擇裝備');
				});
				}
				
			}else if(x==3){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actDetailBox').animate({'transform':'translateX(0%)'},2,function(){
				$('.actDetailBox').css('transform','translateX(0%)');
			});
			$('.actDetialSmallBox').animate({'transform':'translateX(0%)'},function(){
				$('.actDetialSmallBox').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			}else if(x==4){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actActivityRight li').animate({'left':'0%'},2,function(){
				$('.actAllRight').css('left','0%');
			});

			$('.actCircleImg').css('display','none');
			}else if($('.actSelectDay').text()==''){

			}


			$('.activeMove').css('left', x*42.55 + 'px');
			$('.actStepBox li').removeClass('actStepActive');
			setTimeout(aa,500);
			function aa(){
				$('.actStepBox li').eq(x).addClass('actStepActive');
			}
			
			
			for(r=0;r<5;r++){
				if(x==r){
				$('.actStepBox li').eq(r).css('pointer-events','auto');

			}
			}
			if(x==4){
			$('.actNextStep').css('display','none');
			}else{
				$('.actNextStep').css('display','block');
			}

				
			})
		$('.actStepBox li').click(function(){
			z= $(this).index();
			x=z;
			$('.actStepBox li').removeClass('actStepActive');
			// $('.actStepBox li').eq(z).addClass('active');
			setTimeout(bb,500);
			function bb (){
				$('.actStepBox li').eq(z).addClass('actStepActive');
			}
			$('.activeMove').css('left', x*42.55 + 'px');
			if(x==4){
			$('.actNextStep').css('display','none');
		}else{
			$('.actNextStep').css('display','block');
		}
		})



						 var actSType =$('.actSelectMesseage').find('input').val();
							// console.log($('.actSelectMesseage').find('input').val());
							if(actSType == '浮潛類'){
								$('span.actTctPipe').css('display','inline-block');
								$('.actIconBottle').css('display','none');
								$('span.actTxtBottle').css('display','none');
								$('.actLineBox3').removeClass('actGearAct');
								$('.actBottle').removeClass('actGeatActive');
								// alert('執行了');

							}else if(actSType == '深潛類'){
								$('span.actTxtBottle').css('display','inline-block');
								$('.actIconPipe').css('display','none');
								$('span.actTctPipe').css('display','none');
								$('.actLineBox1').removeClass('actGearAct');
								
								$('.actGearPipe').removeClass('actGeatActive');
								// alert('執行了');
							}
							
						
					}
					
				});
				$.ajax({
					url: 'oneActivity3.php',	
					data: {NewPage:NewPage},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actDetailBox1').html(data);
							
						
					}
					
				});
				$.ajax({
					url: 'oneActivity4.php',	
					data: {NewPage:NewPage},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCHLeftSelect').html(data);
						 liHeight= -70.88;
						 // mar = $('.actCHLeftSelect li').css('margin');
						 // console.log(liHeight);

						 liLength = $('.actCHLeftSelect li').length/2;
						 totlaLength = liHeight * (liLength-3);
						// console.log(totlaLength);
						var moveHeight = 0;
						$('#actTop').css('display','block');
						 if(liLength <=3 ){
						  $('#actTop').css('display','none');
						 }
						$('#actTop').click(function(){

							 moveHeight=moveHeight+liHeight-10;
							
							$('.actCHLeftSelect').css('top',moveHeight);
							if(moveHeight <= totlaLength){
								$('#actTop').css('display','none');

							}
							if (moveHeight == 0) {
							$('#actDown').css('display','none');
							}
							else{
							$('#actDown').css('display','block');
							}
						})
						$('#actDown').click(function(){

							moveHeight=moveHeight-liHeight+10;
							// console.log(moveHeight);
							$('.actCHLeftSelect').css('top',moveHeight);
							if(moveHeight >= totlaLength){
								$('#actTop').css('display','block');

							}
							if (moveHeight == 0) {
							$('#actDown').css('display','none');
							}
							else{
							$('#actDown').css('display','block');
							}
							// console.log(moveHeight);
							
						
						})
						// console.log(moveHeight);
						if (moveHeight == 0) {
							$('#actDown').css('display','none');
							}
							else{
							$('#actDown').css('display','block');
							}
							
						
					}
					
				});
				// 抓名字評價
				
				$.ajax({
					url: 'oneActivity5.php',	
					data: {NewPage:NewPage},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCoachName').html(data);
						 $('.actFirstCoach2').html($('.actFirstCoach').text());
						 $('.actSelectCoachName').attr('value',$('.actFirstCoach').text());


						 var totalsc = parseInt($('.chtotalScore2').text());
								// console.log(totalsc);

								$('.chLbPerRating2').children('.chLbPerRatingBar2').animate({width:totalsc+'%'},600);
								/*更換活動後日曆顯示*/
						 coachPreset = $('.actCoachName').find('input').val();
						 // console.log('CP:'+coachPreset);
						 chgcoach = coachPreset;
						// console.log(chgcoach);
						// console.log('我是活動編號'+actNumCd);
						$.ajax({
							url: 'calendar.php',
							data: {chgcoach:chgcoach},
							type:'POST',
							dataType: 'text',
							success: function(data){
								$('#chAct').html(data);
								$.ajax({
									url: 'calendarAjax.php',
									data: {chgcoach:clcoach},
									type:'POST',
									dataType: 'text',
									success: function(Ddata){
										refreshDate(Ddata);
										GDdata = Ddata;

										$.ajax({
											url: 'group.php',
											data: {chgcoach:clcoach,chgcat:slact},
											type:'POST',
											dataType: 'text',
											success: function(Gdata){
												// console.log('被預約日期'+Gdata);
												refreshDate(GDdata,Gdata);
											}
										});
									}


								});
							}
						});ajaxDate(clcoach = coachPreset);

							
						
						}
							
				});
				//手機
				// $.ajax({
				// 	url: 'oneActivity5m.php',	
				// 	data: {NewPage:NewPage},	
				// 	type: 'POST',				
				// 	dataType: 'text',			
				// 	success: function(data){
				// 		 $('.actMoblieCoach').html(data);





							
						
				// 	}
					
				// });
				// 抓圖
				$.ajax({
					url: 'oneActivity6.php',	
					data: {NewPage:NewPage},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCoachBig').html(data);
							
						
					}
					
				});
		});
		$(document).on('change', '.actRWDselect', function(){
			NewPageM =$(this).val();
			// console.log(NewPageM);
			$.ajax({
					url: 'oneActivity3.php',	
					data: {NewPage:NewPageM},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actDetailBox1').html(data);
							
						
					}
					
				});
			$.ajax({
					url: 'oneActivity6.php',	
					data: {NewPage:NewPageM},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCoachBig').html(data);
							
						
					}
					
				});

			$.ajax({
					url: 'oneActivity4m.php',	
					data: {NewPage:NewPageM},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actMoblieCoach').html(data);
						 liHeight= -70.88;
						 // mar = $('.actCHLeftSelect li').css('margin');
						 // console.log(liHeight);

						 liLength = $('.actCHLeftSelect li').length/2;
						 totlaLength = liHeight * (liLength-3);
						// console.log(totlaLength);
						var moveHeight = 0;
						$('#actTop').css('display','block');
						 if(liLength <=3 ){
						  $('#actTop').css('display','none');
						 }
						$('#actTop').click(function(){

							 moveHeight=moveHeight+liHeight-10;
							
							$('.actCHLeftSelect').css('top',moveHeight);
							if(moveHeight <= totlaLength){
								$('#actTop').css('display','none');

							}
							if (moveHeight == 0) {
							$('#actDown').css('display','none');
							}
							else{
							$('#actDown').css('display','block');
							}
						})
						$('#actDown').click(function(){

							moveHeight=moveHeight-liHeight+10;
							// console.log(moveHeight);
							$('.actCHLeftSelect').css('top',moveHeight);
							if(moveHeight >= totlaLength){
								$('#actTop').css('display','block');

							}
							if (moveHeight == 0) {
							$('#actDown').css('display','none');
							}
							else{
							$('#actDown').css('display','block');
							}
							// console.log(moveHeight);
							
						
						})
						// console.log(moveHeight);
						if (moveHeight == 0) {
							$('#actDown').css('display','none');
							}
							else{
							$('#actDown').css('display','block');
							}
							
						
					}
					
				});
			// $.ajax({
			// 		url: 'oneActivity4.php',	
			// 		data: {NewPage:NewPageM},	
			// 		type: 'POST',				
			// 		dataType: 'text',			
			// 		success: function(data){
			// 			 $('.actCHLeftSelect').html(data);
			// 			}
					
			// 	});
			$.ajax({
					url: 'oneActivity5.php',	
					data: {NewPage:NewPageM},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCoachName').html(data);
						 $('.actFirstCoach2').html($('.actFirstCoach').text());
						 $('.actSelectCoachName').attr('value',$('.actFirstCoach').text());


						 var totalsc = parseInt($('.chtotalScore2').text());
								// console.log(totalsc);

								$('.chLbPerRating2').children('.chLbPerRatingBar2').animate({width:totalsc+'%'},600);
								/*更換活動後日曆顯示*/
						 coachPreset = $('.actCoachName').find('input').val();
						 console.log('CP:'+coachPreset);
						 chgcoach = coachPreset;
						console.log(chgcoach);
						console.log('我是活動編號'+actNumCd);
						$.ajax({
							url: 'calendar.php',
							data: {chgcoach:chgcoach},
							type:'POST',
							dataType: 'text',
							success: function(data){
								$('#chAct').html(data);
								$.ajax({
									url: 'calendarAjax.php',
									data: {chgcoach:clcoach},
									type:'POST',
									dataType: 'text',
									success: function(Ddata){
										refreshDate(Ddata);
										GDdata = Ddata;

										$.ajax({
											url: 'group.php',
											data: {chgcoach:clcoach,chgcat:slact},
											type:'POST',
											dataType: 'text',
											success: function(Gdata){
												console.log('被預約日期'+Gdata);
												refreshDate(GDdata,Gdata);
											}
										});
									}


								});
							}
						});ajaxDate(clcoach = coachPreset);

							
						
						}
							
				});

			$.ajax({
					url: 'oneActivity2.php',	
					data: {NewPage:NewPageM},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actSelectMesseage').html(data);
						 var x = 0 ;
		
		$('.actNextStep').click(function(){
			x += 1 ;
			
			if(x==0){
				$('.actSelectMesseage').delay(0).animate({'transform':'translateX(0%)'},2,function(){
				$('.actSelectMesseage').css('transform','translateX(0%)');
			});

			$('.actActivityRight li').delay(1000).animate({'left':'7%'},1,function(){
				$('.actActivityRight li').css('left','7%');
			});
			$('.actCircleImg').css('display','block');
			}else if(x==1){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actSelectCH').animate({'transform':'translateX(0%)'},1,function(){
				$('.actSelectCH').css('transform','translateX(0%)');
			});

			$('.actCoachCd').animate({'transform':'translateX(0%)'},function(){
				$('.actCoachCd').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			}else if(x==2){
				if($('.actSelectDay').text()==''){
					alert('日期還未填選喔');
					x-=1;


				}else{
					$('.actLightBox').css('display','none');
					$('.actLightBox').eq(x).css('display','block');
					$('.actLightBox').eq(5).css('display','block');
					$('.actSelectGear').animate({'transform':'translateX(0%)'},2,function(){
					$('.actSelectGear').css('transform','translateX(0%)');
					$('.actCircleImg').css('display','none');
					$('.actStep').html('<span class="actStepFont">步驟3</span>:選擇裝備');
				});
				}
				
			}else if(x==3){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actDetailBox').animate({'transform':'translateX(0%)'},2,function(){
				$('.actDetailBox').css('transform','translateX(0%)');
			});
			$('.actDetialSmallBox').animate({'transform':'translateX(0%)'},function(){
				$('.actDetialSmallBox').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			}else if(x==4){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actActivityRight li').animate({'left':'0%'},2,function(){
				$('.actAllRight').css('left','0%');
			});

			$('.actCircleImg').css('display','none');
			}else if($('.actSelectDay').text()==''){

			}


			$('.activeMove').css('left', x*42.55 + 'px');
			$('.actStepBox li').removeClass('actStepActive');
			setTimeout(aa,500);
			function aa(){
				$('.actStepBox li').eq(x).addClass('actStepActive');
			}
			
			
			for(r=0;r<5;r++){
				if(x==r){
				$('.actStepBox li').eq(r).css('pointer-events','auto');

			}
			}
			if(x==4){
			$('.actNextStep').css('display','none');
			}else{
				$('.actNextStep').css('display','block');
			}

				
			})
		$('.actStepBox li').click(function(){
			z= $(this).index();
			x=z;
			$('.actStepBox li').removeClass('actStepActive');
			// $('.actStepBox li').eq(z).addClass('active');
			setTimeout(bb,500);
			function bb (){
				$('.actStepBox li').eq(z).addClass('actStepActive');
			}
			$('.activeMove').css('left', x*42.55 + 'px');
			if(x==4){
			$('.actNextStep').css('display','none');
		}else{
			$('.actNextStep').css('display','block');
		}
		})



						 var actSType =$('.actSelectMesseage').find('input').val();
							// console.log($('.actSelectMesseage').find('input').val());
							if(actSType == '浮潛類'){
								$('span.actTctPipe').css('display','inline-block');
								$('.actIconBottle').css('display','none');
								$('span.actTxtBottle').css('display','none');
								$('.actLineBox3').removeClass('actGearAct');
								$('.actBottle').removeClass('actGeatActive');
								// alert('執行了');

							}else if(actSType == '深潛類'){
								$('span.actTxtBottle').css('display','inline-block');
								$('.actIconPipe').css('display','none');
								$('span.actTctPipe').css('display','none');
								$('.actLineBox1').removeClass('actGearAct');
								
								$('.actGearPipe').removeClass('actGeatActive');
								// alert('執行了');
							}




						}

			})

			
		})	
		
		$(document).on('click', '.actCoachSmall', function(){
			// console.log($(this).find('input').val());
			$('.actFirstCoach2').html($(this).find('input').val());
			$('.actSelectCoachName').attr('value', $(this).find('input').val() );

			var coachSelect = $(this).find('input').val();
			$.ajax({
					url: 'oneActivity7.php',	
					data: {coachSelect:coachSelect},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCoachBig').html(data);
							
						
					}
					
			});

			$.ajax({
					url: 'oneActivity8.php',	
					data: {coachSelect:coachSelect},	
					type: 'POST',				
					dataType: 'text',			
					success: function(data){
						 $('.actCoachName').html(data);

						 var totalsc = parseInt($('.chtotalScore2').text());
								// console.log(totalsc);
								$('.chLbPerRating2').children('.chLbPerRatingBar2').animate({width:totalsc+'%'},600);



						 coachPreset = $('.actCoachName').find('input').val();
						 console.log('CP:'+coachPreset);
						 chgcoach = coachPreset;
						console.log(chgcoach);
						$.ajax({
							url: 'calendar.php',
							data: {chgcoach:chgcoach},
							type:'POST',
							dataType: 'text',
							success: function(data){
								$('#chAct').html(data);
								$.ajax({
									url: 'calendarAjax.php',
									data: {chgcoach:clcoach},
									type:'POST',
									dataType: 'text',
									success: function(Ddata){
										refreshDate(Ddata);
									}
								});
							}
						});ajaxDate(clcoach = coachPreset);
							
						
					}
					
			});


		});

		$(document).on('click', '.actDetialSend', function(e){
			var actSelectName  =$('.actSelectName').val();
			// console.log(actSelectName);
			var actSelectPrice =$('.actSelectPrice').val();
			// console.log(actSelectPrice);
			var actSelectCoachName =$('.actSelectCoachName').val();
			// console.log(actSelectCoachName);
			var actCoachDate =$('.actCoachDate').val();

			$('.actStepAll').css('display','none');
			// console.log(actCoachDate);





			if( memNo != 0){

				var memNum = memNo;
				// console.log(memNum);
				$.ajax({
									url: 'oneActivitySend.php',	
									data: {actSelectName:actSelectName,actSelectPrice:actSelectPrice,actSelectCoachName:actSelectCoachName,actCoachDate:actCoachDate,memNum:memNum},	
									type: 'POST',				
									dataType: 'text',			
									success: function(data){
										 alert('訂單已送出');
											
										
									}
									
							});
				$('.actStepBox li').eq(4).css('pointer-events','auto');
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(4).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actActivityRight li').animate({'left':'0%'},2,function(){
				$('.actAllRight').css('left','0%');
			});

			$('.actCircleImg').css('display','none');

			}else{
				alert("還未登入");
				var memNum = 0;
				// console.log(memNum);
			}
			
			



		})


	})		
</script>	

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url: 'oneActcomment.php',	
			data: {pageNo:<?php echo $pageNo; ?>},	
			type: 'POST',				
			dataType: 'text',			
			success: function(data){
				 $('.commentArea').html(data);
				 for(var i =0;i<$('.chLbPercommentBox').length;i++){
					var totalsc = parseInt($('.chLbPercommentBox').eq(i).children('.chLbPerScore').text());
					// console.log('總評分燈箱'+totalsc);
					
					$('.chLbPercommentBox').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({width:totalsc+'%'},600);
					}	
					$('.reportbtn').click(function(){
						cntNO = $(this).find('input').val();
						// console.log(cntNO);
						$.ajax({
						url: 'nowreport.php',				
						data: {commentNo:cntNO},				
						type: 'POST',				
						dataType: 'text',
						success: function(data){
							alert("檢舉成功");
						}
						})		

					})
		 		
			}
			
		});
	})
</script>
	</div>

	<div class="actLightBox actLightBox2">
		<div class="actBLMask"></div>
		<div class="actSelectCH">
			<div class="actNextStep"><p>下一步</p></div>
			<div class="actShowCD"><p>預約教練</p></div>
			<div id="actTop"><img src="images/up-arrow (1).png" alt=""></div>
			<div id="actDown"><img src="images/up-arrow (1).png" alt=""></div>
			<div class="actOf">
				
				<ul class="actCHLeftSelect">
				
					 <?php 
  
					    foreach($actCoachRows as $k=>$actCoachRow){
					    $coachPic = $actCoachRow['coachName'];
					    $coachPic2 = $actCoachRow['coachImg'];
					    // echo  $coachPic;
					   ?>
					    
					    <li class="actCoachSmall" style="background-image: url('images/s-<?php echo $coachPic2; ?>"')";><?php $coachPic; ?>
					     <input type="hidden" value="<?php echo $coachPic; ?>">
					     <input type="hidden" name="" value="<?php echo $coachPic2; ?>";>
					    </li>
					   <?php 

					  

					   }
					    ?>
				
				</ul>
				 <script>
				    $(document).ready(function(){
				    
				     // console.log(firstCoachImg);


				     if(<?php echo $chDate ?> != 1){
				     		var abc = "<?php echo $chName ?>";
							$('.actFirstCoach').html(abc);
							$('.actFirstCoach2').html(abc);
							$('.actSelectCoachName').attr('value',abc);
							var coImg = '<?php echo $chImg ?>';
							$('.actCoachBigHead').css("background-image", "url('images/s-"+coImg +"')"); 
							console.log('執行了~~~~~喔');
						}else{
							var firstCoachImg = $('.actCoachSmall').find('input').eq(0).val();
							var firstCoachImg2 = $('.actCoachSmall').find('input').eq(1).val();
				     		$('.actFirstCoach').html($('.actCoachSmall').find('input').eq(0).val());
				     		$('.actFirstCoach2').html($('.actCoachSmall').find('input').eq(0).val());

				     		$('.actSelectCoachName').attr('value',$('.actCoachSmall').find('input').eq(0).val());
				     		$('.actCoachBigHead').css("background-image", "url('images/s-"+firstCoachImg2 +"')"); 
						}
				     

				     


				     // console.log(firstCoachImg);
				     // $('.actCoachBigHead').css("background-image", "url('images/"+firstCoachImg +".jpg')"); 

				     


				     })
				   </script>
			</div>

			
			<div class="actCoachBig">
				<div class="actCoachBigHead animated"></div>
				<!-- 手機板 -->
				
				
			</div>
			<div class="actMobCoachBox">
				
				<div class="actMoblieCoach">
					<ul class="actCHLeftSelect main-carousel">
					
						 <?php 
	  
						    foreach($actCoachRows as $k=>$actCoachRow){
						    $coachPic = $actCoachRow['coachName'];
						    $coachPic2 = $actCoachRow['coachImg'];
						    // echo  $coachPic;
						   ?>
						    
						    <li class="actCoachSmall carousel-cell" style="background-image: url('images/s-<?php echo $coachPic2; ?>"')";><?php $coachPic; ?>
						     <input type="hidden" value="<?php echo $coachPic; ?>">
						     <input type="hidden" name="" value="<?php echo $coachPic2; ?>";>
						    </li>
						   <?php 

						  

						   }
						    ?>
					
					</ul>
				</div>
			</div>
			<!-- 手機板結束 -->
			<div class="actCoachName">
				<input type="hidden" value="<?php echo $actFirstLmCoachNo ?>">
				<p><span class="actFontWeight">教練名稱:</span><span class="actFirstCoach"></span></p>
				<p>評分:</p>
				<div class="chLbPerRating chLbPerRating2">
						<div class="chLbPerRatingBar chLbPerRatingBar2"></div>
					</div>
					
					<div class="chtotalScore chtotalScore2">
						<?php 
						if($actCoachScoreCount == 0){

						}else{
							echo round($actCoachSumScore).'%';
						}

							
								
						?>
							
						</div>
						<script>

							$(document).ready(function(){
								var totalsc = parseInt($('.chtotalScore').text());
								// console.log(totalsc);
								$('.chLbPerRating').children('.chLbPerRatingBar').animate({width:totalsc+'%'},600);
							})
							
						</script>
						<script>

							$(document).ready(function(){
								var totalsc = parseInt($('.chtotalScore2').text());
								// console.log(totalsc);
								$('.chLbPerRating2').children('.chLbPerRatingBar2').animate({width:totalsc+'%'},600);
							})
							
						</script>
					
			</div>
		</div>
		
		<div class="actCoachCd">
				<form id="chCalendar" name="chCalendar">
						<div id="chClose"></div>
						<div id="chSelect">
						 <div id="chCoa">
						  
						 </div>
						 
						</div>
						<div id="chYearMonth">
						 <div id="chMonth"></div>
						 <div id="chDiver"></div>
						 <div id="chYear"></div>
						</div>
						<i class="fas fa-chevron-circle-left" id='chLeft'></i>
						<i class="fas fa-chevron-circle-right" id='chRight'></i>
						<div id="chCalBody">
						 <!-- <i class="fas fa-chevron-circle-left" id='chLeft'></i>
						 <i class="fas fa-chevron-circle-right" id='chRight'></i> -->
						 <div id="chWeekList">
						  <ul>
						   <li>M</li>
						   <li>T</li>
						   <li>W</li>
						   <li>T</li>
						   <li>F</li>
						   <li>S</li>
						   <li>S</li>
						  </ul>
						 </div>
						 <div class="chDayList">
						  <ul id="chDays"></ul>
						 </div>
						</div>
						<div class="chMess">
							<div class="chMeTxt">灰:不能選</div >
							<div class="chMeTxt">橘:教練請假</div >
							<div class="chMeTxt">紅:還沒滿團可預約</div >
							<div class="chMeTxt">白:可預約</div >
						</div>
					   </form>
		</div>
		

		
	</div>
	


	<div class="actLightBox actLightBox3">
		<div class="actBLMask"></div>
		<div class="actSelectGear">
			
			<div class="actGearMesseage">
				<div class="actNextStep"><p>下一步</p></div>
				<div class="actTalkSelect">
					<h5>參加活動前請確保以下裝備!</h5>
				</div>
				<ul class="actIconSelect">
					<li class="actIconCircle actIconGlasses"><img src="images/iconGlass.png" alt=""></li>
					<li class="actIconCircle actIconPipe"><img src="images/iconPipe.png" alt=""></li>
					<li class="actIconCircle actIconSuit"><img src="images/iconSuit.png" alt=""></li>
					<li class="actIconCircle actIconFrog"><img src="images/iconFrog.png" alt=""></li>
					<li class="actIconCircle actIconBottle"><img src="images/iconBottle.png" alt=""></li>
				</ul>
				<div class="actTalkMS">
					<p>在確定報名活動前，請為這位潛水員穿上 <span class="actOwnGear">您已擁有</span>的裝備，以此確保您在出發前有添購或租用裝備!</p>
				</div>
				
			</div>

			
			
			
			

		</div>
		<ul class="actGearChat">
				<li class="actLineBox1">呼吸管: 可以讓您在浮潛時不用換氣，持續享受水中的樂趣<span></span></li>
				<li class="actLineBox2">潛水鏡: 可以讓您在水中不受干擾的觀賞美麗的生態<span>
					
				</span></li>
				<li class="actLineBox3">
					氧氣瓶: 可以讓您抵達更深的海底，探索未知的領域<span></span></li>
				<li class="actLineBox4">
					潛水衣: 可以讓您抵禦寒冷的海水，保證身體的安全<span></span></li>
				<li class="actLineBox5">
					蛙鞋: 可以讓您在水中像於一樣，更自由的活動<span></span></li>
			</ul>
		<div class="actGearModel">
				<img src="images/boyModel.png" alt="">
				<div class="actGearGlasses">
					<img src="images/glasses.png" alt="">
				</div>
				<div class="actGearPipe">
						<img src="images/pipe.png" alt="">
				</div>
				<div class="actGearCloth">
						<img src="images/wetsuit.png" alt="">
				</div>
				<div class="actGearFrog">
					<div class="actGearFrogLeft">
						<img src="images/frogLeft.png" alt="">
						<!-- <img src="images/蛙鞋(右) .png" alt=""> -->
					</div>
					<div class="actGearFrogRight">
						<img src="images/frogRight.png" alt="">
					</div>
				
				</div>
				<div class="actBottle">
					<img src="images/Bottle.png" alt="">
					<img class="actMoAir" src="images/moAir.png">

				</div>
				
				
				
			</div>
	</div>


	<div class="actLightBox actLightBox4">
			<div class="actBLMask"></div>
			<div class="actDetailBox">
				<!-- <h5>報名完成</h5> -->

				<div class="actDetailBox1">
				<p>活動名稱: <span class="actFontWeight"><?php echo $ActRow['actName']; ?></span></p>
				<input class="actSelectName" type="hidden" value="<?php echo $ActRow['actName']; ?>">
				<p>活動費用: <span class="actFontWeight"><?php echo $ActRow['actPrice']; ?></span></p>
				<input class="actSelectPrice" type="hidden" value="<?php echo $ActRow['actPrice']; ?>">
				</div>

				<div class="actDetailBox2">
				<p>教練名稱: <span class="actFontWeight actFirstCoach2"></span></p>
				
				<input class="actSelectCoachName" type="hidden" value="">

				<p>活動日期: <span class="actSelectDay actFontWeight"></span></p>
				</div>
				<input class="actCoachDate" type="hidden" value="">
				<p>缺少的裝備: <span class="actFontWeight">
					<span class="actTxtGlass">潛水鏡</span><span class="actTxtPipe"> 呼吸管</span><span class="actTxtSuit"> 防寒衣</span><span class="actTxtFrog"> 蛙鞋</span><span class="actTxtBottle"> 氧氣瓶</span>
				</span></p>
				<button class="actDetialSend actNextStep">確定送出</button>
			</div>

			
			<!-- <div class="actBigFont">
				<h2>報名完成</h2>
			</div> -->
			
			<!-- 人形 -->

			<div class="actGearModel actModelDetail">
					<img src="images/boyModel.png" alt="">
					<div class="actGearGlasses">
						<img src="images/glasses.png" alt="">
					</div>
					<div class="actGearPipe">
							<img src="images/pipe.png" alt="">
					</div>
					<div class="actGearCloth">
							<img src="images/wetsuit.png" alt="">
					</div>
					<div class="actGearFrog">
						<div class="actGearFrogLeft">
							<img src="images/frogLeft.png" alt="">
						
						</div>
						<div class="actGearFrogRight">
							<img src="images/frogRight.png" alt="">
						</div>
					</div>
						<div class="actBottle">
						<img src="images/Bottle.png" alt="">
						<img class="actMoAir" src="images/moAir.png">

					</div>
					
					
			</div>
			<div class="actDetialSmallBox"></div>

			
	</div>


	<div class="actLightBox actLightBox5">
		<div class="actBLMask"></div>
		<a class="cardA" href="memUpdate.php">
		<div class="actAllRight actAllRight1">
			<div class="actAllRightPic">
				<img src="images/memGo.png" alt="">
			</div>
			<p>您可以到 <span class="actFontWeight">會員專區</span> 確認行程!</p>
		</div>
		</a>
		<a class="cardA" href="customWetsuitSex.php">
		<div class="actAllRight actAllRight2">
			<div class="actAllRightPic">
				<img src="images/suitGo.png" alt="">
			</div>
			<p>您可以 <span class="actFontWeight">客製</span> 屬於自己的潛水衣!</p>
		</div>
		</a>
		<a class="cardA" href="divinggear.php">
		<div class="actAllRight actAllRight3">
			<div class="actAllRightPic">
				<img src="images/gearGo.png" alt="">
			</div>
			<p>您也可以到 <span class="actFontWeight">裝備商店</span> 添購裝備</p>
		</div>
		</a>
	</div>
	
	<div class="actLightBox actLightBoxH">
		<div class="actXBtn">
			<span class="actX1"></span>
			<span class="actX2"></span>
		</div>
		<div class="actCircleImg bounceInRight animated">
		<?php foreach($actORIs as $s=>$actORIRow){
				// echo $actORIRow['actItemImg'];
		
			$ActAinAll = explode("| ", $actORIRow['actItemImg']);
			
		?>
		<div class="actAinImg">
			<img src="images/<?php echo $ActAinAll[2]; ?>" alt="">
				

			</div>

		<?php
} 
		?>
			<!-- <div class="actAinImg actImgActive">
				
			</div> -->
			<!-- <div class="actAinImg">
				<img src="images/shark-02.png" alt="">
			</div>
			<div class="actAinImg">
				<img src="images/whale-05.png" alt="">
			</div> -->
		</div>

		<div class="actTRBox">
			<div class="stepTopTxt">
			<h4><span class="stepOrange">01/</span><span class="stepWhite">05 </span> 步驟:選擇活動</h4>
			</div>
			<div class="actStepAll">
				
			<ul class="actStepBox">
				<li class="actStepActive">01 <div class="activeMove"></div>	</li>
				<li>02</li>
				<li>03</li>
				<li>04</li>
				<li>05</li>
	
			</ul>
		</div>

		</div>
		
	</div>
</div>


<div class="clearfix"></div>
<!--內容 end-->


<!--footer start-->
<footer>
	<p>copyright© 2018 design by sea tunnel team</p>
</footer>
<!-- 放置區 -->


<!-- 放置區 -->
<?php



	
}

	
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage(), "<br>";
	echo "錯誤行號 : " , $e->getLine(), "<br>";	
}
?>
<!--footer end-->	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('.actCHLeftSelect').click(function(){
			$('.actDetailBox p').eq(2).html('阿莫');
		})
	})
</script> -->
<script>
$(document).ready(function(){
	 // liHeight = $('.actCHLeftSelect li').height()*0.9;
	 liHeight= -70.88;
	 // mar = $('.actCHLeftSelect li').css('margin');
	 // console.log(liHeight);

	 liLength = ($('.actCHLeftSelect li').length)/2;
	 console.log('LI數量'+liLength);
	 totlaLength = liHeight * (liLength-3);
	// console.log(totlaLength);
	var moveHeight = 0;
	 if(liLength <=3 ){
	  $('#actTop').css('display','none');
	 }
	$('#actTop').click(function(){

		 moveHeight=moveHeight+liHeight-10;
		
		$('.actCHLeftSelect').css('top',moveHeight);
		if(moveHeight <= totlaLength){
			$('#actTop').css('display','none');

		}
		if (moveHeight == 0) {
		$('#actDown').css('display','none');
		}
		else{
		$('#actDown').css('display','block');
		}
	})
	$('#actDown').click(function(){

		moveHeight=moveHeight-liHeight+10;
		// console.log(moveHeight);
		$('.actCHLeftSelect').css('top',moveHeight);
		if(moveHeight >= totlaLength){
			$('#actTop').css('display','block');

		}
		if (moveHeight == 0) {
		$('#actDown').css('display','none');
		}
		else{
		$('#actDown').css('display','block');
		}
		// console.log(moveHeight);
		
	
	})
	// console.log(moveHeight);
	if (moveHeight == 0) {
		$('#actDown').css('display','none');
		}
		else{
		$('#actDown').css('display','block');
		}
	

})
</script>

<!-- ================================================ -->
<script>
	// $('.actRLi').click(function(){
		// var NewPage  = $(this).children('input').val();
		
		
	// });
	// $('#chOption').change(function(){
	// 	clcoach = $(this).val();
	// 	$.ajax({
	// 		url: 'calendar.php',
	// 		data: {chgcoach:clcoach},
	// 		type:'POST',
	// 		dataType: 'text',
	// 		success: function(data){
	// 			$('#chAct').html(data);
	// 			$.ajax({
	// 				url: 'calendarAjax.php',
	// 				data: {chgcoach:clcoach},
	// 				type:'POST',
	// 				dataType: 'text',
	// 				success: function(Ddata){
	// 					refreshDate(Ddata);
	// 				}
	// 			});
	// 		}
	// 	})
	// });
	var coachPreset = $('.actCoachName').find('input').val();
	actNumRe = $('.actActivityRight li').find('input').eq(1).val();
	console.log('一開始的編號'+actNumRe);
	console.log(coachPreset);
	slact = actNumRe;
		function ajaxDate(clcoach){
		$.ajax({
			url: 'calendar.php',
			data: {chgcoach:clcoach},
			type:'POST',
			dataType: 'text',
			success: function(data){
				$('#chAct').html(data);
				$.ajax({
					url: 'calendarAjax.php',
					data: {chgcoach:clcoach},
					type:'POST',
					dataType: 'text',
					success: function(Ddata){
						refreshDate(Ddata);
						GDdata = Ddata;
							$.ajax({
							url: 'group.php',
							data: {chgcoach:clcoach,chgcat:slact},
							type:'POST',
							dataType: 'text',
							success: function(Gdata){
								console.log('被預約日期'+Gdata);
								refreshDate(GDdata,Gdata);
							}
						});
					}
				});
			}
		})
		}
		ajaxDate(clcoach = coachPreset);
		// 預設教練
</script>
<script>
	var month_olympic = [31,29,31,30,31,30,31,31,30,31,30,31];
	var month_normal = [31,28,31,30,31,30,31,31,30,31,30,31];
	var month_name = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sep","Oct","Nov","Dec"];
	var holder = document.getElementById('chDays');
	var chMonth = document.getElementById('chMonth');
	var chYear = document.getElementById('chYear');
	var my_date = new Date();
	var my_year = my_date.getFullYear();
	var my_month = my_date.getMonth();
	var my_day = my_date.getDate();
	var chLeft =document.getElementById('chLeft');
	var chRight =document.getElementById('chRight');
	
	function dayStart(month, year) {
		var tmpDate = new Date(year, month, 1);
		return (tmpDate.getDay());
	}

	function daysMonth(month, year) {
		var tmp = year % 4;
		if (tmp == 0) {
			return (month_olympic[month]);
		} else {
			return (month_normal[month]);
		}
	}
	function refreshDate(Ddata,Gdata){
		var str = "";
		var totalDay = daysMonth(my_month, my_year); //抓出该月總天數
		var firstDay = dayStart(my_month, my_year); //抓出該月第一天是星期幾
		firstDay = firstDay == 0 ? 7 : firstDay; //如果他是0的話  就把他變7
		var myclass;
		for(var i=1; i<firstDay; i++){
			str += "<li><\/li>";
		}
		for(var i=1; i<=totalDay; i++){
			if((i < my_day && my_year == my_date.getFullYear() && my_month== my_date.getMonth()) || my_year < my_date.getFullYear() || ( my_year == my_date.getFullYear() && my_month < my_date.getMonth())){
				myclass = " class='chLightgrey'"; //當日期是過去，以淺灰色顯示
			}else if (i==my_day && my_year==my_date.getFullYear() && my_month==my_date.getMonth()){
				myclass = " class='chWhite'"; //不用惹
			}else{
				myclass = " class='chWhite'"; //當日期是未來，以白色顯示
			}
			str += "<li"+myclass+">"+i+"<\/li>";
		}
		holder.innerHTML = str;
		chMonth.innerHTML = month_name[my_month];
		chYear.innerHTML = my_year.toString().substr(2,2);
		var dayArr = ['01','02','03','04','05','06','07','08','09'];
		
		
		for(var b =0;b<$('.chWhite').length;b++){
			var phpday = $('.chWhite').eq(b).text();
			var now_month = my_month+1;
			for(var r =1;r<=9;r++){
				if(now_month==r){
					now_month=dayArr[r-1];
					// console.log(now_month);
				}
			}
			for(var r =1;r<=9;r++){
				if(phpday==r){
					phpday=dayArr[r-1];
					console.log(phpday);
				}
			}
			
			$('.chWhite').eq(b).append('<input type="hidden" value="'+my_year+'-'+now_month+'-'+phpday+'" name="coachDate" disabled="true">');
		}
		console.log('請假'+Ddata);
		var newData =Ddata.split("|");
		if(Gdata){
			console.log('預約'+Gdata);
			var newGData =Gdata.split("|");	
			console.log(newGData[0]);
		}
				
		console.log(newData);
		for(var p in newData){
			console.log(newData[p]);
			NewChDate = newData[p];
			for(var b =0;b<$('.chWhite').length;b++){
				oldDate = $('.chWhite').eq(b).find('input').val();
				if(oldDate==NewChDate){
					$('.chWhite').eq(b).addClass('chOrange');
					$('.chWhite').eq(b).removeClass('chWhite');
				}
			}
		}

		for(var q in newGData){
			console.log(newGData[q]);
			NewGata = newGData[q];

			for(var c =0;c<$('.chOrange').length;c++){
				oldGDate = $('.chOrange').eq(c).find('input').val();
				console.log(oldGDate);
				if(oldGDate==NewGata){
					$('.chOrange').eq(c).addClass('chWhite');
					$('.chOrange').eq(c).addClass('chRed');
					$('.chOrange').eq(c).removeClass('chLightgrey');
				}
			}
		}
		$('.chWhite').on('click',function(){
		$('.chWhite').removeClass('active');
		$(this).addClass('active');
		$('.chWhite').find('input').attr('disabled','disabled');
		$(this).find('input').removeAttr('disabled');
	});
		if(<?php echo $chDate?>){
		// console.log('我在這');
		ddd = "<?php echo $chDate?>";
		// var ggg= ddd.toString();
		for(var i = 0;i<$('.chWhite').length;i++){
			var actDate = $('.chWhite').eq(i).find('input').val();
			// console.log('比對日期'+actDate);
			// console.log('得來的日期'+ddd);
			if(actDate == ddd){
				$('.chWhite').eq(i).addClass('active');
				$('.actSelectDay').html(ddd);
				$('.actCoachDate').attr('value',ddd);
				break;
			}
		}
	}
	}
	chLeft.onclick = function(e){
		e.preventDefault();
		my_month--;
		if(my_month<0){
			my_year--;
			my_month = 11;
		}
		var coachPreset = $('.actCoachName').find('input').val();
		/*換月感應*/
		clcoach = coachPreset;
		// refreshDate();
		ajaxDate(clcoach);
	}
	chLeft.onmouseover = function(e){
		$('#chLeft').css('opacity','1');
	}
	chLeft.onmouseout = function(e){
		$('#chLeft').css('opacity','0.3');
	}
	chRight.onclick = function(e){
		e.preventDefault();
		my_month++;
		if(my_month>11){
			my_year++;
			my_month = 0;
		}
		/*換月感應*/
		clcoach = coachPreset;
		// console.log(clcoach);
		// refreshDate();
		ajaxDate(clcoach);
	}
	chRight.onmouseover = function(e){
		$('#chRight').css('opacity','1');
	}
	chRight.onmouseout = function(e){
		$('#chRight').css('opacity','0.3');
	}
	$('.chWhite').mouseover(function(){
		$('#chLeft').css('opacity','0');
		$('#chLeft').css('cursor','default');
		$('#chRight').css('opacity','0');
		$('#chRight').css('cursor','default');
		$('#chLeft').attr("disabled",true);
		$('#chRight').attr("disabled",true);
	});
	$('.chWhite').mouseout(function(){
		$('#chLeft').css('opacity','0.3');
		$('#chLeft').css('cursor','pointer');
		$('#chRight').css('opacity','0.3');
		$('#chRight').css('cursor','pointer');
		$('#chLeft').attr("disabled",false);
		$('#chRight').attr("disabled",false);
	});
	
	
</script>
<!-- ====================================================萬年結束 -->
<script>
	$(function(){
		$(document).on('click', '.chWhite', function(){
			var actCoachDate = $(this).find('input').val();
			$('.actCoachDate').attr('value', actCoachDate );

			$('.actSelectDay').html(actCoachDate);

		})
	})

</script>

<script>
	$(function(){
		// var _active = 0;

		$('.actStepBox li').click(function(){
			var _active = 0;
			_active = $(this).index();
			// $(this).addClass('actStepActive');
		/**/
			$('.actActivityRight li').delay(0).animate({'left':'1000%'})
			$('.actSelectMesseage').css('transform','translateX(-200%)').animate({'opacity':'1'}, function(){


				$('.actLightBox').css({'display': 'none'});
				$('.actLightBox').eq(_active).css({'display': 'block'});
				$('.actLightBox').eq(5).css({'display': 'block'});
			});
		/**/	
			$('.actCoachCd').css('transform','translateX(400%)')
			$('.actSelectCH').css('transform','translateX(-200%)').animate({'opacity':'1'}, function(){


				$('.actLightBox').css({'display': 'none'});
				$('.actLightBox').eq(_active).css({'display': 'block'});
				$('.actLightBox').eq(5).css({'display': 'block'});
			});
			/**/
			$('.actSelectGear').css('transform','translateX(-200%)');
			/**/
			$('.actDetialSmallBox').css('transform','translateX(400%)')
			$('.actDetailBox').css('transform','translateX(-200%)').animate({'opacity':'1'}, function(){


				$('.actLightBox').css({'display': 'none'});
				$('.actLightBox').eq(_active).css({'display': 'block'});
				$('.actLightBox').eq(5).css({'display': 'block'});
			});
			/**/
			$('.actAllRight').css('left','-200%');


			// $('.actSelectCH').css('transform','scaleX(-1)');
			// $('.actCoachCd').css('transform','scaleX(-1)');
		
		
			// $('.actStepBox li').not(this).removeClass('actStepActive');
			$('.actLightBox').eq(5).css({'display': 'block'});
		
			
			
			

		})

		$('.actStepBox li').eq(0).click(function(){

			$('.actSelectMesseage').delay(0).animate({'transform':'translateX(0%)'},2,function(){
				$('.actSelectMesseage').css('transform','translateX(0%)');
			});

			$('.actActivityRight li').delay(1000).animate({'left':'7%'},1,function(){
				$('.actActivityRight li').css('left','7%');
			});
			$('.actCircleImg').css('display','block');
			$('.stepTopTxt').html('<h4><span class="stepOrange">01/</span><span class="stepWhite">05 </span> 步驟:選擇活動</h4>');	
			

		})

		$('.actStepBox li').eq(1).click(function(){

			$('.actSelectCH').animate({'transform':'translateX(0%)'},1,function(){
				$('.actSelectCH').css('transform','translateX(0%)');
			});

			$('.actCoachCd').animate({'transform':'translateX(0%)'},function(){
				$('.actCoachCd').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			$('.stepTopTxt').html('<h4><span class="stepOrange">02/</span><span class="stepWhite">05 </span> 步驟:選擇教練</h4>');	
			
		});

		$('.actStepBox li').eq(2).click(function(){

			$('.actSelectGear').animate({'transform':'translateX(0%)'},2,function(){
				$('.actSelectGear').css('transform','translateX(0%)');
				$('.actCircleImg').css('display','none');
				
			});
			$('.stepTopTxt').html('<h4><span class="stepOrange">03/</span><span class="stepWhite">05 </span> 步驟:選擇裝備</h4>');

			
		});
		$('.actStepBox li').eq(3).click(function(){

			$('.actDetailBox').animate({'transform':'translateX(0%)'},2,function(){
				$('.actDetailBox').css('transform','translateX(0%)');
			});
			$('.actDetialSmallBox').animate({'transform':'translateX(0%)'},function(){
				$('.actDetialSmallBox').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			$('.stepTopTxt').html('<h4><span class="stepOrange">04/</span><span class="stepWhite">05 </span> 步驟:報名完成</h4>');
			
		})

		$('.actStepBox li').eq(4).click(function(){

			$('.actActivityRight li').animate({'left':'0%'},2,function(){
				$('.actAllRight').css('left','0%');
			});
			$('.actCircleImg').css('display','none');
			$('.stepTopTxt').html('<h4><span class="stepOrange">05/</span><span class="stepWhite">05 </span> 步驟:更多選擇</h4>');

			
		})


		


	})

</script>

<script>
	$(function(){
		var findRL = $('.actActivityRight li').find('input').eq(1).val()-1 ;
		// alert(findRL);
		// var _active2 = findRL ;
		$('.actCircleImg .actAinImg').eq(findRL).addClass('actImgActive');
		
		$('.actActivityRight li').click(function(){
			
				var findRLi = $(this).find('input').eq(1).val()-1;
				$('.actCircleImg .actImgActive').css({'top': 0}).stop(false,false).animate({'top':'-800px'}, function(){
				$(this).removeClass('actImgActive');
				});
				var findRLi = $(this).find('input').eq(1).val()-1;
				// var findAin = $('.actAinImg').find('input').val();
				// console.log('執行了'+findRLi);
				// console.log(findAin);
				_active2 = findRLi;
				$('.actCircleImg .actAinImg').eq(_active2).css({'top': '800px'});
				$('.actCircleImg .actAinImg').eq(_active2).stop(false,false).animate({'top':0},function(){
				$(this).addClass('actImgActive');
				});

				$('.actActivityRight li').css('pointer-events','none');
				setTimeout(function (){
					$('.actActivityRight li').css('pointer-events','auto');
				},500);
			

			// function test(){
			// 	$('.actActivityRight li').css('pointer-events','auto');
			// 	alert(1);
			// }
			
			
			
			



		})
	})
</script>

	
<script>
	$(function(){
		$(".actActivityRight li").eq(0).removeClass('actRLi');
	
		$('.actActivityRight li').click(function(){
			// 被移除
			$(".actActivityRight li p").removeClass('actFontActive1');
			$(".actActivityRight li p").removeClass('actFontActive2');
			$(".actActivityRight li p").removeClass('actFontActive3');
			$(".actActivityRight li p").removeClass('actFontActive4');
			$(".actActivityRight li div").removeClass('actCPActive');
			$(".actActivityRight li div").removeClass('actRImgActive');
			$(".actActivityRight li").addClass('actRLi');
			$(".actActivityRight li").removeClass('actMarginF');

			// 被控制
			$(this).find('p').eq(0).addClass('actFontActive1');
			$(this).find('p').eq(1).addClass('actFontActive2');
			$(this).find('p').eq(2).addClass('actFontActive3');
			$(this).find('p').eq(3).addClass('actFontActive4');
			$(this).find('div').eq(0).addClass('actCPActive');
			$(this).find('div').eq(2).addClass('actRImgActive');
			$(this).removeClass('actRLi');
			$(this).addClass('actMarginF');
			$(".actActivityRight li").eq(0).removeClass('actMarginF');
			$(".actActivityRight li").eq(4).removeClass('actMarginF');
			$(".actActivityRight li").eq(8).removeClass('actMarginF');
			

		})
	})

	
</script>

<script>
	$(function(){
		$('.actIconGlasses').click(function(){
			$('.actGearGlasses').toggleClass('actGeatActive');
			$('.actLineBox2').toggleClass('actGearAct');
			$('.actLineBox2 span').toggleClass('actGearAin2');
			$('.actTxtGlass').toggleClass('actTxtActive');

		})
		$('.actIconPipe').click(function(){
			$('.actGearPipe').toggleClass('actGeatActive');
			$('.actLineBox1').toggleClass('actGearAct');
			$('.actLineBox1 span').toggleClass('actGearAin1');
			$('.actTxtPipe').toggleClass('actTxtActive');
		})
		$('.actIconSuit').click(function(){
			$('.actGearCloth').toggleClass('actGeatActive');
			$('.actLineBox4').toggleClass('actGearAct');
			$('.actLineBox4 span').toggleClass('actGearAin4');
			$('.actTxtSuit').toggleClass('actTxtActive');

		})
		$('.actIconFrog').click(function(){
			$('.actGearFrog').toggleClass('actGeatActive');
			$('.actLineBox5').toggleClass('actGearAct');
			$('.actLineBox5 span').toggleClass('actGearAin5');
			$('.actTxtFrog').toggleClass('actTxtActive');
		})
		$('.actIconBottle').click(function(){
			$('.actBottle').toggleClass('actGeatActive');
			$('.actLineBox3').toggleClass('actGearAct');
			$('.actLineBox3 span').toggleClass('actGearAin3');
			$('.actTxtBottle').toggleClass('actTxtActive');
		})


	})


</script>

<script>
	$(function(){
		$('.actSignBtn').click(function(){
			$('.actLightBoxBackGd').css('display','block');
		});

		$('.actXBtn').click(function(){
			$('.actLightBoxBackGd').css('display','none');
			
			$.ajax({
				url: 'actUnset.php',
				dataType: 'text',
				
			})
		location.reload();
	


	})
})		

	
</script>
<script>
    
    $(document).ready(function(){
    	console.log($(window).width()+"115146466");
    	if($(window).width()>767){
    		var i = 0;
	        $('.actActivityRight').eq(i).fadeIn();
	        $('.rightBtn').click(function(){
	            var aaa = $('.actActivityRight').length;
	            var aaa= aaa-1;
	            if(i==aaa){
	                i=0;
	            }else{
	                i+=1;
	            }
	            $('.actActivityRight').fadeOut();
	            $('.actActivityRight').eq(i).delay(400).fadeIn();
	           
	        })
    	}
        
    })


</script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="css/slick.min.js"></script>
<script>
$(document).on('ready', function() {
     $('').click(function(){}).queue()
      $(".regular").not('.slick-initialized').slick({
        // dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
     
    });	
</script>
<script> 
// =======================換教練================
$.ajax({
	url: 'actcommentbox.php',
	dataType: 'text',
	success: function(data) {
		$('#ajaxcoach').html(data);
		$('#chLbClose').click(function() {
			$('#chBlack').stop().animate({
				height: 0,
				width: 0
			}, 600);
			$('#chLbselectCh ul .chSelectLi').removeClass('active');
		});
// =======================換教練================
		$('.chbuble').unbind('click').click(function() {
			var coachVal = parseInt($(this).find('input').val());
			$('#coachcgNo').val(coachVal);
			// console.log($('#coachcgNo').val());
			coach();
			$('.chbublebox').removeClass('active2');
			$(this).parent().addClass('active2');
		});
// =======================換教練================
		$('#chRwdUl').change(function() {
			coachVal = parseInt($(this).val());
			$('#coachcgNo').val(coachVal);
			// console.log($('#coachcgNo').val());
			coach();
		});
// =======================換教練================
		$('#chMoreBtn').click(function() {
			$('.chLbcommentBox').css('height', 'auto');
			$(this).css('display', 'none');
		});	

		
		coachVal = $('#coachcgNo').val();
		$('.chbublebox').eq(coachVal - 1).addClass('active2');
		window.addEventListener('load', coach);
	}
});
// =======================換教練================
// =======================顯示留言板================
function coach(){
	coachVal = $('#coachcgNo').val();
	console.log('我讀取到的教練編號'+coachVal);
	$('#chMoreBtn').css('display', 'block');
	$.ajax({
		url: 'actcommentbox2.php',
		data: {
			coachNo: coachVal
		},
		type: 'POST',
		dataType: 'text',
		success: function(data) {
			$('.chLbcommentBox').html(data);
			$('.chLbcommentBox').css('height','300px');
			for (var i = 0; i < $('.chLbPercommentBox').length; i++) {
				var totalsc = parseInt($('.chLbPercommentBox').eq(i).children('.chLbPerScore').text());
				// console.log('總評分燈箱'+totalsc);
				$('.chLbPercommentBox').eq(i).children('.chLbPerRating').children('.chLbPerRatingBar').animate({
					width: totalsc + '%'
				}, 600);
			}
			// var liHeight = $('.chLbcommentBox ul li').height();
			// console.log('li的高度'+liHeight);
			// $('.chLbcommentBox').css('height', (liHeight + 10) * 2 + 10);

			$('.reportbtn').click(function() {
				cntNO = $(this).find('input').val();
				// console.log(cntNO);
				$.ajax({
					url: 'nowactreport.php',
					data: {
						commentNo: cntNO
					},
					type: 'POST',
					dataType: 'text',
					success: function(data) {
						alert("檢舉成功");
					}
				})
			})


		}	
	})
}

// =======================顯示留言板================


$('#con').keyup(function(event){
	var catched = $('#coachcgNo').val();
	if (this.value.trim() == "") {} else {
		if (event.keyCode == 13) {
			$.ajax({
				url: 'joinAct2.php',
				data: {
					coachNO: catched,
					memNo: memNo
				},
				type: 'POST',
				dataType: 'text',
				success: function(data) {
					console.log('有無參加過'+data);
					if(data==0){
						var catched = $('#coachcgNo').val();
						var scoreval = $('#chLbScBox').text();
						var intscore = scoreval.substring(0, scoreval.length - 1);
						var conval = $('#con').val();
						console.log(catched,intscore,conval,memNo);
						console.log('接收!');
						if (intscore == "評") {
							alert('你還沒評分');
						} else {
							intscore = parseInt(intscore);
							console.log(catched,intscore,conval,memNo);
							$.ajax({
								url: 'actcommentbox2.php',
								data: {
									content: conval,
									newscore: intscore,
									coachNo2: catched,
									memNo: memNo
								},
								type: 'POST',
								dataType: 'text',
								success: function(data) {
									coach();
									$('#con').val("");
								}
							});
						
						}
					}else{
						alert('您沒參加過此活動哦');
					}
				}
			});	
		}
	}
})
</script>
<script type="text/javascript">
	function firdo(){
		defaultBar=document.getElementById('water-progress-wrapper');
		rtbar=document.getElementsByClassName('wave-progress');
		Lb=document.getElementById('chLightBox');
		defaultBar.addEventListener('click',clickbar);
		bar = true;
		sc=document.getElementById('chLbScBox');
		defaultBar.addEventListener('mousemove',mousebar);
		bodyWidth2=document.body.clientWidth;
		// console.log(bodyWidth2);
			function clickbar(e){
				var boxScroll = document.getElementById('chLightBox').scrollTop;
				if(bodyWidth2<768){
					var newHeight = (defaultBar.offsetTop+defaultBar.clientHeight-e.clientY-boxScroll);
					// console.log(newHeight);
					for(var i = 0;i<3;i++){
						rtbar[i].style.height = newHeight + 'px';
					}
					sc.innerHTML=(newHeight/defaultBar.clientHeight*100).toFixed(0)+'%';
				}else{
					if(bar==true){
						bar = false;
						defaultBar.removeEventListener('mousemove',mousebar);
					}else{
						bar = true;
						defaultBar.addEventListener('mousemove',mousebar);
						var newHeight = (defaultBar.offsetTop+defaultBar.clientHeight-e.clientY-boxScroll);
						// console.log(newHeight);
						for(var i = 0;i<3;i++){
						rtbar[i].style.height = newHeight + 'px';
						}
					}
				}
			}
		function mousebar(e){
			var boxScroll = document.getElementById('chLightBox').scrollTop;
				// console.log('滑鼠Y座標'+e.clientY);
				// console.log('元素跟視窗距離'+defaultBar.offsetTop);
				var newHeight = (defaultBar.offsetTop+defaultBar.clientHeight-e.clientY-boxScroll);
				// console.log('海浪'+newHeight);
				for(var i = 0;i<3;i++){
					rtbar[i].style.height = newHeight + 'px';
				}
				sc.innerHTML=(newHeight/defaultBar.clientHeight*100).toFixed(0)+'%';
			}
	}
	window.addEventListener('load',firdo);
</script>
<script>
	$(document).ready(function(){
		var actSType =$('.actSelectMesseage').find('input').val();
		// console.log($('.actSelectMesseage').find('input').val());
		if(actSType == '浮潛類'){

			$('.actIconBottle').css('display','none');
			$('span.actTxtBottle').css('display','none');
			// alert('執行了');
			$('.actLineBox3').removeClass('actGearAct');
			$('.actBottle').removeClass('actGeatActive');

		}else if(actSType == '深潛類'){
			$('.actIconPipe').css('display','none');
			$('span.actTctPipe').css('display','none');
			$('.actLineBox1').removeClass('actGearAct');
			$('.actGearPipe').removeClass('actGeatActive');
			// alert('執行了');
		}
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.actShowCD').click(function(){
			$('.actCoachCd').css('display','block');
		})
		$('#chClose').click(function(){
			$('.actCoachCd').css('display','none');
		})
		/*===============================*/
		
		$('.actStepBox li').eq(1).css('pointer-events','none');
		$('.actStepBox li').eq(2).css('pointer-events','none');
		$('.actStepBox li').eq(3).css('pointer-events','none');
		$('.actStepBox li').eq(4).css('pointer-events','none');
		var x = 0 ;
		
		$('.actNextStep').unbind('click').click(function(){
			x += 1 ;
			
			if(x==0){
				$('.actSelectMesseage').delay(0).animate({'transform':'translateX(0%)'},2,function(){
				$('.actSelectMesseage').css('transform','translateX(0%)');
			});

			$('.actActivityRight li').delay(1000).animate({'left':'7%'},1,function(){
				$('.actActivityRight li').css('left','7%');
			});
			$('.actCircleImg').css('display','block');
			$('.stepTopTxt').html('<h4><span class="stepOrange">01/</span><span class="stepWhite">05 </span> 步驟:選擇活動</h4>');
			}else if(x==1){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actSelectCH').animate({'transform':'translateX(0%)'},1,function(){
				$('.actSelectCH').css('transform','translateX(0%)');
			});

			$('.actCoachCd').animate({'transform':'translateX(0%)'},function(){
				$('.actCoachCd').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			$('.stepTopTxt').html('<h4><span class="stepOrange">02/</span><span class="stepWhite">05 </span> 步驟:選擇教練</h4>');
			}else if(x==2){
				if($('.actSelectDay').text()==''){
					alert('日期還未填選喔');
					x-=1;


				}else{
					$('.actLightBox').css('display','none');
					$('.actLightBox').eq(x).css('display','block');
					$('.actLightBox').eq(5).css('display','block');
					$('.actSelectGear').animate({'transform':'translateX(0%)'},2,function(){
					$('.actSelectGear').css('transform','translateX(0%)');
					$('.actCircleImg').css('display','none');
					
				});
					$('.stepTopTxt').html('<h4><span class="stepOrange">03/</span><span class="stepWhite">05 </span> 步驟:確認裝備</h4>');
				}
				
			}else if(x==3){
				$('.actLightBox').css('display','none');
				$('.actLightBox').eq(x).css('display','block');
				$('.actLightBox').eq(5).css('display','block');
				$('.actDetailBox').animate({'transform':'translateX(0%)'},2,function(){
				$('.actDetailBox').css('transform','translateX(0%)');
			});
			$('.actDetialSmallBox').animate({'transform':'translateX(0%)'},function(){
				$('.actDetialSmallBox').css('transform','translateX(0%)');
			});
			$('.actCircleImg').css('display','block');
			$('.stepTopTxt').html('<h4><span class="stepOrange">04/</span><span class="stepWhite">05 </span> 步驟:報名完成</h4>');
			}else if(x==4){
				if($('#spanLogin').text()=='登入'){
					x-=1;
					$('#NotLogged').css('display','block');
					

				}else{
					$('.actLightBox').css('display','none');
					$('.actLightBox').eq(x).css('display','block');
					$('.actLightBox').eq(5).css('display','block');
					$('.actActivityRight li').animate({'left':'0%'},2,function(){
					$('.actAllRight').css('left','0%');
				});

				$('.actCircleImg').css('display','none');
				$('.stepTopTxt').html('<h4><span class="stepOrange">05/</span><span class="stepWhite">05 </span> 步驟:更多選擇</h4>');
				}
				
			}else if($('.actSelectDay').text()==''){

			}


			$('.activeMove').css('left', x*42.55 + 'px');
			$('.actStepBox li').removeClass('actStepActive');
			setTimeout(aa,500);
			function aa(){
				$('.actStepBox li').eq(x).addClass('actStepActive');
			}
			
			
			for(r=0;r<5;r++){
				if(x==r){
				$('.actStepBox li').eq(r).css('pointer-events','auto');

			}
			}
			if(x==4){
			// $('.actNextStep').css('display','none');
			}else{
				$('.actNextStep').css('display','block');
			}

				
			})
		$('.actStepBox li').unbind('click').click(function(){
			z= $(this).index();
			x=z;
			$('.actStepBox li').removeClass('actStepActive');
			// $('.actStepBox li').eq(z).addClass('active');
			setTimeout(bb,500);
			function bb (){
				$('.actStepBox li').eq(z).addClass('actStepActive');
			}
			$('.activeMove').css('left', x*42.55 + 'px');
			if(x==4){
			$('.actNextStep').css('display','none');
		}else{
			$('.actNextStep').css('display','block');
		}
		})

	})


</script>
<script src="js/flickity.pkgd.min.js"></script>

<script>
	
$('.main-carousel').flickity({
  // options
  cellAlign: 'left',
  contain: true,
  draggable: true,
  groupCells: 3,
  pageDots: false
});
		// $(document).on('click', '.actNextStep', function(){

		// 	var mobileLen =$('.actMoblieCoach.actCHLeftSelect li').index();
		// console.log('5212'+mobileLen);
		// $('.actMoblieCoach.actCHLeftSelect').css('width',);
		// })

	
</script>
<script src="js/tilt.jquery.js"></script>
<script type="text/javascript">
$('.js-tilt').tilt({
    scale: 1.1,
    maxGlare: .5
})
</script>



</body>
</html>