<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$conn = mysqli_connect($servername, $username, $password);
	$db = mysqli_select_db($conn,'gestionetudiant');


?>