<?php
           session_start(); 
          include("base.php"); 
        
        $_SESSION['message']="";
             $error_user = " ";  
            if(isset($_POST["submit"]))
              {
			
                $username=$_POST["username"];


                $password = $_POST["password"];

                $firstname = $_POST["firstname"];


                $lastname = $_POST["lastname"];


                $email_id = $_POST["email_id"];
				
				$college = $_POST["college"];
				
				$education = $_POST["education"];
				
				 $authen = mysqli_query($con,"select * from login_details where user_name='$username' or user_mail ='$email_id' ") ; 
				$row = mysqli_num_rows($authen);
				   if($row == 0)
				   {   
					 
						$ins = mysqli_query($con,"insert into `login_details`(user_name, pwd, first_name, last_name, college, education, user_mail ) values ( '$username', '$password', '$firstname', '$lastname', '$college', '$education', '$email_id' ) " );


						if($ins)
						   {    $_SESSION['message'] = "Congratulation! you are registered. Please login now .";
							 header('Location:auth.php');

						   }
						else
						{    echo("<h2 align-self = 'center'>error</h2>");

							$_SESSION['message']="";
						   printf("Error: %s\n", mysqli_error($con));

					}}
				else
				    {
					$error_user = "Sorry, either this username or email is already registered";
				}


            }

        ?>
    <html>
<head>
<?php include("base.html") ?>
</head>

    <body>
         <?php include("header.php"); ?>

            <div class="flex-container">
                 
                 
                    <div  class="panel "  >

                        <div class="panel-heading">
                            <h3  style = "font-size:3rem;">REGISTER YOURSELF!</h3>
                        </div>
                      
                        <div class = "panel-body">
                               <form method="POST" style = "padding : 0.5em;"> 
								   <h6 style="text-align:center; color:red;"><?php echo($error_user);?></h6>
                                        <div class= "form-group">
                                         <lable for= "username"> USERNAME: </lable>
                                            <input id="username" class="form-control" type="text" placeholder="username" name="username" onkeyup= "user_validation('username' , 'username_error', 'username_val')"  required> </div> 
                                                 <div style="color:red;font-size:12px;"id="username_error"> </div>
                                                 <div style="color:red;font-size:12px;"id="username_val"> </div>
                                                                             
                                            <lable for="pass" class="control-lable"> PASSWORD:</lable>
                                             <input type="password" class="form-control" id="pass" placeholder="mypassword" name="password" required onkeyup= "pass_validation('pass', 'pass_error','pass_val')"> 
                                                 <div style="color:red;font-size:13px;" id="pass_error"></div>

                                                 <div style="color:red;font-size:13px;" id="pass_val"></div>
                                     
                                       
                                          <lable for="first_name" class= "control-lable"> FIRST NAME:</lable>
                                          <input type="text" class="form-control" id="first_name" placeholder="first name" name="firstname" onkeyup= "name_validation( 'first_name', 'firstname_error', 'firstname_val' )"  required>
                                            <div style="color:red;font-size:13px;"id="firstname_error"> </div>
                                                <div style="color:red;font-size:13px;"id="firstname_val"> </div>
                                           
                                             
                                              <lable for = "last_name" class= "control-lable">LAST NAME:</lable>
                                              <input  id="last_name" class="form-control" type="text" placeholder="last name" name="lastname"  onkeyup= "name_validation( 'last_name', 'lastname_error', 'lastname_val' )" required> 
                                               <div style="color:red; font-size:13px;" id="lastname_error"></div>
                                                <div style="color:red;font-size:13px;"id="lastname_val"> </div>
								   
												<lable for = "institute" class= "control-lable">COLLEGE:</lable>
                                              <input  id="institute" class="form-control" type="text" placeholder=" your institute name here" name="college"  onkeyup= "college_validation('institute' , 'college_error', 'college_val')" required> 
                                               <div style="color:red; font-size:13px;" id="college_error"></div>
								                 <div style="color:red; font-size:13px;" id="college_val"></div>
												 
								              <lable for= "stream">EDUCATION :</lable>
												  <select class="form-control" name="education" id="stream">
												      <option value="B.A">B.A</option>
													  <option value="BSc">BSc</option>
													  <option value="Computer Enggineering(Btech)">Computer Enggineering(Btech)</option>
													  <option value="Electronics(Btech)">Electronics(Btech)</option>
													  <option value="Diploma">Diploma</option>
												  </select>
                                         
                                            
                                             <lable for = "email" >EMAIL ID:</lable>
								   <input class="form-control" type="text" id="email" placeholder="user@mail.com" name="email_id" required  onkeyup= "email_validation('email', 'email_error', 'email_val')"> 
                                                <div style="color:red; font-size:13px;"id="email_error"> </div>
                                                <div style="color:red; font-size:13px;"id="email_val"></div> 
                                                 <br/>
                                            <div class= "form-group" style = "text-align:center;">
												
                                        <input  id="submit" class="btn btn-danger" type="submit" value="SIGN UP" name="submit"></div>

                                </form >

                             <div class="pannel-footer"> <em>Already have a account?<a href="auth.php"> login </a> here.</em></div>

                       
                    </div></div>
                   
                    <div class="panel">
                        <div class="panel-heading">
                            <h3  style = "font-size:3rem;">ABOUT PROJECT MANAGEMENT</h3>
                        </div> 
                        <div class="panel-body">
								
	     <div class="content">
			 <p> The PROJECT HUB  provide the space to  keep <br>
				your project secured and safe . We also  provide <br>
				you chance to post your project on our home  page . <br>
				<br>
				      
				 Some of posted projects are given on home page , you may <br>
				 download them by clicking download button.......
			 </p></div>	</div></div></div>
                 
        
            </body>
        </html>