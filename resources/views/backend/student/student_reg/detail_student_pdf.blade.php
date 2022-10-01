<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1></h1>

<table height="80%" id="customers">
  <tr>
    <td><h2>Demo_School<h2></td>
    <td><h2>School Erp<h2>
        <p>Address</p>
        <p>Phone No</p>
        <p>School@mail.com</p>

    </td>
</table>
    <table id="customers">
  <tr>
    <th width="10%">S.no</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td>1.</td>
    <td> Student Name</td>
    <td>{{$details->Data_Student->name}}</td>
  </tr>
  <tr>
    <td>2.</td>
    <td>Student Id No.</td>
    <td>{{$details->Data_Student->id_no}}</td>
  </tr>
  <tr>
    <td>3.</td>
    <td>Student Roll No.</td>
    <td></td>
  </tr>
  <tr>
    <td>4.</td>
    <td>Father Name</td>
    <td>{{$details->Data_Student->f_name}}</td>
  </tr>
  <tr>
    <td>5.</td>
    <td>Mother Name</td>
    <td>{{$details->Data_Student->m_name}}</td>
  </tr>
  <tr>
    <td>6.</td>
    <td>Mobile</td>
    <td>{{$details->Data_Student->mobile}}</td>
  </tr>
  <tr>
    <td>7.</td>
    <td>Address</td>
    <td>{{$details->Data_Student->address}}</td>
  </tr>
  <tr>
    <td>8.</td>
    <td>Gender</td>
    <td>{{$details->Data_Student->gender}}</td>
  </tr>
  <tr>
    <td>9.</td>
    <td>Date of Birth</td>
    <td>{{$details->Data_Student->dob}}</td>
  </tr>
  <tr>
    <td> 10.</td>
    <td>Religion</td>
    <td>{{$details->Data_Student->religion}}</td>
  </tr>
  <tr>
    <td>11.</td>
    <td>Discount</td>
    <td>{{$details->Discount_Student->discount}}%</td>
  </tr>
  <tr>
    <td>12.</td>
    <td>Joining Year</td>
    <td>{{$details->Year_Student->name}}</td>
  </tr>
  <tr>
    <td>13.</td>
    <td>Student Class</td>
    <td>{{$details->Class_Student->name}}</td>
  </tr>
  <tr>
    <td>14.</td>
    <td>Student Group</td>
    <td>{{$details->Group_Student->name}}</td>
  </tr>
  <tr>
    <td>15.</td>
    <td>Student Shift</td>
    <td>{{$details->Shift_Student->name}}</td>
  </tr>
 
 
 <i style="font-size:10px;float:right;">Print Date : {{date("d M Y")}}</i>
</table>

</body>
</html>


