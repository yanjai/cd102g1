// 登入 start
// <script>

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
		if($id('spanLogin').innerHTML == "登入" && $id('spanLogin2').innerHTML == "登入"){
		$id('memJump').style.display = 'block';
		}else{  //登出
		var xhr = new XMLHttpRequest();
		xhr.onload = function(){
			if( xhr.status == 200){
			$id('memName').innerHTML = '&nbsp';
			$id('spanLogin').innerHTML = '登入';
			$id('memName2').innerHTML = '&nbsp';
			$id('spanLogin2').innerHTML = '登入';  
			memNo = 0; 
			location.reload();           
			}else{
			alert( xhr.status);
			}
			
		}
		xhr.open("get","memLogout.php",true);
		xhr.send(null);

		}

	}//showLoginForm
	function sendStopRight(){
		//=====使用Ajax 回server端,取回登入者姓名, 放到頁面上    
		var xhr = new XMLHttpRequest();

		xhr.onload = function(){
			if( xhr.status == 200){  
				if(xhr.responseText=='0'){
					// alert(xhr.responseText);
					alert('查無此人');
				}else if(xhr.responseText=='1'){
					// alert(xhr.responseText);
					alert('您被停權了');
				}else{
					// alert(xhr.responseText);
					sendForm();
				}
			}else{
				alert(xhr.status);
			}
		}

		xhr.open("Post", "memStopRight.php", true);
		xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		var data_info = "memId=" + document.getElementById("memId").value 
					+ "&memPsw="+ document.getElementById("memPsw").value;
		xhr.send(data_info);
	}
	
	function sendForm(){
		//=====使用Ajax 回server端,取回登入者姓名, 放到頁面上    
		var xhr = new XMLHttpRequest();

		xhr.onload = function(){
		if( xhr.status == 200){  
			if( xhr.responseText.indexOf("NG") != -1){ //有NG
			alert("帳密錯誤");
			}else{	
				var member = JSON.parse(xhr.responseText); 
				document.getElementById("memName").innerHTML = member.memName;
				document.getElementById("spanLogin").innerHTML = "登出"; 
				document.getElementById("memName2").innerHTML = member.memName;
				document.getElementById("spanLogin2").innerHTML = "登出";
				memNo = member.memNo;	
				// document.getElementById("memName").innerHTML = xhr.responseText;
				// document.getElementById("spanLogin").innerHTML = "登出"; 
				location.reload();
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
		$id('spanLogin2').onclick = showLoginForm;
		//===設定btnLogin.onclick 事件處理程序是 sendForm
		$id('btnLogin').onclick = sendStopRight;
		// $id('btnLogin2').onclick = sendStopRight;
		//===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
		// $id('btnLoginCancel').onclick = cancelLogin;

		//檢查是否已登入
		var xhr = new XMLHttpRequest();
		xhr.onload = function(){
		if(xhr.status == 200){
			if( xhr.responseText !=""){ //己登入
			document.getElementById("memName").innerHTML = xhr.responseText;
			document.getElementById("spanLogin").innerHTML = "登出";
			document.getElementById("memName2").innerHTML = xhr.responseText;
			document.getElementById("spanLogin2").innerHTML = "登出";  
			}
			
		}else{
			alert( xhr.status);
		}
		}
		xhr.open("get", "getMemLoginInfo.php", true);
		xhr.send(null);
	}; //window.onload

	window.addEventListener('load',init,false);
	
// </script>
// 登入 end
	
	
// 跳窗 start
// <script>
	// Get the memberArea
	var modal = document.getElementById("memJump");

	// When the user clicks anywhere outside of the modalJump, close it
	window.onclick = function(event) {
		if (event.target == modal) {
		modal.style.display = "none";
		}
	}
// </script>
// 跳窗 end


// FB登入 start
// <script>
	// This is called with the results from from FB.getLoginStatus().
	function statusChangeCallback(response) {
		console.log('statusChangeCallback');
		console.log(response);
		// The response object is returned with a status field that lets the
		// app know the current login status of the person.
		// Full docs on the response object can be found in the documentation
		// for FB.getLoginStatus().
		if (response.status === 'connected') {
		// Logged into your app and Facebook.
		testAPI();
		} else {
		// The person is not logged into your app or we are unable to tell.
		document.getElementById('status').innerHTML = 'Please log ' +
			'into this app.';
		}
	}

	// This function is called when someone finishes with the Login
	// Button.  See the onlogin handler attached to it in the sample
	// code below.
	function checkLoginState() {
		FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
		});
	}

	window.fbAsyncInit = function() {
		FB.init({
		appId      : '1982289008497623',
		cookie     : true,  // enable cookies to allow the server to access 
							// the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.8' // use graph api version 2.8
		});

		// Now that we've initialized the JavaScript SDK, we call 
		// FB.getLoginStatus().  This function gets the state of the
		// person visiting this page and can return one of three states to
		// the callback you provide.  They can be:
		//
		// 1. Logged into your app ('connected')
		// 2. Logged into Facebook, but not your app ('not_authorized')
		// 3. Not logged into Facebook and can't tell if they are logged into
		//    your app or not.
		//
		// These three cases are handled in the callback function.

		FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
		});

	};

	// Load the SDK asynchronously
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	// Here we run a very simple test of the Graph API after login is
	// successful.  See statusChangeCallback() for when this call is made.
	function testAPI() {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		document.getElementById('status').innerHTML =
			'Thanks for logging in, ' + response.name + '!';
		});
	}
// </script>
// FB登入 end
