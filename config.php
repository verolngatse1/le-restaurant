<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Erreur connexion: " . $conn->connect_error);
}

// Pour les accents français
$conn->set_charset("utf8mb4");
?>