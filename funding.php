<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$project_id=$_POST['project_id'];
$proposal_date=$_POST['proposal_date'];
$status=$_POST['status'];
$remarks=$_POST['remarks'];

mysqli_query($conn,"INSERT INTO proposals(project_id,proposal_date,status,remarks)
VALUES('$project_id','$proposal_date','$status','$remarks')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM proposals WHERE proposal_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM proposals");
?>

<!DOCTYPE html>
<html>

<head>

<title>Proposal Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Proposal Management</h2>

<form method="post">

Project ID<br>

<input type="number" name="project_id" required><br>

Proposal Date<br>

<input type="date" name="proposal_date" required><br>

Status<br>

<select name="status">

<option>Pending</option>
<option>Approved</option>
<option>Rejected</option>

</select>

<br><br>

Remarks<br>

<textarea name="remarks" rows="4" cols="40"></textarea>

<br><br>

<input type="submit" name="add" value="Add Proposal">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>ID</th>
<th>Project ID</th>
<th>Proposal Date</th>
<th>Status</th>
<th>Remarks</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['proposal_id']."</td>";

echo "<td>".$row['project_id']."</td>";

echo "<td>".$row['proposal_date']."</td>";

echo "<td>".$row['status']."</td>";

echo "<td>".$row['remarks']."</td>";

echo "<td><a href='?delete=".$row['proposal_id']."'>Delete</a></td>";

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
