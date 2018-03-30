
<?php include("base.php"); 
    include("header.php");
   
 

        if(isset($_POST["submit"]))
          {
            $username=$_POST["username"];
            
            
            $password = $_POST["password"];
             
            $firstname = $_POST["firstname"];
            
        
            $lastname = $_POST["lastname"];

            
            $email_id = $_POST["email_id"];
         
        

            
            $ins = mysqli_query($con,"insert into LOGIN_DETAILS (user_name,pwd,first_name,last_name,user_mail) values ('$username','$password','$firstname','$lastname','$email_id')");
          
          
            if($ins)
                 header('Location:auth.php');
            else
                echo("error");
  
        }
      
       
              function test_input($data)
         {
             $data = trim($data);
             $data = stripslashes($data);
             $data = htmlspecialchars($data);
             return $data;
             
         }
      
    ?>
<html>

	   
<body>
    
      
                  
            <div class="container">
                
           
                <div class="panel panel-Warning " style="float:left;" >

                    <div class="panel-heading">
                        <h3>REGISTER YOURSELF!</h3>
                    </div>
                    <div class="panel-body"> 
                           <form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                                <table  >
                                    <tr >
                                     
                                        <td  >USERNAME:</td>
                                          <td><input id="username" type="text" placeholder="username" name="username" onkeyup= restriction() required>
                                              
                                         <div id="error"> <p></p></div>
                                        </td>
                                    </tr>
                                     <tr>
                                         <td>PASSWORD: </td>
                                         <td><input type="password" id="pass" placeholder="mypassword" name="password">
                                         </td>
                                    </tr>
                                    
                      
                                    <tr>
                                       <td>FIRST NAME:</td>
                                        <td><input type="text" id="first_name" placeholder="first name" name="firstname" required></td>
                                    </tr>
                                     
                                    <tr>
                                        <td >LAST NAME: </td>
                                       <td><input  id="last_name" type="text" placeholder="last name" name="lastname" required></td>
                                    </tr>
                                     
                                    <tr style="padding:5px;">
                                        <td>EMAIL ID:</td>                    
                                        <td><input type="email" id="email" placeholder="user@mail.com" name="email_id" required> </td>
                                    </tr>
                                        </table><br/><br/>
                                    <input class="btn btn-warning" style="margin-left:100px;" type="submit" value="SIGN UP" name="submit"><br/><br/>
                                
                            </form >

                         <div class="pannel-footer"> <em>Already have a account?<a href="auth.php"> login </a> here.</em></div>

                    </div>
                </div>
                <div class="panel panel-warning about_PM" style="float:right;" >
                    <div class="panel-heading">
                        <h3>ABOUT PROJECT MANAGEMENT</h3>
                    </div> 
                    <div class="panel-body">Project Management allows you to store your project
                                safely and secured.	
                    </div>
                </div>
                </div>
           <script>
    function restriction(){
        var valid = document.getElementById('username').value ;
        valid.trim();
        if (valid.trim()=="")
            {
                document.getElementById('username').value =  valid.trim();
                 document.getElementById('error').innerHTML = 'no space allowed';
            }
        else
            {
                 document.getElementById('error').innerHTML = '';
            }
        
     
    }
</script>
        </body>
    </html>