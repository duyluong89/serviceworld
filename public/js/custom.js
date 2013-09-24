$(function(){
	$("#btn-login").bind("click",function(e){
		 e.preventDefault();
		$("#form-login").bPopup({
			modalClose: false,
			zIndex: 2,
			onClose: function(){
				
			}
		});
	});
	
});