<?php  
	$connect = mysqli_connect("localhost", "root", "", "lprux");
	$sql = "DELETE FROM assignment WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'ลบข้อมูลแล้ว'; 
	}  
 ?>