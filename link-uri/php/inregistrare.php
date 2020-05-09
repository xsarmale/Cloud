<?php

$conn = new mysqli('localhost', 'calin', 'boracalin20', 'cloud');
/* check connection */
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
   
//cand se apasa 'submit' se va face inregistrarea 

if(isset($_POST['submit']))
{
	//preluare datelor din form
   $nume=$_POST['name'];
   $email=$_POST['email'];
   $tell=$_POST['tell'];
   $pass1=$_POST['pass1'];
   $pass2=$_POST['pass2'];
   
   //verificare daca cele 2 parole introduse coincide
   if($pass1 !== $pass2)
	{
	  echo "<script> alert('Parola nu coincide');
	                  window.location.href = '../inregistrare.html';
		    </script>";
    }else{
		
		//verificare daca este cont pe adresa de email
		$conn2 = new mysqli('localhost', 'calin', 'boracalin20', 'cloud');
		$sql2="SELECT * FROM `users` WHERE Email='$email'";
		$result = $conn2->query($sql2);
		if ($result->num_rows > 0)
		{  echo "<script> alert('Pe aceasta adresa de mail este deja un cont'); window.location.href = '../index.html';  </script>"; 
	    }else {	
                  //inserare in DB
                  $sql="INSERT INTO users (Nume, Email, Telefon, Password) VALUES ('$nume','$email','$tell','$pass1')";
                  if ($conn->query($sql) === TRUE) { echo "<script> window.location.href = 'inregistrareok.html';  </script>";}
                  else { echo 'Error: '. $conn->error;}
		       } // se inchide verificarea de email
	}//de la pass1===pass2

}	 
 
//inchiderea conexiuni 
$conn->close();
$conn2->close();
	 
?>