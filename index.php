<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lpru tracking Project</title>
  <link rel="stylesheet" href="css/main.css">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
<style>

content {
  float: right;
  padding: 0;
  width: 80%;
  background-color: #f1f1f1;
  height:100%; /* only for demonstration, should be removed */
}
menu {
  float: left;
  padding: 0px;
  width: 300px;
  height:100%; 
}
#tableData {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tableData td, #tableData th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tableData tr:nth-child(even){background-color: #f2f2f2;}

#tableData tr:hover {background-color: #ddd;}

#tableData th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<body>
  <aside class="aside is-placed-left is-expanded">//
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>Lpru Tracking </span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">Menu</p>
      <ul class="menu-list">
      <li>
          <a href="index.php" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">หน้าหลัก</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Payment Status</p>
      <ul class="menu-list">
        <li>
          <a href="#" class="has-icon">
            <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">สถานะการลงทะเบียน</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Admin</p>
      <ul class="menu-list">
        <li>
          <a href="login.php" class="has-icon">
            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
            <span class="menu-item-label">Login</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <?php  
 $connect = mysqli_connect("localhost", "root", "", "lprux");  
 $output = '';  
 $sql = "SELECT * FROM assignment ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id = tableData class="table table-bordered">  
                <tr>  
                      
                     <th width="10%">รหัสวิชา</th>  
                     <th width="10%">ชื่อวิชา</th> 
                     <th width="10%">หัวข้องาน</th> 
                     <th width="15%">รายละเอียด</th> 
                     <th width="5%">กลุ่มเรียน</th> 
                     <th width="20%">รหัสนักศึกษา</th>
                     <th width="20%">ชือนักศึกษา</th>
                     <th width="10%">ผู้สอน</th> 
                     <th width="10%">สถานะ</th>                      
                     <th width="10%">กำหนดส่ง</th>
                  

                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM assignment LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="subj_id" data-id1="'.$row["id"].'">'.$row["subj_id"].'</td>  
                     <td class="subj_name" data-id2="'.$row["id"].'" >'.$row["subj_name"].'</td>  
                     <td class="topic" data-id3="'.$row["id"].'" >'.$row["topic"].'</td>  
                     <td class="description" data-id4="'.$row["id"].'" >'.$row["description"].'</td> 
                     <td class="sect" data-id5="'.$row["id"].'" >'.$row["sect"].'</td> 
                     <td class="student_id" data-id6="'.$row["id"].'" >'.$row["student_id"].'</td> 
                     <td class="student_name" data-id7="'.$row["id"].'" >'.$row["student_name"].'</td> 
                     <td class="teacher" data-id8="'.$row["id"].'" >'.$row["teacher"].'</td> 
                     <td class="work_status" data-id9="'.$row["id"].'" >'.$row["work_status"].'</td> 
                     <td class="deadline" data-id10="'.$row["id"].'">'.$row["deadline"].'</td> 
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
               
                <td id="subj_id" ></td>
                <td id="subj_name" ></td>
                <td id="topic" ></td>
                <td id="description" ></td>
                <td id="sect" ></td>
                <td id="student_id" ></td>
                <td id="student_name" ></td>
                <td id="teacher" ></td>  
                <td id="work_status" ></td>   
                <td id="deadline" ></td> 
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
                 
                    <td id="subj_id" ></td>
                    <td id="subj_name" ></td>
                    <td id="topic" ></td>
                    <td id="description" ></td>
                    <td id="sect" ></td>
                    <td id="student_id" ></td>
                    <td id="student_name" ></td>
                    <td id="teacher" ></td>  
                    <td id="work_status" ></td>   
                    <td id="deadline" ></td> 
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
  
 <script type="text/javascript" src="js/main.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
 <script type="text/javascript" src="js/chart.sample.js"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
</html>