<?php 
     include("base.php");
     include("header.php");
  
     if(!isset($_SESSION['user']))
     {
        header("location:auth.php");
        $_SESSION['error']="Please Login";
     }
     
      
     $user = $_SESSION['user'] ;
     if (isset($_POST["submit"]))
     {  $password = $_POST["password"];  
        $new_pwd = $_POST["changed_pass"];
        $ret = mysqli_query($con , "update login_details set pwd = '$new_pwd' where user_name = '$user' and pwd = '$password'");
        unset($_SESSION['user']);
        header('location:auth.php');
     }
     
     ?>
<html>
    <body>
        <div class="container">
        <form method="POST">
        <table id="update_pass">
            <tr>
                <td>PASSWORD:</td>
                <td><input type="password" id="pass" placeholder="mypassword" name="password"></td><br/><br/>
            </tr>
            <tr>
                 <td>CHANGE PASSWORD:</td>
                <td><input type="password" id="pass" placeholder="mypassword" name="changed_pass" onkeyup="password_validation('pass','passerror','passval')"></td>
                             <div style="color:red; font-size:13px;"id="passerror"> </div>
                                                <div style="color:red; font-size:13px;"id="passval"></div>
                
            </tr>
            

        </table><br/>
                             <input style="margin-left:50%;"class="btn btn-primary btn-lg" type="submit" name="submit" value="submit">
        </form>
        </div>
        <script>
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
                function disable_on()
                     {
                          document.getElementById('submit').setAttribute("disabled", true);
                     }
            function disable_off()
                     {
                          document.getElementById('submit').removeAttribute("disabled");
                     }
        </script>
    </body>
</html>