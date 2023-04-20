<?php 
    session_start(); // startet die Session
    session_destroy(); // löscht alle Session-Variablen
    header('Location:index.php'); // leitet zur Seite "index.php" weiter
?>