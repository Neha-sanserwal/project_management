<?php include("base.php");
      include("header.php");
     
      if(!isset($_SESSION['user'])){
        header("location:auth.php");
        $_SESSION['error']="Please Login";
      }
       else
    {   $user = $_SESSION['user'];
        unset($_SESSION['error']);
    }

      if(isset($_POST["submit"]))
      {  $project = $_POST["project_name"];
         $skill = $_POST["skills"];
         $discription = $_POST["discription"];
         $file = rand()*10;
         $file_name = $_FILES['txtfile']['name'];
         $file_size = $_FILES['txtfile']['size'];
         $file_type = $_FILES['txtfile']['type'];
         $user_id=$_SESSION['user_id'];
         move_uploaded_file($_FILES['txtfile']['tmp_name'],'uploads/'.$user_id.$file_name);
         $sql = mysqli_query($con, "insert into project_details (project_name, discription, skills, file,user_id) values ('$project', '$discription', '$skill','$file_name','$user_id')");
         
        header('location:profile.php');
      }
?>

<html>
    
<head>
		<title>project management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <style>
                td
                {
                    padding:10px;
                    text-align: justify;
                    color: black;
                }
          
        </style>
    </head>

        <body >
                          
                             <div class="container">
                                 <div class=" jumbotron">

                                 <form method="POST" enctype="multipart/form-data"  >

                                    <table style="margin-left:150px; color:white;">
                                        <tr >
                                            <td  >Project Name:</td>
                                              <td><input id="project_name" type="text" placeholder="My Project" name="project_name">
                                              </td>
                                        </tr>
                                         <tr>
                                             <td>Skill Required:</td>
                                             <td><input type="text" id="skills" placeholder="html, php, sql" name="skills">
                                             </td>
                                        </tr>


                                        <tr>
                                           <td>Discription:</td>
                                            <td>
   
                                            <textarea maxlength="150000" style="width:500px; height:209px;" name="discription" ></textarea></td>
                                        
                                        </tr>
                                          <tr>
                                             <td>Drop A Folder Here:</td>
                                             <td><input type="file" id="file" placeholder="my file" value="put here" name="txtfile">
                                             </td>
                                        </tr>


                                            </table><br/><br/>
                                        <input  class="btn btn-success" style="margin-left:100px;" type="submit" value="submit " name="submit"><br/><br/>

                                     </form >
                                 </div>
            </div>
            
        </body>
    </html>