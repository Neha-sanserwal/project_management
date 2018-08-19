
<header>
      <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<a class="navbar-brand" href="#"><em>Project hub</em></a>
                </div>
                <div class="collapse navbar-collapse" id="mynav">
                    <ul class = 'nav navbar-nav'>
						<li> <a class="navbar-brand" href="index.php"> Home</a></li>
					</ul>  
                        <?php 
                                              
                          if(!isset($_SESSION['user_id']))
							  
                          {  echo( "<ul class='nav navbar-nav navbar-right'>");
							  echo('<li ><a href="auth.php"> log in</a></li> ');
                             echo( '<li><a href="login_details.php"> Sign Up</a></li>');
						     
						     echo("</ul>");
                          } 
					          
                         else 
                         { 
							 echo( "<ul class='nav  navbar-nav navbar-right'>");
						      echo( "<li ><a href='logout.php' id='logout' > Log Out</a></li> ");
							    echo(" <li><a href='#' > ".$_SESSION['user']."</a></li>") ;
							  echo("</ul>");
							     
							 echo("<ul class = 'nav navbar-nav'>");
							 echo( '<li ><a href="profile.php">  Profile</a></li> ');
                              echo( '<li ><a href="project.php"> Upload Projects</a></li> '); 
							  echo( '<li ><a href="post-project.php"> Post Projects</a></li> '); 
                               echo( '<li ><a href="update_pass.php"> Change Password </a></li> ');
						      echo("</ul>");
                         }
                            ?>  
                        
                       
                   
                </div>  
            </div>
    </nav>
                    
</header>

