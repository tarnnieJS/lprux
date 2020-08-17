<?php  
 $conn = mysqli_connect("localhost", "root", "", "lprux");  
 $output = '';  


 
 if($_GET['fn'] == 'create'){
    
        
     
    
 }
 else if($_GET['fn'] == 'abc'){
    $sql = "SELECT * FROM assignment ORDER BY id DESC";  
    $query = mysqli_query($conn,$sql);
    if (!$query) {
        printf("Error: %s\n", $conn->error);
        exit();
    }
    $resultArray = array();
    while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
        array_push($resultArray,$result);
    }
    mysqli_close($conn);

    echo json_encode($resultArray);

 } 
 else if($_GET['fn'] == 'postData'){
   
  $sql = "INSERT INTO assignment (subj_id, subj_name,topic, description, sect, student_name, teacher, work_status, deadline) VALUES ('".$_POST["subj_id"]."', '".$_POST["subj_name"]."','".$_POST["topic"]."','".$_POST["desc"]."','".$_POST["sect"]."','".$_POST["student_name"]."','".$_POST["teacher"]."', '".$_POST["status"]."','".$_POST["date"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  

 }
?>