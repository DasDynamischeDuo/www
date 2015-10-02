 <?php
    session_start();
?>

<?php
    $verbindung = mysql_connect("localhost", "root" , "1234.abcd")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    mysql_select_db("test") or die ("Datenbank konnte nicht ausgewählt werden");

    $username = $_POST["username"];
    $passwort = md5($_POST["password"]);

    $abfrage = "SELECT Username, Password FROM Login WHERE Username LIKE '$username' LIMIT 1";
    $ergebnis = mysql_query($abfrage);
    $row = mysql_fetch_object($ergebnis);


    if($row->Password == $passwort)
        {
        $_SESSION["username"] = $username;
        echo "Login erfolgreich. <br> <a href=\"profile.html\">Zum Profiel</a>";
        }
    else
        {
        echo "Benutzername und/oder Passwort waren falsch. <a href=\"index.html\">Login</a>";
        }

    session_register_shutdown();

?> 