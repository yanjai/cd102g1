
<?php 
ob_start();
session_start();
if(isset($_SESSION["memNo"])){

 $memToNo = $_SESSION["memNo"];
 }
 else{
  $memToNo = 0;
 }
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
	<script src="js/memlogin.js"></script>
	<script src="js/notLoggin.js"></script>
	<title>潛水裝備</title>
</head>


<body class="content">

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
					<li class="thispage"><a href="divinggear.php">潛水裝備</a></li>
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

<div class="headBanner headBanner3" >

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
		
		<button class="member sign log" type="button" id="btnLogin" onclick="document.getElementById('memJump').style.display='none'">登入
			<!-- <a href="memUpdate.html">登入</a>	 --> 
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
<div class="contentArea contentArea1">
     <!-- gearlist end -->
    <div id="shoppingCartDetails">
    	<h3>我的購物車</h3>
        <div class="shoppingSteps">
        	<div class="stepsBox1 stepsBox">
        		<span>確認購買明細<br>CHECK YOUR ORDER</span><br>
        		<span>step 01</span>
        	</div>
        	<i class="fa fa-angle-double-right"></i>
        	<div class="stepsBox2 stepsBox">
        		<span>配送與付款方式<br>SHIPPING & PAYMENT</span><br>
        		<span>step 02</span>
        	</div>
        	<i class="fa fa-angle-double-right"></i>
        	<div class="stepsBox3 stepsBox">
        		<span>確認購買<br>CONFIRM DETAILS</span><br>
        		<span>step 03</span>
        	</div>
        	<i class="fa fa-angle-double-right"></i>
        	<div class="stepsBox4 stepsBox">
        		<span>完成訂購<br>THANK YOU!</span><br>
        		<span>step 04</span>
        	</div>
        </div>

	    <div>
				<form method="post" action="cartToDb.php" id="toDbForm">
				<table id="shoppingCartTable">
				    <tr><th class="tableImg">圖片</th><th class="gearNameHeading">裝備名稱</th><th class="tableSize">尺碼</th><th class="unitPrice">單價</th><th class="tableQty">數量</th><th class="tableSubtotal">小計</th><th class="tableRemove">修改</th></tr>
			            <?php 
						$total = 0;
						$subtotal = 0;

						if(isset($_SESSION["gearList"])){
						foreach( $_SESSION["gearList"] as $gearNo=>$gearRow){
							$subtotal =$gearRow["gearPrice"] * $gearRow["gearQty"];
							$total += $subtotal;
						
						?>
						<tr style="padding:0;">
							<input type="hidden" name="gearNo" value="<?php echo $gearNo;?>">
							<td class="cartImg"><img src="images/<?php echo $gearRow['gearPic'];?>" ></td>
							<td class="cartGearName"><a href="gearQuery.php?gearNo=<?php echo $gearNo;?>">
								<?php echo $gearRow["gearName"];?>
								</a>
							</td>
							<td class="cartSize"><?php echo $gearRow["gearSize"];?></td>
							<input type="hidden" name="cartSize" value="<?php echo $gearRow["gearSize"];?>"></td>
							<td class="cartgearPrice"><?php echo $gearRow["gearPrice"];?></td>
							<td class="adjQty" width="100px">
								<span class="qtyMinus">
								    <input type="button" name="btnMinus" value="-">
							    </span>
								<span class="cartgearQty"><?php echo $gearRow["gearQty"];?>
									<input type="hidden" name="cartgearQty" value="<?php echo (int)$gearRow["gearQty"];?>"></span>
								<span class="qtyPlus">
									<input type="button" name="btnPlus" value="+">
								</span>
							</td>
							<td class="cartsubtotal"><?php echo $subtotal;?>
								<input type="hidden" name="cartsubtotal" value="<?php echo (int)$subtotal;?>"></td>

							<td class="cartRemove">
							
								<button type="button" class="removeBtn"><img width="20px" src="images/garbage-bin.png" id="delBtn" onclick="del('<?php echo $gearNo;?>')"></button>							
							</td>
					
						</tr>		
				<?php }  
                  }
				?>
				<?php 
				?>
			    </table>
				<div id="cartTotal"><?php echo number_format($total);?></div>
				     <input type="hidden" id="cartal" name="cartTotal" value="<?php echo (int)$total;?>">
                <div class="cartB_n_N">
				    <span id="keepshopping"><a href="divinggear.php">繼續購物</a></span>
				    <span id="checkOutBox">現在下單</span>
				</div>
                <div id="paymentNaddress">
			        	<div class="payment">
			        		<h5>請選擇付款方式:</h5><br>
			        		<span><input type="radio" name="paymentType" value="信用卡">信用卡</span>
			        		<span><input type="radio" name="paymentType" value="貨到付款">貨到付款</span>
			        		<span><input type="radio" name="paymentType" value="銀行轉賬">銀行轉賬</span>
			        	</div>
			        	<div class="address">
			        		<h5>請填寫收件人資料:</h5><br>
			        		<span>姓名：<input type="text" name="customerName"  class="customerName"></span>
			        		<span>電話：<input type="text" name="customerContact" class="customerContact"></span>
			        		<span>地址：<input type="text" name="customerAdd" class="customerAdd"></span>
			        		<div class="NextBefore">			        		
			        			<span id="takeOrderBefore">上一步</span>
			        		    <span id="takeOrderNext">下一步</span>
			        	    </div>

			        	</div>
			    </div>

		        <div class="clearfix"></div>

			    <div id="gearOrderDetails">
			     	<div id="gearOrderDetails-left">
			    	<h5>請確認訂單細明及收件人資料:</h5>
			     	</div>
			     	<div id="gearOrderDetails-right">
			     	總金額&nbsp:&nbsp<span id="confirmTotal"></span><br>
			     	付款方式&nbsp:&nbsp<span id=paymentStatus></span><br>
			     	姓名&nbsp:&nbsp<span id="receiveName"></span><br>
			     	電話&nbsp:&nbsp<span id="receiverPhonrNo"></span><br>
			     	地址&nbsp:&nbsp<span id="receiveAddress"></span><br>
			     	
			     	</div>
			     	<div class="clearfix"></div>
			     	<div class="NextBefore">
			     	     <span id="confirmBefore">上一步</span>
			     	     <input id="gearOrderConfirmed"  type="submit" name="" value="確認下單">
			        </div>
			    </div> 

			    <div id="thanksMsgBox">

		
			    </div>
			</form>
	    </div> 
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

