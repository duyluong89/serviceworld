$(function(){
	$("#btn-login").bind("click",function(e){
		 e.preventDefault();
		$("#form-login").bPopup({
			modalClose: false,
			zIndex: 9999,
			onClose: function(){
				
			}
		});
	});
	
	$('.btn-login').click(function(){
		var msg = "";
		$('.error').empty();
		var u = $('#username');
		var p = $('#password');
		var userName = u.val();
		var password = p.val();
		if(userName.length <= 0){
			msg = "UserName is empty.";
			$('.error-username').empty();
			$('.error-username').append(msg);
			u.focus();
			return false;
			
		}else if(password.length <= 0 ){
			msg = "Password is empty.";
			$('.error-password').empty();
			$('.error-password').append(msg);
			return false;
		}else{
			var linkPost = $('form#f-login').attr('action');
			var dataPost = {
					username: userName,
					password: password
			};
			$.ajax({
				url: linkPost,
				type: 'POST',
				dataType: 'json',
				data: dataPost
			}).done(function(msg){
				if(msg.response !== false){
					$("#btn-login").html('Welcome ' + msg.user.userName + '!');
					$("#form-login").bPopup().close();
				}else{
					msg = "Login fail!, please check your username or password"; 
					$('#loginfail').append(msg);
				}
			}).fail(function(){
				alert('login fail!');
			});
		}
		return false;
	});
	$('#username').change(function(){
		$('.error-username').empty();
	});
	$('#password').change(function(){
		$('.error-password').empty();
	});
	
	$('.table').dataTable();
});