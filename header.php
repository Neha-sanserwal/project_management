
<header>
      <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HOME</a>
                </div>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class="nav navbar-nav">
                        
                        <?php 
                           session_start();
                          if(!isset($_SESSION['user']))
                          {  echo('<li ><a href="auth.php"> log in</a></li> ');
                            echo( '<li><a href="login_details.php"> SIGN UP</a></li>');
                          }
                         else 
                         { echo( "<li ><a href='logout.php' id='logout' > log out</a></li> ");
                              echo( '<li ><a href="project.php"> My Projects</a></li> '); 
                               echo( '<li ><a href="update_pass.php"> Change Password </a></li> ');
                         }
                            ?>  
                        
                       
                    </ul>
                </div>  
            </div>
    </nav>
                    
</header>