<!-- adjust item quantity start-->
<script type="text/javascript">

		var cartsubtotal = parseInt($('.cartsubtotal').text());
		var oldtotal = $('#cartTotal').text();
		$('#cartTotal').text('總價錢:'+oldtotal+'元');
		$('#confirmTotal').text(oldtotal+'元');

		// ==============================總價格
		$('.qtyPlus').click(function(){

		    var cartTotal=0;
            var gearPrice = $(this).parent().prev().text();
            var cartgearQty= parseInt($(this).prev().text());
            $('#confirmTotal').text('總價格:'+cartTotal+'元');
            console.log(cartgearQty);
            // console.log('me'+$('#cartal').val());
            
            console.log('me'+$('#cartal').val());
    		cartgearQty += 1;
    		$(this).prev().text(cartgearQty);

    		cartsubtotal = gearPrice * cartgearQty;
    		$(this).parent().next().text(cartsubtotal);

    		for(var i= 0;i<$('.cartsubtotal').length;i++){
    			cartTotal+=parseInt($('.cartsubtotal').eq(i).text());
    			$('#cartTotal').text('總價格:'+cartTotal+'元');
    			$('#confirmTotal').text(cartTotal+'元');
    		}
    			$('#cartal').val(cartTotal);

    			// $('#cartal').val()=cartTotal;
    		//update session plus-------------------------------------
    		var gearNo = $(this).parent().parent().children(':first').val();
    		console.log(gearNo);
    		var xhr = new XMLHttpRequest();
    		xhr.onload = function (){   //checking function
    			if( xhr.status != 200){
    				window.alert( xhr.status );
    			}
    		}
    		var url = "cartUpdate.php?"+"gearNo=" + gearNo + "&cartgearQty=" + cartgearQty;
    		console.log(url);
    		xhr.open("get", url, true);
    		xhr.send(null);

    		//update session-------------------------------------
		});
		// ==============================總價格
        
		$('.qtyMinus').click(function(){
         	var cartTotal=0;
            var gearPrice = $(this).parent().prev().text();
            var cartgearQty= parseInt($(this).next().text());

            console.log(cartgearQty);

            if (cartgearQty ==1) {

            }else{
    		cartgearQty -= 1;}
    		$(this).next().text(cartgearQty);

    		cartsubtotal = gearPrice * cartgearQty;
    		$(this).parent().next().text(cartsubtotal);

    		for(var i= 0;i<$('.cartsubtotal').length;i++){
    			cartTotal+=parseInt($('.cartsubtotal').eq(i).text());
    			$('#cartTotal').text('總價格:'+cartTotal+'元');
    			$('#confirmTotal').text(cartTotal+'元');
    			
    		}
    		    $('#cartal').val(cartTotal);
    		//update session minus-------------------------------------
    		var gearNo = $(this).parent().parent().children(':first').val();
    		console.log(gearNo);
    		var xhr = new XMLHttpRequest();
    		xhr.onload = function (){    //checking function
    			if( xhr.status != 200){
    				window.alert( xhr.status );
    			}
    		}
    		var url = "cartUpdate.php?"+"gearNo=" + gearNo + "&cartgearQty=" + cartgearQty;
    		console.log(url);
    		xhr.open("get", url, true);
    		xhr.send(null);

    		//update session-------------------------------------
		});
        
 
