	<?php
		include("base.php");
		 session_start();



		if(!isset($_SESSION['user_id']))
		{
			// header("location:auth.php");
			 header('Location:index.php');
			$_SESSION['error']="Please Login";
		}
		else
		{
			unset($_SESSION['error']);
			$user_id=$_SESSION['user_id'];
		}
		

	?>


	<html>
		   <?php include("base.html"); ?>
		<body>
           
		   <?php include ("header.php"); ?>
			 <div class="flex-container">
		    <div class="panel " >
				 <div class="panel-heading">
                            <h3  style = "font-size:3rem;">WELCOME , <?php echo($_SESSION['user']);?>!</h3>
                        </div>
                      
				<div class="panel-body" >
					<?php $info = mysqli_query($con , "select * from login_details where user_id = '$user_id'");
					  while ($row = mysqli_fetch_assoc($info))
					  {   
						 echo( "
						    <p><strong> FULL NAME : </strong>". ucwords($row['first_name']." ".$row['last_name'])."</p
							  <p><strong> STUDY AT : </strong>".strtoupper($row['college'])."</p 
							   <p><strong> PURSUING IN : </strong>".ucwords($row['education'])."</p>");
							  
					  }
					?> 
				</div>
			</div>

             <div class="panel">
				  <div class="panel-heading">
                            <h3  style = "font-size:3rem;">YOUR PROJECT LIST...</h3>
                        </div>
                      
				 <div class="panel-body ">
				  <div class="wrapMe">
			<?php  $list = mysqli_query ($con , "select description, project_name , file from project_details where user_id ='$user_id'");
					
					  
//			$name = [];
//			$name = mysqli_fetch_array($list , MYSQLI_NUM);
				
		  while($row=mysqli_fetch_assoc($list))
		{   
			$link =$row['file'];
			
            
			echo( 
				"<div class='myPanel'>
	  				<p><strong>".ucwords($row['project_name']). " : </strong></p>
					<p class= 'text-muted'>".substr($row['description'], 0, 30) . '.....'."</p>
				</div>
				 
					<div class = 'Download'> 
				       <a href= 'project.php'><button class = 'btn btn-primary btn-md'>Edit</button></a>
					   <a  href='$user_id/$link' download>
						<button class='success'> Download</button>
						</a>
					</div>
				 ");
		}?>
			   </div>
	           <br/>
					 <br/>
			   <a  class="btn-pro" href="project.php"> <div class = 'Upload'>
						<button class='primary'> Upload new project </button>
					</div></a>
			</div>	

				 </div></div>

		</body>
	</html>

