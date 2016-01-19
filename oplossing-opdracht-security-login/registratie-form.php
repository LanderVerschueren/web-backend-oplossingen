<?php
    session_start();

    $email = "";
    $password = "";
    $message = "";

    $emailValid = true;
    $passwordFilledIn = true;
    $success = false;
    $cookieSet = true;

    if ( isset($_SESSION[ "registration" ][ "email" ]) ) {
        $email = $_SESSION[ "registration" ][ "email" ];
    }

    if ( isset($_SESSION[ "registration" ][ "password" ]) ) {
        $password = $_SESSION[ "registration" ][ "password" ];
    }

    if ( isset($_SESSION[ "notification" ]) && $_SESSION[ "notification" ][ "type" ] == "errorEmail" ) {
        $message = $_SESSION[ "notification" ][ "message" ];
        $emailValid = false;
    }

    if ( isset($_SESSION[ "notification" ]) && $_SESSION[ "notification" ][ "type" ] == "errorPassword" ) {
        $message = $_SESSION[ "notification" ][ "message" ];
        $passwordFilledIn = false;
    }

    if ( isset($_SESSION[ "notification" ][ "type" ]) && $_SESSION[ "notification" ][ "type" ] == "success" ) {
        $success = true;
    }

    if ( isset($_SESSION[ "notification" ][ "type" ]) && $_SESSION[ "notification" ][ "type" ] == "errorCookieNotSet" ) {
        $message = $_SESSION[ "notification" ][ "message" ];
        $cookieSet = false;
    }

?>


<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
        .error {
            background-color: red;
        }

        .errorText {
            color: red;
        }
    </style>
</head>
<body>
    <pre><?php var_dump($_SESSION["registration"]) ?></pre>
    <pre><?php var_dump($_SESSION["post"]) ?></pre>


    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-12">
                    <?php if (!$success): ?>
                        <h1>Registreren</h1>

                        <?= ($cookieSet) ? '' : '<h4 class="errorText">' . $message . '</h4>' ?>

                        <form action="registratie-proces.php" method="POST"> 
                            <label for="email">E-mail</label><br>
                            <input type="text" name="email" id="email" value="<?= $email ?>" <?= ($emailValid) ? '' : 'class="error" autofocus' ?>><br>
                            <?= ($emailValid) ? '' : '<label class="errorText">' . $message . '</label><br>' ?>

                            <label for="password">Paswoord</label><br>
                            <input name="password" id="password" type="text" value="<?= $password ?>" <?= ($passwordFilledIn) ? '' : 'class="error" autofocus' ?>?>
                                    
                            <input type="submit" name="submit-generate" id="submit" value="Genereer een paswoord"><br>
                            <?= ($passwordFilledIn) ? '' : '<label class="errorText">' . $message . '</label><br>' ?>
                            <input type="submit" name="submit-register" id="submit" value="Registreer">
                        </form>
                    <?php endif ?>
                    <?php if ($success): ?>
                        <h1>U bent nu ingelogd!</h1>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
