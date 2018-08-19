<?php 
  include("base.php");
   session_start();
?>

<html>
	<?php  include("base.html");?>
	<body>
	<?php 
	
	 include("header.php");
	  ?>
	<div class="flex-container">
	<div class="panel">
		<div  class="panel-heading"> <h3 style=" color= white;font-size:3rem;">WELCOME TO PROJECT HUB ...</h3> </div>
		<div class="panel-body">
			
			
	     <div class="content">
			 <p> Hello and welcome to THE PROJECT HUB . We provide the<br>
				 space to keep your project secured and safe . We also<br>
				 provide you chance to post your project on our home <br>
				 page . <br>
				      
				 Some of posted projects are given below , you may <br>
				 download them by clicking download button.......
			     </p>
			</div>
			<div class="wrapMe">
			<?php
	 $id = mysqli_query ($con , "select pro_id , date from post_details" );
	 while ($row = mysqli_fetch_assoc($id)){
		$pid = $row['pro_id'];
		 $date = $row['date'];
		
	    $list = mysqli_query ($con , "select * from project_details where pid= '$pid'");
		 while($row=mysqli_fetch_assoc($list))
		{   
			$link =$row['file'];
			 $user_id = $row['user_id'];
			 $first_name = '';
			 $last_name = '';
			 $user = mysqli_query($con , "select first_name, last_name from login_details where user_id = '$user_id'");
			  while($usr=mysqli_fetch_assoc($user)){
				 $first_name = $usr['first_name'];
				   $last_name = $usr['last_name'];
			 }
			echo( 
				"<div class='myPanel'>
	  				<p><strong>".ucwords($row['project_name']). " :</strong> </p>
					<p class= 'text-muted'>SKILLS : ".ucfirst($row['skills']) ."</p>
					<p class= 'text-muted'>".substr($row['description'], 0, 30) . '.....'."</p>
					<p><strong> Posted On :</strong>".$date."</p>
					<p><strong> Posted By :</strong>".ucwords($first_name." ".$last_name)."</p>
				</div>
				
				<a  href='$user_id/$link' download>
				<div class= 'Download'>
						<button class='success'> Download</button></div>
				</a> ");
		}}
//			$name = [];
//			$name = mysqli_fetch_array($list , MYSQLI_NUM);
				
	
				?></div></div>
		</div>
	</div>
	</body>
</html>
