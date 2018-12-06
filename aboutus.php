<?PHP 
ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" type="text/css" href="css/about.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/ico.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="./libs/jquery/dist/jquery.min.js"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/memlogin.js"></script>
	<title>關於我們</title>
</head>


<body class="content loading">
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
			     <li><a class="cucustonav" href="customWetsuitSex.php">客製潛水衣</a></li>
			     <li><a href="divinggear.php">潛水裝備</a></li>
			     <li><a href="wholeActivity.php">活動總覽</a></li>
			     <li><a href="coach.php">教練團隊</a></li>
			     <li><a href="chBot.php">教練諮詢</a></li>
			     <li class="thispage"><a href="aboutus.php">關於我們</a></li>
			     <li><a href="FishingGarbage.php">守護海洋</a></li>
			    </ul>
			</div>
		</label>	
	</div>
</nav>
<!--nav end-->

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

<!--內容 start-->
<div class="aboutUs">
	<div class="abLetter">
		<div class="abLetterSection">
			<h1 class="abLetterText">SeaTunnel</h1>
		</div>
	</div>
    <h2 class="abText">
        在這個資訊爆炸的年代，由工業邁向科技的時代。<br><br>
		你是否曾幻想著也許有塊淨土，或許有座樂園，未曾遭受汙染。<br><br>
		在汪洋中靜靜地渡過一次次日出日落，一個個春夏秋冬。<br><br>
    </h2>
</div>
<main>
	<div class="abTimeWrap">
		<h1 class="abTimeTitle">里程碑</h1>
	</div>
	<section id="timeline">
	    <article>
	      <div class="inner">
	        <span class="date">
	            <span class="day">05<sup>th</sup></span>
	            <span class="month">Jul</span>
	            <span class="year">2018</span>
	        </span>
	        <h2>發現覓淨</h2>
	        <p>七位探險家於旅程中發現一座無人的美麗島嶼。</p>
	      </div>
	    </article>
	    <article>
	      <div class="inner">
	        <span class="date">
	            <span class="day">07<sup>th</sup></span>
	            <span class="month">Aug</span>
	            <span class="year">2018</span>
	        </span>
	        <h2>藍圖定案</h2>
	        <p>多次審慎討論如何打造此樂園淨土。</p>
	      </div>
	    </article>
	    <article>
	      <div class="inner">
	        <span class="date">
	            <span class="day">27<sup>th</sup></span>
	            <span class="month">Aug</span>
	            <span class="year">2018</span>
	        </span>
	        <h2>硬體驗收</h2>
	        <p>建築工事完成，驗收後開始籌備裝潢及各項設施。</p>
	      </div>
	    </article>
	    <article>
	      <div class="inner">
	        <span class="date">
	            <span class="day">12<sup>nd</sup></span>
	            <span class="month">Sept</span>
	            <span class="year">2018</span>
	        </span>
	        <h2>軟體驗收</h2>
	        <p>裝潢及各項設施完工，將於測試後隨即迎接首批旅客。</p>
	      </div>
	    </article>
	    <article>
	      <div class="inner">
	        <span class="date">
	            <span class="day">14<sup>th</sup></span>
	            <span class="month">Sept</span>
	            <span class="year">2018</span>
	        </span>
	        <h2>開放覓淨</h2>
	        <p>島嶼構築完成，為熱愛海洋的旅人們提供一處休憩的天堂。</p>
	      </div>
	    </article>
	</section>
	<div class="abPater">
		<div class="pater">
			<svg class="pater__svg" width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 280 800" data-path-hover="M 0,0 280,0 280,800 0,800 Z">
				<clipPath id="pater-clip">
					<path d="M 0,0 280,0 0,400 0,800 Z" overflow="visible"/>
				</clipPath>
				<g class="pater__clip" clip-path="url(#pater-clip)">
					<image overflow="visible" width="100%" height="100%" preserveAspectRatio="xMinYMin slice" xlink:href="#"></image>
				</g>
			</svg>
			<div class="pater__content">
				<img class="pater__logo" src="#">
				<span class="pater__title"></span>
				<span class="pater__more"></span>
				<div class="pater__hover">
					<div></div>
					<div></div>
					<div></div>
					<a class="pater__link" href="#" rel="nofollow"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="abTimeWrap">
		<h1 class="abTimeTitle">團隊成員</h1>
	</div>
    <section class="abContent">
        <div class="abTilt abTilt1">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/ywj.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">游文君</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
                </figcaption>
                <svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M10,40h250v180h-250V40z" />
                </svg>
            </figure>
        </div>
        <div class="abTilt abTilt2">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/hyl.jpeg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">黃雅莉</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
                </figcaption>
                <svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M20,20h200v260h-200V20z" />
                </svg>
            </figure>
        </div>
        <div class="abTilt abTilt8">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/tyf.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">鄧玉芳</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
				</figcaption>
				<svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M10,30h260v185h-260V50z" />
                </svg>
            </figure>
        </div>
        <div class="abTilt abTilt3">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/hys.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">黃語萱</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
                </figcaption>
                <svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M50,50h180v200h-180V50z" />
                </svg>
            </figure>
        </div>
    </section>
    <section class="abContent">
        <div class="abTilt abTilt5">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/zhy.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">曾弘宇</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
                </figcaption>
                <svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M20,100h260v100h-260V100z" />
                </svg>
            </figure>
        </div>
        <div class="abTilt abTilt6">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/cyc.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">邱彥齊</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
                </figcaption>
                <svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M70,20h160v260h-160V70z" />
                </svg>
            </figure>
        </div>
        <div class="abTilt abTilt7">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/cdc.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">陳鐸中</h3>
                    <p class="abTiltDesc">Front-end Developer</p>
                </figcaption>
                <svg class="abTiltDeco abTiltDecoLines" viewBox="0 0 300 300">
                    <path d="M50,30h200v250h-200V50z" />
                </svg>
            </figure>
        </div>
        <!-- <a href="#" class="abJoin">
            <figure class="abTiltFig">
                <img class="abTiltImg" src="./images/iu08.jpg">
                <div class="abTiltDeco abTiltDecoShine"><div></div></div>
                <div class="abTiltDeco abTiltDecoOverlay"></div>
                <figcaption class="abTiltCap">
                    <h3 class="abTiltTitle">JOIN</h3>
                    <p class="abTiltDesc">Our Career</p>
                </figcaption>
            </figure>
        </a> -->
	</section>
