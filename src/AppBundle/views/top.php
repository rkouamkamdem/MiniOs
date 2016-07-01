<?php session_start();
if( !empty($deconnexion) and !empty($_SESSION['user']) )
{
    session_destroy();
    unset($_SESSION['user']);
    //die('je passe par ici !!!');
    //header('Location');http://minios.dev/app.php/index
    header("Location: http://minios.dev/app.php/index");
}

if( !empty($session) and empty($_SESSION['user']) )
    $_SESSION['user'] = $session;

?>
<html>

    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $asset('css/style.css'); ?>">
    </head>

    <body>

        <?php include __DIR__ . '/menu.php'; ?>


