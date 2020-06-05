<!DOCTYPE html>
<html>  
    <head>  
        <title>Assignment</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    </head>  
    <body>  

<body>
  <aside class="aside is-placed-left is-expanded">//
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>Lpru </b> Tracking Project</span>
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
        <li>
          <a href="assignment.php" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">มอบหมายงาน</span>
          </a>
        </li>
        <li>
          <a href="update_assign.php" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">จัดการข้อมูล</span>
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
      <p class="menu-label">About</p>
      <ul class="menu-list">
        <li>
          <a href="https://justboil.me/bulma-admin-template/one" class="has-icon">
            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
            <span class="menu-item-label">About</span>
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
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Id</th>  
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
                     <th width="10%"></th>  

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
                     <td>'.$row["id"].'</td>  
                     <td class="subj_id" data-id1="'.$row["id"].'"contenteditable>'.$row["subj_id"].'</td>  
                     <td class="subj_name" data-id2="'.$row["id"].'" contenteditable>'.$row["subj_name"].'</td>  
                     <td class="topic" data-id3="'.$row["id"].'" contenteditable>'.$row["topic"].'</td>  
                     <td class="description" data-id4="'.$row["id"].'" contenteditable>'.$row["description"].'</td> 
                     <td class="sect" data-id5="'.$row["id"].'" contenteditable>'.$row["sect"].'</td> 
                     <td class="student_id" data-id6="'.$row["id"].'" contenteditable>'.$row["student_id"].'</td> 
                     <td class="student_name" data-id7="'.$row["id"].'" contenteditable>'.$row["student_name"].'</td> 
                     <td class="teacher" data-id8="'.$row["id"].'" contenteditable>'.$row["teacher"].'</td> 
                     <td class="work_status" data-id9="'.$row["id"].'" contenteditable>'.$row["work_status"].'</td> 
                     <td class="deadline" data-id10="'.$row["id"].'"contenteditable>'.$row["deadline"].'</td> 
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="subj_id" contenteditable></td>
                <td id="subj_name" contenteditable></td>
                <td id="topic" contenteditable></td>
                <td id="description" contenteditable></td>
                <td id="sect" contenteditable></td>
                <td id="student_id" contenteditable></td>
                <td id="student_name" contenteditable></td>
                <td id="teacher" contenteditable></td>  
                <td id="work_status" contenteditable></td>   
                <td id="deadline" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
                    <td></td>  
                    <td id="subj_id" contenteditable></td>
                    <td id="subj_name" contenteditable></td>
                    <td id="topic" contenteditable></td>
                    <td id="description" contenteditable></td>
                    <td id="sect" contenteditable></td>
                    <td id="student_id" contenteditable></td>
                    <td id="student_name" contenteditable></td>
                    <td id="teacher" contenteditable></td>  
                    <td id="work_status" contenteditable></td>   
                    <td id="deadline" contenteditable></td> 
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
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