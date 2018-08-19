<?php
		include("base.php");
		 session_start();
       
         $error = "";
          $post_error = '';
		if(!isset($_SESSION['user']))
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
      
       if(isset($_POST["submit"]))
	   {
		   $project_name = $_POST['pro'];
		   
		   $list = mysqli_query($con, "select * from project_details where user_id = '$user_id' and project_name = '$project_name'");
		   if($list == true){
		   while($row = mysqli_fetch_assoc($list))
		   {
			   $name = $row['project_name'];
			  
			   $pid = $row['pid'];
			   
			    $date = date("y/m/d");
			    $check = mysqli_query($con , "select pro_id from post_details where pro_id = '$pid' ");
			   if ((mysqli_num_rows($check) == 0)){
			   $ins = mysqli_query($con , "insert into post_details(pro_id , project_name , date) values ('$pid' , '$name' , '$date')");
			   
			   if (!$ins)
			   {
				   echo($error);
			   }
			   else{
				   header("location:index.php");
			   }}
			   else{
				   $post_error = "This project is already posted";
			   }
			   }
			   
		   }
	   }
		
		   
		   
	   
		


	?>

<html>
	<?php 
	include("base.html");
 ?>
	<body>
		<?php 	include("header.php");  ?>
		<div class="flex-container">
			<div class="panel panel-primary">
				<div class="panel-heading"> <h3  style = 'font-size:3rem;'><?php echo("Hello, " .$_SESSION['user']);?></h3></div>
		
			<div class="panel-body">
				<form class="form-group" method="post">
					<p style="color:red;"><?php echo($post_error);?></p>
					
					<label for="name"> Name Of Project : </label>
					 
					<select name="pro" class="form-control">
					  <?php 
										
									$option = mysqli_query($con , "select * from project_details where user_id = '$user_id'");
						
								while($row = mysqli_fetch_assoc($option)){
									echo("<option >".$row['project_name']."</option>");
								}
						 
						?>
					</select>
					<div class="text-muted">
						<p>#The Project-Name you enter must be uploaded first</p>
					</div>
					 <input   class="btn btn-success btn-large" id="submit"  type="submit" value="submit" name="submit">
				</form>
				</div>	
			</div>
		</div>
	</body>
</html>