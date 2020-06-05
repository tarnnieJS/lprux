<!DOCTYPE html>
<html lang="en" > 
<meta charset="utf-8">
<head>  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lpru tracking Project</title>
  <link rel="stylesheet" href="css/main.css">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<style>

#tableEdit {
 
  border-collapse: collapse;
  width: 100%;
}

#tableEdit td, #tableEdit th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tableEdit tr:nth-child(even){background-color: #f2f2f2;}

#tableEdit tr:hover {background-color: #ddd;}

#tableEdit th {
  padding-top: 0px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 10px;
    padding: 5px;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}
</style>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-2">

    <div id="wrapper">

<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Lpru X
            </a>
        </li>
        <li>
            <a href="logout.php">กลับหน้าหลัก</a>
        </li>
        <li>
            <a href="assignment.php">มอบหมายงาน</a>
        </li>
        <li>
        <a href="register.php">ติดตามการลงทะเบียน</a>
        </li>
        <li>
           <center> <input type="button" onclick="location.href='logout.php';" value="Logout" /></center>
        </li>
    </ul>
</div>
</div>
  
  </div>
  <?php
        	session_start();
        	require_once("connect.php");

        	if(!isset($_SESSION['UserID']))
        	{
        		header("location:index.php");
        		exit();
        	}

        	//*** Update Last Stay in Login System
        	$sql = "UPDATE admin SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ";
        	$query = mysqli_query($con,$sql);

        	//*** Get User Login
        	$strSQL = "SELECT * FROM admin WHERE UserID = '".$_SESSION['UserID']."' ";
        	$objQuery = mysqli_query($con,$strSQL);
        	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        ?>
  <div class="col-sm-1"></div>
<div class="col-sm-9"><br><br>
  <?php  
 $connect = mysqli_connect("localhost", "root", "", "lprux");  
 $output = '';  
 $sql = "SELECT * FROM assignment ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="tableEdit" class="table table-bordered">  
                <tr>  
                 
                     <th width="5%">รหัสวิชา</th>  
                     <th width="10%">ชื่อวิชา</th> 
                     <th width="10%">หัวข้องาน</th> 
                     <th width="15%">รายละเอียด</th> 
                     <th width="5%">กลุ่มเรียน</th> 
                     <th width="20%">รหัสนักศึกษา</th>
                     <th width="20%">ชือนักศึกษา</th>
                     <th width="10%">ผู้สอน</th> 
                     <th width="5%">สถานะ</th>                      
                     <th width="5%">กำหนดส่ง</th>
                     <th width="5%"></th>  

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
                     <td><button type="button" name="delete_btn" data-id11="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
              
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
</div>
  <script>
    $(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var subj_id = $('#subj_id').text();  
        var subj_name = $('#subj_name').text();
        var topic = $('#topic').text(); 
        var description = $('#description').text(); 
        var sect = $('#sect').text(); 
        var student_id = $('#student_id').text(); 
        var student_name = $('#student_name').text(); 
        var teacher = $('#teacher').text(); 
        var work_status = $('#work_status').text(); 
        var deadline = $('#deadline').text(); 


        if(subj_id == '')  
        {  
            alert("กรอกรหัสวิชา");  
            return false;  
        }  
        if(subj_name == '')  
        {  
            alert("กรอกชื่อวิชา");  
            return false;  
        }  
        if(topic == '')  
        {  
            alert("กรอกหัวข้องาน");  
            return false;  
        }  
        if(description == '')  
        {  
            alert("กรอกรายละเอียดงาน");  
            return false;  
        }  

        if(sect == '')  
        {  
            alert("กรอกหมู่เรียน");  
            return false;  
        }  
        if(student_id == '')  
        {  
            alert("กรอกรหัสนักศึกษา");  
            return false;  
        }  
        if(student_name == '')  
        {  
            alert("กรอกชื่อนักศึกษา");  
            return false;  
        }  
        if(teacher == '')  
        {  
            alert("กรอกชื่อผู้สอน");  
            return false;  
        }  
        if(work_status == '')  
        {  
            alert("สถานะการส่งงาน");  
            return false;  
        }  
        if(deadline == '')  
        {  
            alert("กรอกกำหนดส่ง");  
            return false;  
        }  
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{subj_id:subj_id, subj_name:subj_name, topic:topic, description:description, sect:sect, student_id:student_id, student_name:student_name, teacher:teacher, work_status:work_status, deadline:deadline},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
                location.reload()

            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
        //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.first_name', function(){  
        var id = $(this).data("id1");  
        var first_name = $(this).text();  
        edit_data(id, first_name, "first_name");  
    });  
    $(document).on('blur', '.last_name', function(){  
        var id = $(this).data("id2");  
        var last_name = $(this).text();  
        edit_data(id,last_name, "last_name");  
    });  
    $(document).on('blur', '.student_name', function(){  
        var id = $(this).data("id3");  
        var student_name = $(this).text();  
        edit_data(id,student_name, "student_name");  
    });  

  // ลบข้อมูล
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id11");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                    location.reload()

                }  
            });  
        }  
    });  
});  
  </script>
 <script type="text/javascript" src="js/main.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
 <script type="text/javascript" src="js/chart.sample.js"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</div>
</div>
</body>
</html>