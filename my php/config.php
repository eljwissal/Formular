<?php 
try 
{
    // Eine Verbindung zu einer MySQL-Datenbank über PDO herstellen
    // "mysql:host=localhost;dbname=formuler;charset=utf8" gibt den Host der Datenbank (localhost) und ihren Namen (formuler) an.
    // "root" ist der Standardbenutzername für die meisten MySQL-Server. Das Passwort ist in diesem Fall leer.
    $bdd = new PDO("mysql:host=localhost;dbname=formuler;charset=utf8", 'root', '');
}
catch(PDOException $e)
{
    // Wenn eine PDO-Fehler auftritt, wird dieser Teil ausgeführt.
    // Die getMessage() Methode zeigt die Fehlermeldung an, die von MySQL gesendet wurde.
    die('Fehler: '.$e->getMessage());
}
?>