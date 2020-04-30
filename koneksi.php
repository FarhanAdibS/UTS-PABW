<?php
    $host = "localhost";
    $dbname = "farhanakhbar";
    $username = "farhanak";
    $password = "Adib1234";
    try {
        $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception){
        die("Connection error: " . $exception->getMessage());
    }
	
?>
