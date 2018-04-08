<?php 
     
       
        $con = mysqli_connect("localhost","root","");
        mysqli_select_db($con,"project_hub") or die("please check database");
        
?>


<head>
		<title>project management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
	<style>
        #update_pass
        {
            margin-left: 40%;
            margin-top: 10%;
        
        }
        td
            {
                padding:10px;
                text-align: justify;
            }

    </style>

</head>

	   
	

