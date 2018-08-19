<?php
         session_start();
      include("base.php");
  
     
      if(!isset($_SESSION['user_id'])){
        // header("location:auth.php");
         header('location:index.php');
        $_SESSION['error']="Please Login";
      }
       else
    {   $user = $_SESSION['user'];
        unset($_SESSION['error']);
    }
         
      if(isset($_POST["submit"]))
      {  $project = $_POST["project_name"];
         
        $skill = implode(', ', $_POST['skills']);
         $discription = $_POST["discription"];
         $file = rand()*10;
         $file_name = $_FILES['txtfile']['name'];
         $file_size = $_FILES['txtfile']['size'];
         $file_type = $_FILES['txtfile']['type'];
         $user_id=$_SESSION['user_id'];
         $path = $_SESSION['user_id'];
          if ( ! is_dir($path)) {
                    mkdir($path);
           }
         move_uploaded_file($_FILES['txtfile']['tmp_name'], $path.'/'.$file_name);
	   
         $sql = mysqli_query($con, "insert into project_details (project_name, description, skills, file,user_id) values ('$project', '$discription', '$skill','$file_name','$user_id')");
         
        header('location:profile.php');
      }
?>

<html>
<?php
      include("base.html");
?> <body >
             <?php   include("header.php"); ?>
                           
                            
                                <div class="flex-container">
									<div class="panel">
										<div class="panel-heading"> <h1 style="font-size:3rem">FILL THE FOLLOWING DETAILS..</h1></div>
										
										<div class="panel-body">
                                 <form class="form-group" method="POST" enctype="multipart/form-data" style ="padding :1em; "  >
                                   
									 <label for="project_name">Project Name:</label>
                                              <td><input id="project_name" class="form-control" type="text" placeholder="My Project" name="project_name" required onkeyup="projectname_validation('project_name', 'project_error', 'project_val')"> </td>
                                                   <div style="color:red;font-size:12px;"id="project_error"> </div>
                                                     <div style="color:red;font-size:12px;"id="project_val"> </div>
                                             
                                       <br>
                                         
                                             <label for="opt">Skill Required:</label>
                                             
                                                 <select id="opt" name="skills[]" class="selectpicker form-control" required multiple>
                                                          <option value="C++">C++</option>
                                                          <option value="Java">Java</option>
                                                          <option value="PHP">PHP</option>
                                                          <option value="HTML">HTML</option>
                                                          <option value="Javascript">Javascript</option>
                                                          <option value="JQuery">JQuery</option>
                                                          <option value="Python">Python</option>
                                                          <option value="Ruby">Ruby</option>
                                                         
                                                 </select>
									         
                                          <br><br>

                                       
												 <label for="txt">Description:</label>
                                  
                                            <textarea class="form-control" maxlength="150000"   id="txt" name="discription"required onkeyup="description_validation('txt', 'text_error' , 'text_val')"></textarea>
                                              <div style="color:red;font-size:12px;"id="text_error"> </div>
									            <div style="color:red;font-size:12px;"id="text_val"> </div>
                                                    <br/>
                                        
											<label for="file">Drop Folder Here:</label>
                                             <input class="form-control" type="file" id="file" placeholder="my file" value="put here" accept="application/x-zip-compressed" 
											 name="txtfile" required>
                                             <br/><br/>

                                          <div style="text-align:center;">  
                                        <input   class="btn btn-success" id="submit"  type="submit" value="submit " name="submit"><br/><br/>
									 </div>
                                     </form >
                                     
										</div>
            </div></div>
	
	
            
               
                
        </body>
    </html>