</script>

<script>
	//delete product from session=========

	function del(gearNo){
		location.href = "cartUpdate.php?delBtn=delete&gearNo="+gearNo;
	}
	//delete product from session=========
</script>
<!-- adjust item quantity end -->

<!-- payment and shipping tart -->
<script type="text/javascript">
	var memNo = <?php echo $memToNo;?>;
	$(document).on('click','#checkOutBox',function(){

       if( memNo != 0){
		    var memNum = memNo;
		    console.log(memNum);

		    $('#paymentNaddress').css({"display":"block"});
			$('#shoppingCartTable').css({"display":"none"});
			$('#cartTotal').css({"display":"none"});
			$('#checkOutBox').css({"display":"none"});
			$('#keepshopping').css({"display":"none"});
			$('.stepsBox2').css({"background-color":"rgba(200,200,200,.5)"});
		   }
		   else{
		    var memNum = 0;
		    console.log(memNum);
		    $('#NotLogged').css({"display":"block"});
		   }
	})

  
	$('#takeOrderBefore').click(function(){
		$('#shoppingCartTable').css({"display":"table"});
		$('#cartTotal').css({"display":"block"});
		$('#checkOutBox').css({"display":"block"})
		$('#keepshopping').css({"display":"block"});
		$('#paymentNaddress').css({"display":"none"});
		$('.stepsBox2').css({"background-color":"rgba(200,200,200,0)"});
	});
    
    $('#confirmBefore').click(function(){
		$('#gearOrderDetails').css({"display":"none"});
		$('#shoppingCartTable').css({"display":"none"});
		$('#paymentNaddress').css({"display":"block"});
		$('.stepsBox3').css({"background-color":"rgba(200,200,200,0)"});
    });

	$('#takeOrderNext').click(function(){

   ///input alert -----------------
		  if ($('input[type="radio"]').is(':checked')==""){
       		alert("請選擇付款方式");
       	  }else if($('input[name=customerName]').val()==""){
       	  	alert("請輸入收件人名字")
       	  }else if($('input[name=customerContact]').val()==""){
       	  	alert("請輸入收件人聯絡電話")
       	  }else if($('input[name=customerAdd]').val()==""){
       	  	alert("請輸入收件人地址")
       	  }
           else{
			$('#gearOrderDetails').css({"display":"block"});
			$('#shoppingCartTable').css({"display":"none"});
			$('#paymentNaddress').css({"display":"none"});
			$('.stepsBox3').css({"background-color":"rgba(200,200,200,.5)"});
	         // confirm DETAILS

	        $('#paymentStatus').text($('input[name=paymentType]:checked').val());
	        $('#receiveName').text($('input[name=customerName]').val());
	        $('#receiverPhonrNo').text($('input[name=customerContact]').val());
	        $('#receiveAddress').text($('input[name=customerAdd]').val());
    	  }
	}); 
	$('#toDbForm').submit(function(){
		event.preventDefault();
		$.ajax({
			url:'cartToDb.php',
			data:$('#toDbForm').serialize(),
			type:'POST',
			dataType:'text',
			success: function (data) {
				// alert('下單成功');
				$('#thanksMsgBox').css({"display":"block"});
				$('#gearOrderDetails').css({"display":"none"});
				$('#shoppingCartTable').css({"display":"none"});
				$('#paymentNaddress').css({"display":"none"});
				$('.stepsBox4').css({"background-color":"rgba(200,200,200,.5)"});
					$.ajax({
					url: 'thanks.php',					
					dataType: 'text',		
					success: function(data){
						$('#thanksMsgBox').html(data);
					}
			   });
			}

		})
	})

</script>
<!-- payment and shipping end -->
<!--跳窗 start-->
<!-- check out alert end -->
</body>
</html>