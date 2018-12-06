var storage = sessionStorage;

$(function(){
	function getUserdata(e){
	e.preventDefault();
	storage['UserName'] = $('#cuUserName').val();
	storage['UserPhone'] = $('#cuUserPhone').val();
	storage['UserAddr'] = $('#cuUserAddr').val();
	
	// location.href = 'customWetsuitStep2.html';
	}
	$('.cuNext4').on('click',getUserdata);
})
