$(document).ready(function(){


    $('.formVal').focus(function(){
        $(this).prev().css('transform','translateY(-30px)');
        $(this).prev().css('fontSize','16px');
    })
    $('.formVal').blur(function(){
        if($(this).val()==''){
            $(this).prev().css('transform','translateY(0)');
            $(this).prev().css('fontSize','22px');
        }
    })
    $('#add').click(function(){
        $('.addLightBox').fadeIn(500);
    })
    $('#closeLb').click(function(){
        $('.addLightBox').fadeOut(500);
    })
    
});


function doFirst(){
    document.getElementById('thefile').onchange = fileChange;
}
function fileChange(){
    var file = document.getElementById('thefile').files[0];
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
        var image = document.getElementById('image');
        image.src = this.result;
        image.style.maxWidth = '300px';
        image.style.maxHeight = '300px';
    });
}
window.addEventListener('load',doFirst);

