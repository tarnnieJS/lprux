<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="app">
<table id = assignment class="">
    <tr>
        <td >รหัสวิชา</td>
        <td>ชื่อวิชา</td>
        <td>หัวข้อ</td>
        <td>รายละเอียด</td>
        <td>หมู่เรียน</td>
        <td>รหัสนักศึกษา</td>
        <td>ชื่อนักศึกษา</td>
        <td>ผู้สอน</td>
        <td>กำหนดส่ง</td>
        <td>สถานะ</td>
    </tr>
    <tr v-for="(item,index) in dataTable" :key="index" >
        <td contenteditable :class="'subjID'+index" >{{item.subj_id}}</td>
        <td contenteditable :class="'subjName'+index" >{{item.subj_name}}</td>
        <td contenteditable :class="'topic'+index">{{item.topic}}</td>
        <td contenteditable :class="'desc'+index">{{item.description}}</td>
        <td contenteditable :class="'sect'+index">{{item.sect}}</td>
        <td contenteditable :class="'student_id'+index">{{item.student_id}}</td>
        <td contenteditable :class="'student_name'+index">{{item.student_name}}</td>
        <td contenteditable :class="'teacher'+index">{{item.teacher}}</td>
        <td contenteditable :class="'work_status'+index">{{item.work_status}}</td>
        <td contenteditable :class="'deadline'+index">{{item.deadline}}</td>
       <td><input type="button" value="insert" v-on:click='updateData(index)'/></td> 
    </tr>
</table>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>  
<script>
 var app = new Vue({
  el: '#app',
  data: {
    dataTable:[]
  },
  methods: {
    async getData () {
        var  self = this 
        axios.get('http://localhost/lprux/abc_data.php?fn=abc')
  .then(function (response) {
    // handle success
    self.dataTable = response.data; 
    console.log(response.data);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
    },
    async updateData (index){
        var self = this
        var subjID = document.getElementsByClassName("subjID"+index)[0].innerText
        var subjName = document.getElementsByClassName("subjName"+index)[0].innerText
        var topic = document.getElementsByClassName("topic"+index)[0].innerText
        var desc = document.getElementsByClassName("desc"+index)[0].innerText
        var sect = document.getElementsByClassName("sect"+index)[0].innerText
        var student_id = document.getElementsByClassName("student_id"+index)[0].innerText
        var teacher = document.getElementsByClassName("teacher"+index)[0].innerText
        var work_status = document.getElementsByClassName("work_status"+index)[0].innerText
        var deadline = document.getElementsByClassName("deadline"+index)[0].innerText
        
    //  console.log(subjID,subjID,topic,desc,sect,student_id,teacher,work_status,deadline);    
       
    } 
  },
  mounted() {
      this.getData()  
  },
})
</script>
</body>
</html>