<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$project_id=$_POST['project_id'];
$review_date=$_POST['review_date'];
$status=$_POST['status'];
$comments=$_POST['comments'];

mysqli_query($conn,"INSERT INTO progress_review(project_id,review_date,status,comments)
VALUES('$project_id','$review_date','$status','$comments')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM progress_review WHERE review_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM progress_review");
?>

<!DOCTYPE html>
<html>

<head>

<title>Progress Review</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Progress Review Management</h2>

<form method="post">

Project ID<br>

<input type="number" name="project_id" required><br>

Review Date<br>

<input type="date" name="review_date" required><br>

Status<br>

<select name="status">

<option>On Track</option>
<option>Delayed</option>
<option>Completed</option>

</select>

<br><br>

Comments<br>

<textarea name="comments" rows="4" cols="40"></textarea>

<br><br>

<input type="submit" name="add" value="Add Review">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>Review ID</th>
<th>Project ID</th>
