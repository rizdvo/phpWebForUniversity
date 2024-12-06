<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" href="interface/logo-o.png">
        <title>Чотири лапи</title>
    </head>
    <body>

        <?php
            require_once "functions.php";
            $mysqli = new mysqli( "localhost", "root", "", "animals" );
            if ( $mysqli->connect_errno ) {
                echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                die();
            }

            $mysqli->set_charset( "utf8" );
            global $page_id;
            $page_id = ( isset( $_REQUEST['page'] ) ) ? (int) $_REQUEST['page'] : 0;

            global $cat_id;
            $cat_id = ( isset( $_REQUEST['cat'] ) ) ? (int) $_REQUEST['cat'] : 0;
        ?>

        <?php include "header.php"; ?>

        <?php
            if ( $page_id ) {
                include "content.php";
            } else {
                include "homepage.php";
            }
        ?>

        <?php include "footer.php"; ?>

        <?php $mysqli->close(); ?>
    </body>
</html>