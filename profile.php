<?php include("base.php");
     include("header.php");
    
    if(!isset($_SESSION['user']))
    {
        header("location:auth.php");
        $_SESSION['error']="Please Login";
    }
    else
    {
        unset($_SESSION['error']);
    }
    $user_id=$_SESSION['user_id'];

    echo "<h1 style='text-align:center;'> Hello ".$_SESSION['user']."</h1><br><br><br>" ;

    $list = mysqli_query ($con , "select file from project_details where user_id ='$user_id'");

    while($name = $list->fetch_assoc())
    {   
        $link =$name['file'];
        echo(" <a href= 'uploads/'.$link>".$name['file']."</a><br>");
     }
?>

<html>
    
	<body style="background-image:repeating-radial-gradient( black , gray , white);">
        
        <a href="project.php">  <input class="btn btn-primary btn-lg" style="margin-left:45%; margin-top:20%; border-radius:40px;" type="submit" value="create project" name="submit"><br/><br/></a>
        
	</body>
</html>

