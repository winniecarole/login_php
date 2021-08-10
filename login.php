<?php

$host="localhost";
$user="root";
$password="";
$db="user";
/**
 * Variable declaration wird geprüft
 */
session_start();
/**
 * verbindung mit der Database
 */

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}

//post request
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];


    $sql="select * from login where username='".$username."' AND password='".$password."' ";

    /**
     * Um die Abfrage jetzt auch auszuführen und die dabei erhaltenen Daten in einer Variable
     * zu speichern verwenden wir den Befehl mysqli_query
     */
    $result=mysqli_query($data,$sql); //envois une requete a une base de donnee

    $row=mysqli_fetch_array($result);//retourne une ligne de résultat sous la forme d’un tableau.

    /**
     * user
     */
    if($row["usertype"]=="user")
    {

        $_SESSION["username"]=$username;

        header("location:user.php");
    }
    /**
     * admin
     */

    elseif($row["usertype"]=="admin")
    {

        $_SESSION["username"]=$username;

        header("location:admin.php");
    }

    else
    {
        echo "username or password incorrect";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<h1>Login Form</h1>
<center>
    <div>
        <!--INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES (NULL, 'admin', 'winnie', 'user');-->
        <form action="#" method="POST">

            <div>
                <label>username</label>
                <input type="text" name="username" required>
            </div>
            <br><br>

            <div>
                <label>password</label>
                <input type="password" name="password" required>
            </div>
            <br><br>

            <div>

                <input type="submit" value="Login">
            </div>


        </form>

    </div>
</center
</body>
</html>
