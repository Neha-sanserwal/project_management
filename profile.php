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


    $list = mysqli_query ($con , "select file from project_details where user_id ='$user_id'");

        echo "<br/><br/><h1  style='text-align:center; background:linear-gradient(to bottom, purple,blue );'> Hello, ".$_SESSION['user']."</h1>" ;
   echo("<div class='jumbotron'>");
     echo("<h4 style ='color : purple ; text-align:center;' > Here are Your list of projects</h3>");
    while($name = $list->fetch_assoc())
    {   
        $link =$name['file'];
        $user = $_SESSION['user'];
        
        echo(" <h4 style='text-align:center;'><a href='$user/$link' download>".$name['file']."</a></h4>");
     
     }   echo("</div>");
?>

<html>
    
	<body>
        <a href="project.php">  <input class="btn btn-primary btn-lg" style="margin-left:45%; margin-top:10%; border-radius:40px;" type="submit" value="Post project" name="submit"><br/><br/></a>
        
	</body>
</html>

