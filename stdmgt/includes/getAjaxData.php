<?php 
// Include the database config file 
include('config.php'); 
 
if(!empty($_POST['id_val'])){ 
    // Fetch state data based on the specific country 
    $getid = $_POST['id_val'];
     
    echo $Singlequery = "SELECT * FROM facuty WHERE id = '".$getid."'"; 
    $GetIdResult = $connect->query($Singlequery); 
    $singlerow = $GetIdResult->fetch_assoc();
	
	$GetDeptID = $singlerow['id'];
	
	// Fetch state data based on the specific country
    $query = "SELECT * FROM dept WHERE faculty = ".$GetDeptID." "; 
    $result = $connect->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Dept</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].'">'.$row['dept_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Dept not available</option>'; 
    } 
}elseif(!empty($_POST['dept_id'])){ 
	
	$getDeptId = $_POST['dept_id'];
	// $sel_faculty_Val = $_POST['sel_faculty_id'];
     
    // Fetch state id data based on the specific state iso2 and country code value
    $Singlequery = "SELECT * FROM dept WHERE id = '".$getDeptId."' "; 
    $GetIdResult = $connect->query($Singlequery); 
    $singlerow = $GetIdResult->fetch_assoc();
	
	$GetDeptID = $singlerow['id'];
	
    
} 
?>