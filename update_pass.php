<?php 
     include("base.php");
     session_start();
     if(!isset($_SESSION['user']))
     {
        // header("location:auth.php");
         header('location:index.php');
        $_SESSION['error']="Please Login";
     }
     
      
     $user = $_SESSION['user'] ;
     if (isset($_POST["submit"]))
     {  $password = $_POST["password"];  
        $new_pwd = $_POST["changed_pass"];
        $ret = mysqli_query($con , "update login_details set pwd = '$new_pwd' where user_name = '$user' and pwd = '$password'");
        unset($_SESSION['user']);
        // header('location:auth.php');
         header('location:index.php');
     }
     
     ?>
<html>
     <?php include("base.html"); ?>
    <body  >
        <?php include("header.php"); ?>
        <div class="flex-container">
			<div class="panel ">
				<div class="panel-heading " style="font-size:3rem;" > ENTER YOUR OLD AND NEW PASSWORD HERE</div>
				<div class="panel-body">
        <form method="POST" class="form-group">
        
          
			<label for="pass">PASSWORD:</label>
                
			<input class="form-control" type="password" id="pass" placeholder="mypassword" name="password">
            
          <br/>
			
			<label for="pass_chnged">CHANGE PASSWORD:</label>
                
			<input class="form-control" type="password" id="pass_chnged" placeholder="mypassword" name="changed_pass" onkeyup="pass_validation('pass_chnged','passerror','pass_len','passval')">
               
			<div style="color:red; font-size:13px;"id="pass_len"> </div>
			<div style="color:red; font-size:13px;"id="passerror"> </div>
                                      
			<div style="color:red; font-size:13px;"id="passval"></div>
                <br/>
                             
			<input id="submit" class="btn btn-success btn-lg" type="submit" name="submit" value="submit">
			 
        </form>
				</div></div>
		</div>
    </body>
</html>