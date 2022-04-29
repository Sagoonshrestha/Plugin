jQuery(document).ready(function($){

	$('#checkbox').on('change', function(e){
		if(this.checked)  {
        //Do stuff
        	$('.field').show();
        	
    	} else { 
    		$('.field').hide();
    	}
	});
    $('.submit_settingss').on('click', function(e){
        $('.error').hide();
        // var haserror=false;
        if($('#field1').val() === ''){
            $('#field1').after('<span class=error>enter the field1</span>');
            e.preventDefault();
        }
        if($('#field2').val() === ''){
            $('#field2').after('<span class=error>enter the field2</span>');
            e.preventDefault();
        }
    });
	$('#message').on('change', function(e){
		if(this.checked) {
        //Do stuff
        	$('.rows').show();
        	$('.cols').show();
    	} else { 
    		$('.rows').hide();
    		$('.cols').hide();
    	}		
	});
	$('#customlabel').on('change',function(e){
		if(this.checked){
			$('.labels').show();
		}else{
			$('.labels').hide();
		}
	});
}); // jQuery document ready