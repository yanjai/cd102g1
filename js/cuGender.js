var storage = sessionStorage;
// console.log('1');

$(function(){
	function getGender(e){
	e.preventDefault();
	storage['gender'] = $(this).data('val');
	location.href = 'customWetsuit.php';
	// console.log('2');
	}
	$('.cugender').on('click',getGender);
	$('.cuBig').on('click',getGender);
})
