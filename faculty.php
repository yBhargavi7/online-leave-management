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
{
$Username = $_POST['Username1'];

$Email = $_POST['Email1'];
$Password = $_POST['Password1'];
         $ConfirmPassword=$_POST['ConfirmPassword1'];
$stmt=$conn->prepare("INSERT INTO faculty (Username,Email,Password,ConfirmPassword) values('$Username','$Email','$Password','$ConfirmPassword')");
$stmt->execute();	 
$result = $stmt->affected_rows;
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
$result=-1;
}
$stmt -> close();
$conn -> close(); 
if($result > 0)
	 {
echo "New Details Entry inserted successfully !";
}else
	 {
echo'<script type="text/javascript">alert("Invalid details");history.go(-1);</script>';


	 }
}
?>