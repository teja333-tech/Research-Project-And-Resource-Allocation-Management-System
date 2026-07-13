<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$name=$_POST['faculty_name'];
$dept=$_POST['department'];
$email=$_POST['email'];

mysqli_query($conn,"INSERT INTO faculty(faculty_name,department,email)
VALUES('$name','$dept','$email')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM faculty WHERE faculty_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM faculty");
?>

<!DOCTYPE html>
<html>

<head>

<title>Faculty Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Faculty Management</h2>

<form method="post">

Faculty Name<br>

<input type="text" name="faculty_name" required><br>

Department<br>

<input type="text" name="department" required><br>

Email<br>

<input type="email" name="email" required><br><br>

<input type="submit" name="add" value="Add Faculty">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>ID</th>
<th>Name</th>
<th>Department</th>
<th>Email</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['faculty_id']."</td>";

echo "<td>".$row['faculty_name']."</td>";

echo "<td>".$row['department']."</td>";

echo "<td>".$row['email']."</td>";

echo "<td>
<a href='?delete=".$row['faculty_id']."'>Delete</a>
</td>";

echo "</tr>";

}

?>

</table>

<br>

<center>

<a href="dashboard.php">Back to Dashboard</a>

</center>

</body>

</html>
