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
                <td><input type="password"  placeholder="mypassword" name="changed_pass"></td>
                
            </tr>
            

        </table><br/>
                             <input style="margin-left:50%;"class="btn btn-primary btn-lg" type="submit" name="submit" value="submit">
        </form>
        </div>
    </body>
</html>