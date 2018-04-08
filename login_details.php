
    <?php include("base.php"); 
          include("header.php");



            if(isset($_POST["submit"]))
              {
                $username=$_POST["username"];


                $password = $_POST["password"];

                $firstname = $_POST["firstname"];


                $lastname = $_POST["lastname"];


                $email_id = $_POST["email_id"];




                $ins = mysqli_query( $con,"insert into LOGIN_DETAILS ( user_name, pwd, first_name, last_name, user_mail ) values ( '$username', '$password', '$firstname', '$lastname', '$email_id' ) " );


                if($ins)
                     header('Location:auth.php');
                else
                    echo("error");

            }




        ?>
    <html>


    <body>

            <div class="container">


                    <div class="panel panel-danger " style="float:left;" >

                        <div class="panel-heading">
                            <h3>REGISTER YOURSELF!</h3>
                        </div>
                        <div class="panel-body"> 
                               <form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                                    <table  >
                                        <tr >

                                            <td  >USERNAME:</td>
                                            <td><input id="username" type="text" placeholder="username" name="username" onkeyup= "user_validation('username' , 'username_error', 'user_val')"  required> 
                                                 <div style="color:red;font-size:12px;"id="username_error"> </div>
                                                 <div style="color:red;font-size:12px;"id="user_val"> </div>
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>PASSWORD: </td>
                                             <td><input type="password" id="pass" placeholder="mypassword" name="password" required onkeyup= "pass_validation('pass', 'pass_error', 'pass_len','pass_val')"> 
                                                 <div style="color:red;font-size:13px;" id="pass_error"></div>
                                                  <div style="color:red;font-size:13px;"  id="pass_len"></div>
                                                 <div style="color:red;font-size:13px;" id="pass_val"></div>
                                             </td>
                                        </tr>


                                        <tr>
                                           <td>FIRST NAME:</td>
                                            <td><input type="text" id="first_name" placeholder="first name" name="firstname" onkeyup= "name_validation( 'first_name', 'firstname_err', 'firstname_val' )"  required>
                                            <div style="color:red;font-size:13px;"id="firstname_err"> </div>
                                                <div style="color:red;font-size:13px;"id="firstname_val"> </div></td>
                                        </tr>

                                        <tr>
                                            <td >LAST NAME: </td>
                                           <td><input  id="last_name" type="text" placeholder="last name" name="lastname"  onkeyup= "name_validation( 'last_name', 'lastname_error', 'lastname_val' )" required> 
                                               <div style="color:red; font-size:13px;" id="lastname_error"></div>
                                                <div style="color:red;font-size:13px;"id="lastname_val"> </div>
                                               </td>
                                        </tr>

                                        <tr style="padding:5px;">
                                            <td>EMAIL ID:</td>                    
                                            <td><input type="text" id="email" placeholder="user@mail.com" name="email_id" required  onkeyup= "email_validation('email', 'email_err', 'email_val')"> 
                                                <div style="color:red; font-size:13px;"id="email_err"> </div>
                                                <div style="color:red; font-size:13px;"id="email_val"></div> </td>
                                        </tr>
                                            </table><br/><br/>
                                        <input  id="submit" class="btn btn-danger" style="margin-left:100px;" type="submit" value="SIGN UP" name="submit"><br/><br/>

                                </form >

                             <div class="pannel-footer"> <em>Already have a account?<a href="auth.php"> login </a> here.</em></div>

                        </div>
                    </div>
                    <div class="panel panel-danger about_PM" style="float:right;" >
                        <div class="panel-heading">
                            <h3>ABOUT PROJECT MANAGEMENT</h3>
                        </div> 
                        <div class="panel-body">Project Management allows you to store your project
                                    safely and secured.	
                        </div>
                    </div>
                    </div>
        <script>
                function space_check(id, error_id)
                 {
                      var val =document.getElementById(id).value ;
                    
                      if (val.trim() == "")
                          {  
                              document.getElementById(error_id).innerHTML="space is not allowed!";
                              document.getElementById(id).value = val.trim();
                        
                              disable_on();
                          }
                     else
                        { document.getElementById(error_id).innerHTML="";
                          disable_off();
                        }
                 }
                function length_check(val, error_len)
                    {
                     
                        var len = val.length;
                        if (len < 8 )
                            {
                                document.getElementById(error_len).innerHTML= "length of password must be atleast eight";
                                disable_on();
                            }
                        else 
                           { document.getElementById(error_len).innerHTML= " ";
                            disable_off();
                           }
                    }
            function user_validation(id, error_id, error_val)
              {   var val =document.getElementById(id).value ;
                   
                  space_check(id,  error_id);
                  var reg = /^[A-Za-z]+[0-9]{1,3}$/;
                  if (!reg.test(val))
                      {
                          document.getElementById(error_val).innerHTML="username must end with numeric character!";
                          disable_on();
                      }
                  else
                      {
                           document.getElementById(error_val).innerHTML="";
                          disable_off();
                      }
              }
            function pass_validation(id, error_id, error_len, error_val)
                {   var val =document.getElementById(id).value ;
                    space_check(id,  error_id);
                    length_check(val, error_len);
                    var reg=/^(?=.*\d)[a-zA-Z\d_@./#&+-]{8,13}$/; 
                    if(!reg.test(val))
                        {
                            document.getElementById(error_val).innerHTML = "password must consist of alphanumeric character! ";
                            disable_on();
                        }
                   else
                       {
                            document.getElementById(error_val).innerHTML = "";
                            disable_off();
                       }
                }
             function disable_on()
                     {
                          document.getElementById('submit').setAttribute("disabled", true);
                     }
            function disable_off()
                     {
                          document.getElementById('submit').removeAttribute("disabled");
                     }
            function name_validation(id, error_id, error_val)
                    {
                        space_check(id, error_id);
                        var val = document.getElementById(id).value;
                        var reg = /^[A-Za-z]+$/;
                        if (!reg.test(val))
                            {
                                document.getElementById(error_val).innerHTML="This field can only have alphabets!";
                                disable_on();
                            }
                        else
                            {
                                document.getElementById(error_val).innerHTML="";
                                disable_off();
                            }
                    }
            function email_validation(id, error_id, error_val)
                  {   var val = document.getElementById(id).value;
                      space_check(id, error_id);
                      var reg =/^[a-zA-Z0-9]+\.*[a-zA-Z0-9]*@[a-zA-Z0-9]+\.*[a-zA-Z0-9]+$/;
                      if(!reg.test(val))
                          {
                              document.getElementById(error_val).innerHTML="Email must consist of @ and .";
                              disable_on();
                          }
                    else
                        {
                            document.getElementById(error_val).innerHTML="";
                            disable_off();
                        }
                  }
            
       </script>
            </body>
        </html>