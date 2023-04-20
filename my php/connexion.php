<?php 

// Starten einer Sitzung
session_start(); 

// Einbinden der Datenbankkonfiguration
require_once 'config.php';

// Überprüfen, ob E-Mail- und Passwortfeld ausgefüllt wurden
if(!isset($_POST['email']) || !isset($_POST['password'])) 
{
    header('Location:index.php'); 
    exit;

}

// Abrufen der E-Mail- und Passwortfelder
$email = htmlspecialchars($_POST['email']); 
$password = htmlspecialchars($_POST['password']);

// Ausführen einer Abfrage, um Benutzerinformationen abzurufen, die der E-Mail-Adresse entsprechen
$check = $bdd->prepare('SELECT Vorname, Nachname, email, Passwort FROM benutzer WHERE email = ?');
$check->execute(array($email));
$data = $check->fetch();
$row = $check->rowCount();

// Überprüfen, ob die E-Mail-Adresse in der Datenbank existiert
if($row == 1)
{
    // Überprüfen, ob die E-Mail-Adresse gültig ist
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        // Überprüfen, ob das Passwort übereinstimmt
        if(password_verify($password, $data['Passwort']))
        {
            // Wenn die Authentifizierung erfolgreich ist, Starten der Sitzung und Weiterleitung zur Zielseite
            $_SESSION['user'] = $data['Vorname'] . " " . $data['Nachname']; 
            header('Location:landing.php');  
            exit;
        } else {
            // Bei einem Fehler im Passwort zurückschicken zur Authentifizierungsseite mit einer Fehlermeldung
            header('Location:index.php?login_err=password');
        }
    }else {
        // Bei einer ungültigen E-Mail-Adresse zurückschicken zur Authentifizierungsseite mit einer Fehlermeldung
        header('Location:index.php?login_err=email'); 
    }
}else {
    // Wenn die E-Mail-Adresse nicht in der Datenbank gefunden wird, zurückschicken zur Authentifizierungsseite mit einer Fehlermeldung
    header('Location:index.php?login_err=already'); 
}
?>