<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['mail']) || empty($_POST['pass'])) {
  echo "mail or pass is invalid";
}
else{
	
// Define $mail and $pass
$mail = $_POST['mail'];
$pass = $_POST['pass'];

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "calin", "boracalin20", "cloud");

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT Email, Password  from users where Email=? AND Password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $mail, $pass);
$stmt->execute();
$stmt->bind_result($mail, $pass);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row 
{
$_SESSION['login_user'] = $mail; // Initializing Session
header("location: profile.php"); // Redirecting To Profile Page
}
mysqli_close($conn); // Closing Connection
}
}
?>