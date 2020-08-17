<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "lprux");
$output = '';
if(isset($_POST["submit"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM assignment 
  WHERE student_name LIKE '%".$search."%'
  OR sect LIKE '%".$search."%' 
  OR teacher LIKE '%".$search."%' 
  OR topic LIKE '%".$search."%' 
  OR subj_name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM assignment ORDER BY student_id 
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '  
    <div class="table-responsive">  
         <table id = tableData class="table table-bordered">  
              <tr>  
                    
                   <th width="10%">รหัสวิชา</th>  
                   <th width="10%">ชื่อวิชา</th> 
                   <th width="10%">หัวข้องาน</th> 
                   <th width="15%">รายละเอียด</th> 
                   <th width="20%">รหัสนักศึกษา</th>
                   <th width="20%">ชือนักศึกษา</th>
                   <th width="10%">ผู้สอน</th> 
                   <th width="10%">สถานะ</th>                      
                   <th width="10%">กำหนดส่ง</th>
              </tr>';  
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>  
  <td>'.$row["subj_id"].'</td>
  <td>'.$row["subj_name"].'</td>
  <td>'.$row["topic"].'</td>
  <td>'.$row["description"].'</td>
  <td>'.$row["student_id"].'</td>
  <td>'.$row["student_name"].'</td>
  <td>'.$row["teacher"].'</td>
  <td>'.$row["work_status"].'</td>
  <td>'.$row["deadline"].'</td>
</tr>  
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>