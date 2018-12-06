var degree = 0;
var size = 1;
function doFirst(){
	
	//先跟HTML畫面產生關聯	
	largeButton = document.getElementById('culargeButton');
	smallButton = document.getElementById('cusmallButton');
	turnrightButton = document.getElementById('cuturnrightButton');
	turnleftButton = document.getElementById('cuturnleftButton');
	deleteButton = document.getElementById('cudeleteButton');
	document.getElementById('cuupfile').onchange = fileChange;

	// 再建事件聆聽的功能
	largeButton.addEventListener('click',large);
	smallButton.addEventListener('click',small);
	turnrightButton.addEventListener('click',turnright);
	turnleftButton.addEventListener('click',turnleft);
	deleteButton.addEventListener('click',del);
	
	$("#cuWetsuitImg").draggable({ 
		containment: "#containment-wrapper", 
  		scroll: false ,
  		stop: function () {
   		changlogo();
  		}
 	});
}
function large(){
	size += 0.1;
	$("#cuWetsuitImg").css("transform",`scale(${size}) rotate(${degree}deg)`);
	changlogo();
};
function small(){
	size -= 0.1;
	$("#cuWetsuitImg").css("transform",`scale(${size}) rotate(${degree}deg)`);
	changlogo();
};
function turnright(){	
	degree += 30;
	$("#cuWetsuitImg").css("transform",`scale(${size}) rotate(${degree}deg)`);
	changlogo();
};
function turnleft(){
	degree -= 30;
	$("#cuWetsuitImg").css("transform",`scale(${size}) rotate(${degree}deg)`);
	changlogo();
};
function del(){	
	var image = document.getElementById('cuWetsuitImg');
	image.src = "";
	degree = 0;
	size = 1;	
	$("#cuWetsuitImg").css("transform",`rotate(${degree}deg) scale(${size})`);
	$('.culogobtn').css('backgroundColor','transparent');
	
	$(".cuImg").html("<p class='cuImgPrice'></p>");
	$(".cuImgPrice").html("");
	Pricedelete();
	changlogo();
};
function change(img){
	let image = document.getElementById('cuWetsuitImg');
	image.src = img.src;
	image.style.maxWidth = '60px';
	// image.style.maxHeight = '80px';
	changlogo();
};
function fileChange(){
	var file = document.getElementById('cuupfile').files[0];
	var readFile = new FileReader();
	readFile.readAsDataURL(file); 
	readFile.addEventListener('load',function(e){
		var image = document.getElementById('cuWetsuitImg');
		image.src = this.result;
		image.style.maxWidth = '60px';
		// image.style.maxHeight = '80px';
		var message = '';
		message += file.name.slice(0, 15);
		document.getElementsByClassName('cuImg')[0].innerHTML = message + "<span class='cuImgPrice'>3000</span>";
		Pricetotal();
		changlogo();		
	});
};
window.addEventListener('load',doFirst);

