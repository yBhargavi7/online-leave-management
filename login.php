<?php 

session_start(); 

include "faculty.php";
$username = mysqli_real_escape_string($conn,$_POST['password']);

      $query = mysqli_query($conn, "SELECT * FROM hod WHERE password1='".$username."'");
$numrows = mysqli_num_rows($query);
			if($numrows !=0)
			{
while($row = mysqli_fetch_assoc($query))
				{
$dbpassword=$row['password1'];
if( passwordCheck($password, $dbpassword))
{
header("Location:admin.php");
}else
{
echo"incorrect details";
}?>