<?php 
 include("base.php");
 include("header.php");
    
     if(isset($_POST["submit"]))
       {
	      $username = $_POST["username"];
	      $password = $_POST["password"];
          $authen = mysqli_query($con,"select user_id from login_details where user_name='$username'and pwd ='$password' ");
              while ($row = $authen->fetch_assoc()) {
                  $_SESSION['user_id']= $row['user_id'];
                  
    }
          $row = mysqli_num_rows($authen);
    
          if($row == 1)
           {
            
             $_SESSION['user']=$username;
        
             
          
             header('Location:profile.php');
            }
         
     }
?>
<html>
    
	<body>
		<div class="container">
			<div class="panel panel-primary" style="float:left; margin-left:10%">
               <?php if(isset($_SESSION["error"])){ echo ( '<div align="center" style="color:red">'. $_SESSION["error"] .'</div>'); }?>
				<div class="panel-heading">
					<h3>LOGIN YOURSELF!</h3>
				</div>
				<div class="panel-body">
					<form method="POST"> 
						USERNAME : <input type="text" placeholder="recon" name="username"><br/><br/>
						PASSWORD : <input type="password" value="mypassword" name="password"><br/><br/>
							<input class="btn btn-primary" style="margin-left:100px;"type="submit" value="SIGN IN" name="submit"><br/><br/>
						<em>Don't have account?<a style="color:green;"href="login_details.php">sign up</a> here.</em>
					</form>
				</div>
			</div>
			<div class="panel panel-primary about_PM" style="float:right;" >	
				<div class="panel-heading">
					<h3><em>ABOUT</em>  PROJECT MANAGEMENT</h3>
				</div> 
				<div class="panel-body"> Project Management allows you to store your project
  							safely and secured.
				</div>
			</div>
		</div>
	</body>
</html>
