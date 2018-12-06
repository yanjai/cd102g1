
$(function()}{


	$('.gearmenuItem').click(function(){
		$('.gearmenuItem').not(this).removeClass('gearactive');
		$(this).addClass('gearactive');

    });


    $("#zoomImg").elevateZoom({
			zoomWindowFadeIn: 100,
			zoomWindowFadeOut: 100,
			lensFadeIn: 500,
			lensFadeOut:500,
    });
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
        //

        $('#checkOutBox').click(function(){
			$('#paymentNaddress').css({"display":"block"});
			$('#shoppingCartTable').css({"display":"none"});
			$('#cartTotal').css({"display":"none"});
			$('#checkOutBox').css({"display":"none"});
			$('#keepshopping').css({"display":"none"});
			$('.stepsBox2').css({"background-color":"rgba(200,200,200,.5)"});
        }
	});
  
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

	$('#gearOrderConfirmed').click(function(){

		$('#thanksMsgBox').css({"display":"block"});
		$('#gearOrderDetails').css({"display":"none"});
		$('#shoppingCartTable').css({"display":"none"});
		$('#paymentNaddress').css({"display":"none"});
		$('.stepsBox4').css({"background-color":"rgba(200,200,200,.5)"});
		$(document).delay(200).queue(function(){
			$.ajax({
				url: 'thanks.php',					
				dataType: 'text',		
				success: function(data){
					$('#thanksMsgBox').html(data);
				}
		   });
		})

		document.getElementById("cartN").innerHTML = 0;
       
	});

});