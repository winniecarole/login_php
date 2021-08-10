<?php
/**
 *  erzeugt eine Session oder nimmt die aktuelle wieder auf
 */
session_start();
/**
 * Variable declaration wird geprüft
 */

if(!isset($_SESSION["username"])) //return true false der angegebene Wert existiert
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!--Username wird angezeigt-->
<h1>THIS IS USER HOME PAGE</h1><?php echo $_SESSION["username"] ?>

<a href="logout.php">Logout</a>

</body>
</html>