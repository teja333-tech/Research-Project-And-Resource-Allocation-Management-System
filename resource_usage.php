<?php
include("db_connect.php");

if(isset($_POST['add']))
{
    $resource_id=$_POST['resource_id'];
    $project_id=$_POST['project_id'];
    $usage_date=$_POST['usage_date'];
    $duration=$_POST['duration'];

    mysqli_query($conn,"INSERT INTO resource_usage(resource_id,project_id,usage_date,duration)
    VALUES('$resource_id','$project_id','$usage_date','$duration')");
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,"DELETE FROM resource_usage WHERE usage_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM resource_usage");
?>

<!DOCTYPE html>
<html>

<head>

<title>Resource Usage</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Resource Usage Management</h2>

<form method="post">

Resource ID<br>

<input type="number" name="resource_id" required><br>

Project ID<br>

<input type="number" name="project_id" required><br>

Usage Date<br>

<input type="date" name="usage_date" required><br>

Duration (Hours)<br>

<input type="number" name="duration" required><br><br>

<input type="submit" name="add" value="Assign Resource">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>Usage ID</th>
<th>Resource ID</th>
<th>Project ID</th>
<th>Usage Date</th>
<th>Duration</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['usage_id']."</td>";

echo "<td>".$row['resource_id']."</td>";

echo "<td>".$row['project_id']."</td>";

echo "<td>".$row['usage_date']."</td>";

echo "<td>".$row['duration']." Hours</td>";

echo "<td><a href='?delete=".$row['usage_id']."'>Delete</a></td>";

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
