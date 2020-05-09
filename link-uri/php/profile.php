<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: ..\conectare.html"); // Redirecting To Home Page
}
?>


<!DOCTYPE html>

<html>
    <head>
       <title>Your Home Page</title>
    </head>
    <body>
       <div id="profile">
         <b id="welcome"> <i><?php echo $login_session; ?></i></b>
         <b id="logout"><a href="logout.php">Log Out</a></b>
       </div>
       <div id="upload">
	    <form action="upload.php" method="post" enctype="multipart/form-data">Select the file
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload" name="submit">
	</form>
	   </div>
</body>
</html>

