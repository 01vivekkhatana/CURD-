 jQuery('#frm').validate({
 	rules:{
 		name:{
 			required:true,
 			 name:true
 		},
 		email:{
 			required:true,
 			email:true
 		},
         address:{
             required:true,
 address:true

      }
		
	},
    messages:{
		name:{
 			required:"please enter name",
			
 		},
 		email:{
 			required:"please enter email",
			
		},
        address:{
			required:"please enter address",
			
		},
		
	},
 	submitHandler:function(form){
 		form.submit();
 	}
 });