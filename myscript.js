$(document).ready(function() {
	// get current URL path and assign 'active' class
	var pathname = location.pathname;
	var seprated = pathname.split('/');
	var len = seprated.length;
	$('#header nav li').removeClass('active_nav');
	$('.nav > li > a[href="'+seprated[len-1]+'"]').parent().addClass('active_nav');
})

function disable_project()
 {   
    if(
        document.getElementById("text_error").innerHTML== ""&&
	   document.getElementById("text_val").innerHTML== "" &&
		document.getElementById("project_error").innerHTML== "" && 
		document.getElementById("project_val").innerHTML== "" 
		
	)
	{   
	    
		document.getElementById("submit").removeAttribute("disabled");
	}
	 else
		 {
			 
			 document.getElementById("submit").disabled=true;
		 }
 }



function disable_register()
 {   
    if(
        document.getElementById("username_error").innerHTML== ""&&
	   document.getElementById("username_val").innerHTML== "" &&
		document.getElementById("pass_error").innerHTML== "" && 
		document.getElementById("pass_val").innerHTML== "" &&
		document.getElementById("firstname_error").innerHTML=="" &&
		document.getElementById("firstname_val").innerHTML== "" &&
		document.getElementById("lastname_val").innerHTML== "" &&
		document.getElementById("lastname_error").innerHTML== "" &&
		document.getElementById("email_error").innerHTML== "" &&
		document.getElementById("email_val").innerHTML== "" &&
		document.getElementById("college_error").innerHTML== "" 
	)
	{   
	    
		document.getElementById("submit").removeAttribute("disabled");
	}
	 else
		 {
			 
			 document.getElementById("submit").disabled=true;
		 }
 }
function space_check(id, error_id)
{
  var val =document.getElementById(id).value ;

	if (val.trim() == "")
	  {  
		  document.getElementById(error_id).innerHTML="Leading space is not allowed!";
		  document.getElementById(id).value = val.trim();
		   
		  }
	  
	else
	  { document.getElementById(error_id).innerHTML="";
		}
   

}






function user_validation(id, error_id, error_val)
{   var val =document.getElementById(id).value ;
  
  space_check(id,  error_id);
//   length_check(id, error_len);
  var reg = /^[a-zA-Z0-9][a-zA-Z0-9.\-_$@*!]{2,9}$/;
  if (!reg.test(val))
	  {
		  document.getElementById(error_val).innerHTML="username must have first letter alphanumeric!<br> Only alpanumeric and special characters and length <br> must be between 3 to 10!";
		 
		   
	  }

  else
	  {
		   document.getElementById(error_val).innerHTML="";
		  
		  
	  }
 disable_register();
}




function pass_validation(id, error_id, error_val)
{   var val =document.getElementById(id).value ;
	space_check(id,  error_id);
//	length_check(val, error_len);
	var reg=/^(?=.*\d)[a-zA-Z\d_@./#&+-]{8,13}$/; 
	if(!reg.test(val))
		{
			document.getElementById(error_val).innerHTML = "Password must consist of alphanumeric character and special characters and must have length in between 8 and 13 ! ";
			 
			
		}
   else
	   {
		   
			document.getElementById(error_val).innerHTML = "";
		    
		  
	   }
 disable_register();
}







function name_validation(id, error_id, error_val)
{
	space_check(id, error_id);
	var val = document.getElementById(id).value;
	var reg = /^[A-Za-z]+$/;
	if (!reg.test(val))
		{
			document.getElementById(error_val).innerHTML="This field can only have alphabets!";
			
			
		}
	else
		{
			document.getElementById(error_val).innerHTML="";
			
			
		}
	disable_register();

}




function email_validation(id, error_id, error_val)
{   var val = document.getElementById(id).value;
  space_check(id, error_id);
  var reg =/^[a-zA-Z0-9]+\.*[a-zA-Z0-9]*@[a-zA-Z0-9]+\.*[a-zA-Z0-9]+$/;
  if(!reg.test(val))
	  {
		  document.getElementById(error_val).innerHTML="Email must consist of @ and .";
		  
		 
	  }
else
	{
		document.getElementById(error_val).innerHTML="";
		
		
	}
 disable_register();

}


function projectname_validation(id, error_id,error_val)
{   
	var val =document.getElementById(id).value;
	space_check(id, error_id);
	var reg = /^[a-zA-Z0-9]+[a-zA-Z0-9-_ ]*$/;
	if(!reg.test(val))
		{
			document.getElementById(error_val).innerHTML="only alphanumeric, hypen and underscore characters are allowed! ";
			 
			
		}
	else
		{
			document.getElementById(error_val).innerHTML="";
			

			
		}

disable_project();
}

function description_validation(id, error_id,error_val)
{   
	var val =document.getElementById(id).value;
	space_check(id, error_id);
	var reg = /^[a-zA-Z0-9]+[a-zA-Z\d _!@.)(/#&+-]{100,25000}$/;
	if(!reg.test(val))
		{
			document.getElementById(error_val).innerHTML="only alphanumeric characters and specialchacter are allowed are allowed!<br>leading special charcters are not allowed!<br>also your description must be in between 10 to 250 words ";
			 
			
		}
	else
		{
			document.getElementById(error_val).innerHTML="";
			

			
		}
disable_project();

}

function college_validation(id, error_id, error_val)
{   var val =document.getElementById(id).value ;
  space_check(id,  error_id);
  var reg = /^[A-Za-z]+[A-Za-z]+$/;
  if (!reg.test(val))
	  {
		  document.getElementById(error_val).innerHTML="This field only accept the text with alphabets and spaces in between !";
		  
		   
	  }

  else
	  {
		   document.getElementById(error_val).innerHTML="";
		  
		  
	  }
 disable_register();
}





             