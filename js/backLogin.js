
function $id(id){
    return document.getElementById(id);
}	
function $id(id){
        return document.getElementById(id);
}
function showLoginForm(){
    //檢查登入bar面版上 spanLogin 的字是登入或登出
    //如果是登入，就顯示登入用的燈箱(lightBox)
    //如果是登出
    //將登入bar面版上，登入者資料清空 
    //spanLogin的字改成登入
    //將頁面上的使用者資料清掉
    if($id('spanLogin').innerHTML == "登入"){
        // $id('lightBox').style.display = 'block';
    }else{  //登出
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if( xhr.status == 200){
            $id('adminName').innerHTML = '&nbsp';
            // $id('spanLogin').innerHTML = '登入';             
        }else{
            alert( xhr.status);
        }
        
    }
    xhr.open("get","backLogout.php",true);
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
                document.getElementById("adminName").innerHTML = xhr.responseText;
                // document.getElementById("spanLogin").innerHTML = "登出";  
                
                // js轉跳頁
                window.location.href="/phpLab/seatunnel/admin.html";
                // window.location.open("admin.html");
                alert("成功登入覓淨後台");
            }

        }else{
            alert(xhr.status);
        }
    }

        xhr.open("Post", "backLogin.php", true);
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        var data_info = "adminId=" + document.getElementById("adminId").value 
                    + "&adminPsw="+ document.getElementById("adminPsw").value;
        xhr.send(data_info);

        //將登入表單上的資料清空，並隱藏起來
        // $id('lightBox').style.display = 'none';
        $id('adminId').value = '';
        $id('adminPsw').value = ''; 
}

function cancelLogin(){
    //將登入表單上的資料清空，並將燈箱隱藏起來
    // $id('lightBox').style.display = 'none';
    $id('adminId').value = '';
    $id('adminPsw').value = '';
}

function init(){
    //===設定spanLogin.onclick 事件處理程序是 showLoginForm

    // $id('spanLogin').onclick = showLoginForm;

    //===設定btnLogin.onclick 事件處理程序是 sendForm
    $id('btnLogin').onclick = sendForm;

    //===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
    // $id('btnLoginCancel').onclick = cancelLogin;

    //檢查是否已登入
    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if(xhr.status == 200){
            if( xhr.responseText !=""){ //己登入
            document.getElementById("adminName").innerHTML = xhr.responseText;
            // document.getElementById("spanLogin").innerHTML = "登出";  
            }
            
        }else{
            alert( xhr.status);
        }
    }
    xhr.open("get", "backGetLoginInfo.php", true);
    xhr.send(null);
}; //window.onload

window.onload=init;




    