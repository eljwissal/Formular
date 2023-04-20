<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="NoS1gnal"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>Registrierung</title>
    </head>

    <body>
    <div class="login-form"> 
    <!-- Der PHP-Code gibt je nach Anmeldestatus Fehler- oder Bestätigungsmeldungen aus -->
    <?php
        // Überprüfen Sie, ob die Seite mit einem Registrierungsfehler aufgerufen wird
        if(isset($_GET['reg_err']))
        {
            // Ruft den Fehler ab und gibt ihn in einer entsprechenden Meldung aus
            $err = htmlspecialchars($_GET['reg_err']);
            switch($err)
            {
                case 'success':
                    // Gibt eine Bestätigungsmeldung aus, wenn die Anmeldung erfolgreich ist
                    ?>
                    <div class="alert alert-success">
                        <strong>Erfolg</strong> erfolgreiche Anmeldung!
                    </div>
                    <?php
                    break;
                case 'password':
                    // Gibt eine Fehlermeldung aus, wenn das Passwort falsch eingegeben wurde
                    ?>
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> anderes Passwort.
                    </div>
                    <?php
                    break;
                case 'email':
                    // Gibt eine Fehlermeldung aus, wenn die E-Mail ungültig ist
                    ?>
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> ungültige E-Mail.
                    </div>
                    <?php
                    break;
                case 'Vorname':
                    // Gibt eine Fehlermeldung aus, wenn die Vorname zu lang ist
                    ?>
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> Vorname zu lang.
                    </div>
                    <?php
                    break;
                case 'Nachname':
                    // Gibt eine Fehlermeldung aus, wenn der Nachname zu lang ist
                    ?>
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> Nachname zu lang.
                    </div>
                    <?php
                    break;
                case 'already':
                    // Gibt eine Fehlermeldung aus, wenn ein Konto mit dieser E-Mail bereits existiert
                    ?>
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> bereits bestehendes Konto.
                    </div>
                    <?php
                    break;
            }
        }
    ?>

    <!-- Mit dem <form> Tags erstellen wir das Anmeldeformular -->
    <form action="inscription_traitement.php" method="post">
        <h2 class="text-center">Anmeldung</h2> 
        <!-- Das <select> Tags erstellt eine Dropdown-Liste, die es dem Benutzer ermöglicht, eine Option auszuwählen -->
        <div class="form-group">
            <select name="anrede" class="form-control" required="required">
                <option value="">Anrede auswählen</option>
                <option value="herr">Herr</option>
                <option value="frau">Frau</option>
            </select>
        </div>

        <!-- Das <input> Tag zum Erstellen von Formularfeldern, in denen der Benutzer Informationen eingeben kann -->
        <div class="form-group">
            <input type="text" name= "vorname"  class="form-control" placeholder="Vorname" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name= "nachname"  class="form-control" placeholder="Nachname" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="date" name= "geburtsdatum"  class="form-control" placeholder="Geburtsdatum" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name= "strasse_hausnummer"  class="form-control" placeholder="Straße_Hausnummer" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name= "plz"  class="form-control" placeholder="PLZ" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name= "ort"  class="form-control" placeholder="Ort" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name= "telefonnummer"  class="form-control" placeholder="Telefonnummer" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="email" name= "email"  class="form-control" placeholder="E-Mail-Adresse" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name= "passwort"  class="form-control" placeholder="Passwort" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name= "staatsbuergerschaft"  class="form-control" placeholder="Staatsbürgerschaft" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <!-- Das <button> Tag erstellt eine Schaltfläche zum Absenden des Formulars -->
            <button type="submit" class="btn btn-primary btn-block">Anmeldung</button>
        </div> 
    </form>

    <!--style CSS!-->
    <style>
        .login-form {
            width: 350px;
            margin: 50px auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</body>
