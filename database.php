<?php
	$host_name = 'localhost';
	$database = 'market';
	$user_name = 'root';
	$password = '';
	$connect = mysqli_connect($host_name, $user_name, $password, $database);

  if (mysqli_connect_errno()) {
    die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
  } else {
    // echo '<p>Verbindung zum MySQL Server erfolgreich aufgebaut.</p >';
  }
?>