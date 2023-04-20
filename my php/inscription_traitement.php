<?php
// Inklusion der Datenbankkonfiguration
require_once 'config.php';

// Überprüfung, ob erforderliche Felder im Formular ausgefüllt wurden
if (!empty($_POST['vorname']) && !empty($_POST['nachname']) && !empty($_POST['email']) && !empty($_POST['passwort'])) {
    // Wenn alle Felder ausgefüllt sind, speichern wir die eingereichten Daten in Variablen
    $andere = isset($_POST['andere']) ? htmlspecialchars($_POST['andere']) : "";
    $vorname = htmlspecialchars($_POST['vorname']);
    $nachname = htmlspecialchars($_POST['nachname']);
    $geburtsdatum = htmlspecialchars($_POST['geburtsdatum']);
    $strasse_hausnummer = htmlspecialchars($_POST['strasse_hausnummer']);
    $plz = htmlspecialchars($_POST['plz']);
    $ort = htmlspecialchars($_POST['ort']);
    $telefonnummer = htmlspecialchars($_POST['telefonnummer']);
    $email = strtolower(htmlspecialchars($_POST['email']));
    $passwort = htmlspecialchars($_POST['passwort']);
    $staatsbuergerschaft = htmlspecialchars($_POST['staatsbuergerschaft']);

    // Überprüfen, ob die E-Mail-Adresse bereits in der Datenbank verwendet wird
    $check_email = $bdd->prepare('SELECT vorname, nachname, email FROM benutzer WHERE email = ?');
    $check_email->execute(array($email));
    $row = $check_email->rowCount();

    // Wenn die E-Mail-Adresse in der Datenbank noch nicht verwendet wird, können wir das Konto erstellen
    if ($row == 0) {
        // Überprüfen der Länge der Felder `vorname` und `nachname`
        if (strlen($vorname) <= 100) {
            if (strlen($nachname) <= 100) {
                // Überprüfen der Gültigkeit der E-Mail-Adresse
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Überprüfen, ob die beiden eingegebenen Passwörter übereinstimmen
                    if ($passwort == $passwort) {
                        // Wenn alle Überprüfungen bestanden sind, hashen wir das Passwort
                        $hashed_passwort = hash('sha256', $passwort);
                        $id = $_SERVER['REMOTE_ADDR'];

                        // Wir fügen die Benutzerdaten der Datenbank hinzu
                        $insert = $bdd->prepare('INSERT INTO benutzer(andere, vorname, nachname, geburtsdatum, straße_hausnummer, plz, ort, telefonnummer, email, passwort, staatsbürgerschaft, id) VALUES(:andere, :vorname, :nachname, :geburtsdatum, :strasse_hausnummer, :plz, :ort, :telefonnummer, :email, :hashed_passwort, :staatsbuergerschaft, :id)');
                        $insert->execute(array(
                            'andere' => $andere,
                            'vorname' => $vorname,
                            'nachname' => $nachname,
                            'geburtsdatum' => $geburtsdatum,
                            'strasse_hausnummer' => $strasse_hausnummer,
                            'plz' => $plz,
                            'ort' => $ort,
                            'telefonnummer' => $telefonnummer,
                            'email' => $email,
                            'hashed_passwort' => $hashed_passwort,
                            'staatsbuergerschaft' => $staatsbuergerschaft,
                            'id' => $id
                        ));
                        // Umleitung des Benutzers zu einer Erfolgsseite
                        header('Location: inscription.php?reg_err=success');
                    } else {
                        // Umleitung des Benutzers auf eine Seite mit einem Passwortfehler
                        header('Location: inscription.php?reg_err=password');
                    }
                } else {
                    // Umleitung des Benutzers auf eine Seite mit einem E-Mail-Adressfehler
                    header('Location: inscription.php?reg_err=email');
                }
            } else {
                // Umleitung des Benutzers auf eine Seite mit einer ungültigen Länge für das Feld `nachname`
                header('Location: inscription.php?reg_err=email_length');
            }
        } else {
            // Umleitung des Benutzers auf eine Seite mit einer ungültigen Länge für das Feld `vorname`
            header('Location: inscription.php?reg_err=user_length');
        }
    } else {
        // Umleitung des Benutzers auf eine Seite, die anzeigt, dass die E-Mail-Adresse bereits verwendet wird
        header('Location: inscription.php?reg_err=already');
    }
}
?>