<?php
    // Starte eine Session, um die Benutzerinformationen abzurufen, die beim Einloggen gespeichert wurden
    session_start();

    // Wenn die Benutzersitzung nicht definiert/initialisiert ist, wird der Benutzer zur Startseite (hier index.php) umgeleitet
    if(!isset($_SESSION['user'])) {
        header('Location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Füge die CSS-Datei für Magnific Popup hinzu -->
    <link href="https://cdnss.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Füge die CSS-Datei für Bootstrap hinzu -->
    <Link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Hallo!</title>
</head>
<body>
    <!-- Zeige eine Willkommensnachricht an, indem der Name des Benutzers aus der Session verwendet wird -->
    <h1>Hallo! <?php echo $_SESSION['user']; ?></h1>
    <!-- Füge einen Logout-Button hinzu, der es dem Benutzer ermöglicht, sich auszuloggen -->
    <a href="deconnexion.php" class="btn btn-danger btn-lg">Abmelden</a>
</body>
</html>