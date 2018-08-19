<?php 
 session_start();
 include("base.php");

   $error = "";  
   //$_SESSION['message'] = "" ;
   //$_SESSION['message'] = "" ;
     if(isset($_POST["submit"]))
       {
	      $username = $_POST["username"];
	      $password = $_POST["password"];
		  
         
          $authen = mysqli_query($con,"select * from login_details where user_name='$username'and pwd ='$password' ") ; 
		   $row = mysqli_num_rows($authen);
    
          if($row == 1){
              while($r = mysqli_fetch_assoc($authen)) 
					 {
                  $_SESSION['user_id']= $r['user_id'];
				  $name = $r['first_name'];   
            
             $_SESSION['user']=$username;
             $_SESSION['first_Name'] = $name;
//			  echo($_SESSION['firstName']);
			  }
             header('location:profile.php');
            }
         else{
              $error = "Please check if you have entered your password and username correctly!";
     }

	 }?>
<html>
     <?php include("base.html"); ?>
	<body>
          <?php  include("header.php");?>
                
               <?php if(isset($_SESSION['message'])){ echo ('<h5 style="background:green; text-align:center; color: white;">' .$_SESSION["message"]. '</h5>'); }
        
          
            
         ?>
         
             <div class = "flex-container">
			  <div class="panel ">
              
				
				<div class="panel-heading">
                    
					<h3  style = "font-size:3rem;">LOGIN YOURSELF!</h3>
					
				</div>
				<div class="panel-body">
				     <?php if(isset($_SESSION["error"])){ echo ( '<div align="center" style="color:red">'. $_SESSION["error"] .'</div>'); }?>
                <?php  echo ( '<div align="center" style="color:red">'. $error .'</div>'); ?>
					<form method="POST"> 
					 <div class="form-group">
						 		<label for="user">Username:</label>
								<input type="text" class="form-control" id="user" name = "username">
					</div>
					<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd" name = "password">
						</div>
                        <div class= "form-group" style = "text-align:center;">
                                        <input  id="submit" class="btn btn-primary"  type="submit" value="SIGN IN" name="submit">
						</div>
						<em>Don't have account?<a style="color:green;"href="login_details.php">sign up</a> here.</em>
					</form>
				  </div>
			   </div>
			   
		
			<div class="panel" >	
				<div class="panel-heading">
					<h3  style = "font-size:3rem;"><em>ABOUT</em>  PROJECT MANAGEMENT</h3>
				</div> 
				<div class="panel-body"> 	
	     <div class="content">
			 <p>  The PROJECT HUB  provide the space to  keep <br>
				your project secured and safe . We also  provide <br>
				you chance to post your project on our home  page . <br>
				<br>
				      
				 Some of posted projects are given on home page , you may <br>
				 download them by clicking download button.......
			     </p>
					</div></div>
			</div>
	
		</div>
	</body>
</html>