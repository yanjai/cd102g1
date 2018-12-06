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
    $('#addcolor').click(function(){
        $('.addcolorLightBox').fadeIn(500);
    })
    $('#closecolorLb').click(function(){
        $('.addcolorLightBox').fadeOut(500);
    })

    $('#addoffcial').click(function(){
        $('.addoffcialLightBox').fadeIn(500);
    })
    $('#closeoffcialLb').click(function(){
        $('.addoffcialLightBox').fadeOut(500);
    })
    
    $('#addwetsuit').click(function(){
        $('.addwetsuitLightBox').fadeIn(500);
    })
    $('#closewetsuitLb').click(function(){
        $('.addwetsuitLightBox').fadeOut(500);
    })

    $('#closeorderdesLb').click(function(){
        $('.custorderLightBox').fadeOut(500);
    })
});


function doFirst(){
    document.getElementById('thefile').onchange = fileChange;
    document.getElementById('theoffcialfile').onchange = fileoffcialChange;
    document.getElementById('thewetsuitfile').onchange = filewetsuitChange;
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
function fileoffcialChange(){
    var file = document.getElementById('theoffcialfile').files[0];
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
        var image = document.getElementById('offcialimage');
        image.src = this.result;
        image.style.maxWidth = '300px';
        image.style.maxHeight = '300px';
    });
}
function filewetsuitChange(){
    var file = document.getElementById('thewetsuitfile').files[0];
    var readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
        var image = document.getElementById('wetsuitimage');
        image.src = this.result;
        image.style.maxWidth = '300px';
        image.style.maxHeight = '300px';
    });
}
window.addEventListener('load',doFirst);