</main>
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

<script src="./js/aboutus/anime.min.js"></script>
<script src="./js/aboutus/imagesloaded.pkgd.min.js"></script>
<script src="./js/aboutus/main.js"></script>
<script src="./js/aboutus/charming.min.js"></script>
<script src="./js/aboutus/letterscroll.js"></script>
<script>
	(function() {
		var tiltSettings = [
		{},
		{
			movement: {
				imgWrapper : {
					translation : {x: 10, y: 10, z: 30},
					rotation : {x: 0, y: -10, z: 0},
					reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
				},
				lines : {
					translation : {x: 10, y: 10, z: [0,70]},
					rotation : {x: 0, y: 0, z: -2},
					reverseAnimation : {duration : 2000, easing : 'easeOutExpo'}
				},
				caption : {
					rotation : {x: 0, y: 0, z: 2},
					reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
				},
				overlay : {
					translation : {x: 10, y: -10, z: 0},
					rotation : {x: 0, y: 0, z: 2},
					reverseAnimation : {duration : 2000, easing : 'easeOutExpo'}
				},
				shine : {
					translation : {x: 100, y: 100, z: 0},
					reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
				}
			}
		},
		{
			movement: {
				imgWrapper : {
					rotation : {x: -5, y: 10, z: 0},
					reverseAnimation : {duration : 900, easing : 'easeOutCubic'}
				},
				caption : {
					translation : {x: 30, y: 30, z: [0,40]},
					rotation : {x: [0,15], y: 0, z: 0},
					reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
				},
				overlay : {
					translation : {x: 10, y: 10, z: [0,20]},
					reverseAnimation : {duration : 1000, easing : 'easeOutExpo'}
				},
				shine : {
					translation : {x: 100, y: 100, z: 0},
					reverseAnimation : {duration : 900, easing : 'easeOutCubic'}
				}
			}
		},
		{
			movement: {
				imgWrapper : {
					rotation : {x: -5, y: 10, z: 0},
					reverseAnimation : {duration : 50, easing : 'easeOutQuad'}
				},
				caption : {
					translation : {x: 20, y: 20, z: 0},
					reverseAnimation : {duration : 200, easing : 'easeOutQuad'}
				},
				overlay : {
					translation : {x: 5, y: -5, z: 0},
					rotation : {x: 0, y: 0, z: 6},
					reverseAnimation : {duration : 1000, easing : 'easeOutQuad'}
				},
				shine : {
					translation : {x: 50, y: 50, z: 0},
					reverseAnimation : {duration : 50, easing : 'easeOutQuad'}
				}
			}
		},
		{
			movement: {
				imgWrapper : {
					translation : {x: 0, y: -8, z: 0},
					rotation : {x: 3, y: 3, z: 0},
					reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
				},
				lines : {
					translation : {x: 15, y: 15, z: [0,15]},
					reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
				},
				overlay : {
					translation : {x: 0, y: 8, z: 0},
					reverseAnimation : {duration : 600, easing : 'easeOutExpo'}
				},
				caption : {
					translation : {x: 10, y: -15, z: 0},
					reverseAnimation : {duration : 900, easing : 'easeOutExpo'}
				},
				shine : {
					translation : {x: 50, y: 50, z: 0},
					reverseAnimation : {duration : 1200, easing : 'easeOutExpo'}
				}
			}
		},
		{
			movement: {
				lines : {
					translation : {x: -5, y: 5, z: 0},
					reverseAnimation : {duration : 1000, easing : 'easeOutExpo'}
				},
				caption : {
					translation : {x: 15, y: 15, z: 0},
					rotation : {x: 0, y: 0, z: 3},
					reverseAnimation : {duration : 1500, easing : 'easeOutElastic', elasticity : 700}
				},
				overlay : {
					translation : {x: 15, y: -15, z: 0},
					reverseAnimation : {duration : 500,easing : 'easeOutExpo'}
				},
				shine : {
					translation : {x: 50, y: 50, z: 0},
					reverseAnimation : {duration : 500, easing : 'easeOutExpo'}
				}
			}
		},
		{
			movement: {
				imgWrapper : {
					translation : {x: 5, y: 5, z: 0},
					reverseAnimation : {duration : 800, easing : 'easeOutQuart'}
				},
				caption : {
					translation : {x: 10, y: 10, z: [0,50]},
					reverseAnimation : {duration : 1000, easing : 'easeOutQuart'}
				},
				shine : {
					translation : {x: 50, y: 50, z: 0},
					reverseAnimation : {duration : 800, easing : 'easeOutQuart'}
				}
			}
		},
		{
			movement: {
				lines : {
					translation : {x: 40, y: 40, z: 0},
					reverseAnimation : {duration : 1500, easing : 'easeOutElastic'}
				},
				caption : {
					translation : {x: 20, y: 20, z: 0},
					rotation : {x: 0, y: 0, z: -5},
					reverseAnimation : {duration : 1000, easing : 'easeOutExpo'}
				},
				overlay : {
					translation : {x: -30, y: -30, z: 0},
					rotation : {x: 0, y: 0, z: 3},
					reverseAnimation : {duration : 750, easing : 'easeOutExpo'}
				},
				shine : {
					translation : {x: 100, y: 100, z: 0},
					reverseAnimation : {duration : 750, easing : 'easeOutExpo'}
				}
			}
		}];

        function init() {
			var idx = 0;
			[].slice.call(document.querySelectorAll('div.abTilt')).forEach(function(el, pos) { 
				idx = pos%2 === 0 ? idx+1 : idx;
				new TiltFx(el, tiltSettings[idx-1]);
			});
		}

		// Preload all images.
		imagesLoaded(document.querySelector('main'), function() {
			document.body.classList.remove('loading');
			init();
		});

        var pater = document.querySelector('.pater'),
			paterSVG = pater.querySelector('.pater__svg'),
			pathEl = paterSVG.querySelector('path'),
			paths = {default: pathEl.getAttribute('d'), active: paterSVG.getAttribute('data-path-hover')};
			pater.addEventListener('mouseenter', function() {
				anime.remove(pathEl);
				anime({
					targets: pathEl,
					d: paths.active,
					duration: 400,
					easing: 'easeOutQuad'
				});
			});

			pater.addEventListener('mouseleave', function() {
				anime.remove(pathEl);
				anime({
					targets: pathEl,
					d: paths.default,
					duration: 400,
					easing: 'easeOutExpo'
				});
			});
		})();

</script>
</body>
</html>