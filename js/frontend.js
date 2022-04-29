jQuery(document).ready(function($){
$('#front_submit').on('click',function(e){
		 $(".error").hide();
		        var hasError = false;
		        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		 
		        var emailaddressVal = $("#email").val();
		        if($('#firstname').val()===''){
		        	$('#firstname').after('<span class="error">Please enter your firstname.</span>');
		        	hasError = true;
		        }
		        if($('#lastname').val()===''){
		        	$('#lastname').after('<span class="error">Please enter your lastname.</span>');
		        	hasError = true;
		        }
		        if(emailaddressVal === '') {
		            $("#email").after('<span class="error">Please enter your email address.</span>');
		            hasError = true;
		        } else if(!emailReg.test(emailaddressVal)) {
		            $("#email").after('<span class="error">Enter a valid email address.</span>');
		            hasError = true;
		        }
		 		if($('#username').val()===''){
		        	$('#username').after('<span class="error">Please enter your username.</span>');
		        	hasError = true;
		        }
		        if($('#password').val()===''){
		        	$('#password').after('<span class="error">PLease Enter your password.</span>');
		        	hasError = true;
		        }
		         if($('#address').val()===''){
		        	$('#address').after('<span class="error">Please enter your address.</span>');
		        	hasError = true;
		        }
		        if(hasError == true) { 
		        	e.preventDefault();
		        	return false; 
		        }
		 
	});
});