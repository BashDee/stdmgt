
<?php

// Include the database config file 
    include('config.php');
    $query = "SELECT * FROM faculty"; 
    $result = $connect->query($query); 
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dropdown Dependent List</title>
  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,200' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
  .form select{
	  width:100% !important;
  }
  </style>	
</head>


<body>
<div class="container">
  <div class="row">
	<div class="col-lg-12" style="padding-right:0px;padding-left:0px;padding-top:50px">
	<div class="page-hero d-flex align-items-center justify-content-center">
		
      <!-- multistep form -->
      <form class="form-horizontal form" method="POST" action="">
      
      <div align="center">
			<h5 class="fs-subtitle">Dynamic Dropdown Dependent List</h5>
		</div>		
		   
         <div class="form-group">
          <div class="col-sm-12">
			  <select id="faculty">
				<option value="">Select Faculty</option>
				<?php 
				if($result->num_rows > 0){ 
					while($row = $result->fetch_assoc()){  
						echo '<option value="'.$row['id'].'">'.$row['faculty_name'].'</option>'; 
					} 
				}
                else{ 
					echo '<option value="">Country not available</option>'; 
				} 
				?>
			</select>
         </div>
         </div>
         
         <div class="form-group">
          <div class="col-sm-12">
			  <select id="dept" name="dept">
				<option value="">Select dept</option>
                
			</select>
         </div>
         </div>
         
         <div class="form-group">
          <div class="col-sm-12">
			  <select id="level" name="level">
				<option value="">Select level</option>
			</select>
         </div>
         </div>
         
         
         <div class="form-group">
          <div class="col-sm-6">
			  <input type="submit" name="submit" value="Submit"/>
         </div>
         </div>
		
      </form>   
       
</div>
</div>
</div>
</div>      
</div>

<script src="custom.js" type="text/javascript"></script>
</body>

</html>