// Loading畫面 javascript start
$(function (){
    setTimeout(function () {   
        var loader = document.getElementsByClassName("culoading")[0];
        loader.className = "culoading fadeout"; //使用漸隱的方法淡出loading page
        setTimeout(function () {       
            loader.style.display = "none"
        }, 1000)
    }, 3500) //強制顯示loading page 1s
});
// Loading畫面 javascript end