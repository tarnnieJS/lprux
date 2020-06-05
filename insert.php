<?php  
$connect = mysqli_connect("localhost", "root", "", "lprux");
$sql = "INSERT INTO assignment(subj_id, subj_name,topic, description, sect, student_id, student_name, teacher, work_status, deadline) VALUES 
('".$_POST["subj_id"]."',
 '".$_POST["subj_name"]."',
 '".$_POST["topic"]."',
 '".$_POST["description"]."',
 '".$_POST["sect"]."',
 '".$_POST["student_id"]."',
 '".$_POST["student_name"]."',
 '".$_POST["teacher"]."',
 '".$_POST["work_status"]."',
 '".$_POST["deadline"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'มอบหมายงานเรียบร้อยแล้ว';
    
}
 
?>