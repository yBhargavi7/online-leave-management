<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="leave letter management";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{$Username = $_POST['Username'];

$Email = $_POST['Email'];
$Password = $_POST['Password'];
         $ConfirmPassword=$_POST['ConfirmPassword'];

$stmt = $conn->prepare("INSERT INTO hod (username,email,password1,password2)
VALUES ('$Username','$Email','$Password','$ConfirmPassword')");
$stmt->execute();	 
$result = $stmt->affected_rows;
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

$result=-1;
}
if($result > 0)
	 {
echo "New Details Entry inserted successfully !";
}
else
	 {
		echo'<script type="text/javascript">alert("Invalid details");history.go(-1);</script>';

}
}
?>