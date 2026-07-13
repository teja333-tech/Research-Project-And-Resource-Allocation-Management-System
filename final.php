<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$project_id=$_POST['project_id'];
$completion_date=$_POST['completion_date'];
$result=$_POST['result'];
$grade=$_POST['grade'];

mysqli_query($conn,"INSERT INTO final_outcome(project_id,completion_date,result,grade)
VALUES('$project_id','$completion_date','$result','$grade')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM final_outcome WHERE outcome_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM final_outcome");
?>

<!DOCTYPE html>
<html>

<head>

<title>Final Outcome</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Final Outcome Management</h2>

<form method="post">

Project ID<br>

<input type="number" name="project_id" required><br>

Completion Date<br>

<input type="date" name="completion_date" required><br>

Result<br>

<input type="text" name="result" required><br>

Grade<br>

<input type="text" name="grade" required><br><br>

<input type="submit" name="add" value="Add Final Outcome">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>Outcome ID</th>
<th>Project ID</th>
<th>Completion Date</th>
<th>Result</th>
<th>Grade</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['outcome_id']."</td>";

echo "<td>".$row['project_id']."</td>";

echo "<td>".$row['completion_date']."</td>";

echo "<td>".$row['result']."</td>";

echo "<td>".$row['grade']."</td>";

echo "<td><a href='?delete=".$row['outcome_id']."'>Delete</a></td>";

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
