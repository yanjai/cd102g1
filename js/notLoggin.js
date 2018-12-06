$(document).ready(function(){
    $('#reBtn').click(function(){
        $('#NotLogged').css('display','none');
    });
    $('#GoToBtn').click(function(){
        $('#NotLogged').css('display','none');
        showLoginForm();
    })
})
// if(<?php echo $_SESSION["memNo"]?>){
    
// 有會怎麼樣}esle{}