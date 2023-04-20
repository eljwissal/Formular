<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="NoS1gnal"/>

        <!-- Importieren von CSS-Dateien von Magnific-Popup und Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <!-- Titel der HTML-Seite -->
        <title>Login</title>
    </head>
    <body>
    
    <!-- Div-Element mit der Klasse "login-form", das das Login-Formular umgibt -->
    <div class="login-form">
    
        <?php
        // Überprüfen, ob der Benutzer eine Fehlermeldung erhalten hat
        if(isset($_GET['login_err']))
        {
            // Sichern und Anzeigen der Fehlermeldung
            $err = htmlspecialchars($_GET['login_err']);
        
            switch($err)
            {
                case 'password':
                    ?>
                    <!-- Falsches Passwort -->
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> Falsches Passwort
                    </div>
                    <?php
                    break;
        
                case 'email':
                    ?>
                    <!-- Falsche E-Mail -->
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> Falsche E-Mail
                    </div>
                    <?php
                    break;
        
                case 'already':
                    ?>
                    <!-- Nicht vorhandenes Konto -->
                    <div class="alert alert-danger">
                        <strong>Fehler</strong> Konto nicht vorhanden
                    </div>
                    <?php
                    break;
            }
        }
        ?>
        
        <!-- Login-Formular mit Benutzername-, E-Mail- und Passwort-Eingabefeldern -->
        <form action="connexion.php" method="post">
            <h2 class="text-center">Anmeldung</h2>       
            <div class="form-group">
                <input type="text" name="user" class="form-control" placeholder="user" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input name='submit' type="submit" class="btn btn-primary btn-block" value="Anmeldung" />               
            </div>   
        </form>
        
        <!-- Link zur Registrierungsseite -->
        <p class="text-center"><a href="inscription.php">Registrierung</a></p>
        
    </div>
    
    <!-- CSS-Regeln, die das Login-Formular formatieren -->
    <style>
        .login-form {
            width: 340px;
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
</html>
