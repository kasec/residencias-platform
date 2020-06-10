<?php
	$servername = "localhost";
	// $username = "id13413404_root";
	// $password = "4}q_=rBqh)[q?Xx!";
	// $database = "id13413404_residencias";

	$username = "root";
	$password = "maquinadefuego";
	$database = "residentes";
	// Crear conexión
	$conn = new mysqli($servername, $username, $password, $database);

	// Checar conexión
	if ($conn->connect_error) 
	    die("Fallo al conectar: " . $conn->connect_error());
?> 
