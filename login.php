 <?php
    session_start();

   
    $connection = mysql_connect ("localhost:3306", "default") or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    mysql_select_db("Account") or die("Datenbank konnte nicht ausgewählt werden");

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $abfrage = "SELECT Username, Password FROM Accounts WHERE Username LIKE '$username' LIMIT 1";
    $ergebnis = mysql_query($abfrage);
    $row = mysql_fetch_object($ergebnis);

    if($row->Password == $password)
    {
        $_SESSION["username"] = $username;
        header("Location: http://mytastypi.ddns.net/profile.php");
        exit();
    }
    else
    {
        echo $username . " " . $password;
        echo "Benutzername und/oder Passwort waren falsch. <a href=\"index.html\">Login</a>";
    }
    
    

?> 