<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <link rel="stylesheet" type="text/css" href="css/member.css"> 
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <script src="libs/jquery/dist/jquery.min.js"></script>
  <script src="js/memlogin.js"></script>
<title>忘記密碼</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">

@media all and (max-width: 767px){
  .tdrline{
     display: none;
  }
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
          <li><a href="customWetsuit.php">客製潛水衣</a></li>
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
      <!-- <a href="memUpdate.html">登入</a>   --> 登入
    </button>
        <button class="member sign fbLog" type="button" id="btnFBLogin">FB登入</button>
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


<div class="contentArea" style="padding:100px">
  <table width="90%" border="0" align="center" style="color:#ccc" cellpadding="4" cellspacing="0">
    <!-- <tr>
      <td class="tdbline"><img src="images/logo.png" alt="會員系統" width="100" height="100"></td>
    </tr> -->
    <tr>
      <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr valign="top">
          <td class="tdrline"><p class="title">歡迎光臨網站會員系統</p>
            <p>感謝各位來到會員系統， 所有的會員功能都必須經由登入後才能使用，請您在右方視窗中執行登入動作。</p>
            <p class="heading"> 本會員系統擁有以下的功能：</p>
            <ol>
              <li>免費加入會員 。</li>
              <li>每個會員可修改本身資料。</li>
              <li>若是遺忘密碼，會員可由系統發出電子信函通知。</li>
              <li>管理者可以修改、刪除會員的資料。</li>
            </ol>
            <p class="heading">請各位會員遵守以下規則： </p>
            <ol>
              <li> 遵守政府的各項有關法律法規。</li>
              <li> 不得在發佈任何色情非法， 以及危害國家安全的言論。</li>
              <li>嚴禁連結有關政治， 色情， 宗教， 迷信等違法訊息。</li>
              <li> 承擔一切因您的行為而直接或間接導致的民事或刑事法律責任。</li>
              <li> 互相尊重， 遵守互聯網絡道德；嚴禁互相惡意攻擊， 漫罵。</li>
              <li> 管理員擁有一切管理權力。</li>
            </ol></td>
          <td width="200">
          <div class="boxtl"></div><div class="boxtr"></div><div class="regbox">
            
            <h3 class="heading">忘記密碼？</h3>
            <form name="form1" method="post" action="memPassMailGmail.php">
              <p>請輸入您申請的帳號，系統將自動產生一個十位數的密碼寄到您註冊的信箱。</p>
              <p>
                <strong>帳號</strong>：<br>
                <input name="memId" type="text" class="logintextbox" id="memId">

                <strong>信箱</strong>：<br>
                <input name="memEmail" type="text" class="logintextbox" id="memEmail">


              </p>
              <p align="center">
                <button type="submit" name="button" id="button">寄密碼信</button>
                <button type="button" name="button2" id="button2">回上一頁</button>
                <!-- <input type="submit" name="button" id="button" value="寄密碼信"> -->
                <!-- <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();"> -->
              </p>
            </form>
            <hr size="1" />
            <p class="heading">還沒有會員帳號?</p>
            <p>註冊帳號免費又容易</p>
            <p align="center"><a href="memRegister.html" style="color:#ffb242">馬上申請會員</a></p></div>
          <div class="boxbl"></div><div class="boxbr"></div></td>
        </tr>
      </table></td>
    </tr>
    
  </table>
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

<!--登入 start-->
<script>
  function $id(id){
    return document.getElementById(id);
  } 
  function $id(id){
      return document.getElementById(id);
    }
  function showLoginForm(){
    //檢查登入bar面版上 spanLogin 的字是登入或登出
    //如果是登入，就顯示登入用的燈箱(memJump)
    //如果是登出
    //將登入bar面版上，登入者資料清空 
    //spanLogin的字改成登入
    //將頁面上的使用者資料清掉
    if($id('spanLogin').innerHTML == "登入"){
    $id('memJump').style.display = 'block';
    }else{  //登出
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
      if( xhr.status == 200){
      $id('memName').innerHTML = '&nbsp';
      $id('spanLogin').innerHTML = '登入';             
      }else{
      alert( xhr.status);
      }
      
    }
    xhr.open("get","memLogout.php",true);
    xhr.send(null);

    }

  }//showLoginForm

  function sendForm(){
    //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上    
    var xhr = new XMLHttpRequest();

    xhr.onload = function(){
    if( xhr.status == 200){  
      if( xhr.responseText == "NG"){
      alert("帳密錯誤");
      }else{
      document.getElementById("memName").innerHTML = xhr.responseText;
      document.getElementById("spanLogin").innerHTML = "登出";  
      }

    }else{
      alert(xhr.status);
    }
    }

    xhr.open("Post", "memLogin.php", true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    var data_info = "memId=" + document.getElementById("memId").value 
          + "&memPsw="+ document.getElementById("memPsw").value;
    xhr.send(data_info);

    //將登入表單上的資料清空，並隱藏起來
    $id('memJump').style.display = 'none';
    $id('memId').value = '';
    $id('memPsw').value = '';
    
  }

  function cancelLogin(){
    //將登入表單上的資料清空，並將燈箱隱藏起來
    $id('memJump').style.display = 'none';
    $id('memId').value = '';
    $id('memPsw').value = '';
  }

  function init(){
    //===設定spanLogin.onclick 事件處理程序是 showLoginForm

    $id('spanLogin').onclick = showLoginForm;

    //===設定btnLogin.onclick 事件處理程序是 sendForm
    $id('btnLogin').onclick = sendForm;

    //===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
    $id('btnLoginCancel').onclick = cancelLogin;

    //檢查是否已登入
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
    if(xhr.status == 200){
      if( xhr.responseText !=""){ //己登入
      document.getElementById("memName").innerHTML = xhr.responseText;
      document.getElementById("spanLogin").innerHTML = "登出";  
      }
      
    }else{
      alert( xhr.status);
    }
    }
    xhr.open("get", "getMemLoginInfo.php", true);
    xhr.send(null);
  }; //window.onload

  window.onload=init;
  
</script>
<!--登入 end-->
  
  
<!--跳窗 start-->
<script>
  // Get the memberArea
  var modal = document.getElementById("memJump");

  // When the user clicks anywhere outside of the modalJump, close it
  window.onclick = function(event) {
    if (event.target == modal) {
    modal.style.display = "none";
    }
  }
</script>
<!--跳窗 end-->


</body>
</html>