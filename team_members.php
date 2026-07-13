<?php
include("db_connect.php");

if(isset($_POST['add']))
{
    $team_id=$_POST['team_id'];
    $student_id=$_POST['student_id'];

    mysqli_query($conn,"INSERT INTO team_members(team_id,student_id)
    VALUES('$team_id','$student_id')");
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,"DELETE FROM team_members WHERE id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM team_members");
?>

<!DOCTYPE html>
<html>

<head>

<title>Team Members</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Team Members Management</h2>

<form method="post">

Team ID<br>

<input type="number" name="team_id" required><br>

Student ID<br>

<input type="number" name="student_id" required><br><br>

<input type="submit" name="add" value="Assign Student">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>ID</th>
<th>Team ID</th>
<th>Student ID</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['id']."</td>";

echo "<td>".$row['team_id']."</td>";

echo "<td>".$row['student_id']."</td>";

echo "<td><a href='?delete=".$row['id']."'>Delete</a></td>";

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
