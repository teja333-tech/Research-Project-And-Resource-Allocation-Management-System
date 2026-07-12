<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$name=$_POST['student_name'];
$dept=$_POST['department'];
$year=$_POST['year'];
$email=$_POST['email'];

mysqli_query($conn,"INSERT INTO students(student_name,department,year,email)
VALUES('$name','$dept','$year','$email')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM students WHERE student_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Students</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2 align="center">Student Management</h2>

<form method="post">

Student Name<br>
<input type="text" name="student_name" required><br>

Department<br>
<input type="text" name="department" required><br>

Year<br>
<input type="number" name="year" required><br>

Email<br>
<input type="email" name="email" required><br><br>

<input type="submit" name="add" value="Add Student">

</form>

<br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Department</th>
<th>Year</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['student_id']."</td>";

echo "<td>".$row['student_name']."</td>";

echo "<td>".$row['department']."</td>";

echo "<td>".$row['year']."</td>";

echo "<td>".$row['email']."</td>";

echo "<td>
<a href='?delete=".$row['student_id']."'>Delete</a>
</td>";

echo "</tr>";

}

?>

</table>

</body>

</html>
