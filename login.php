 <?php
    session_start();

   
    $connection = mysql_connect ([ string $server = ini_get("mysql.default_host") [, string $username = ini_get("mysql.default_user") [, string $password = ini_get("mysql.default_password") [, bool $new_link = false [, int $client_flags = 0 ]]]]] ) or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    mysql_select_db("test") or die ("Datenbank konnte nicht ausgewählt werden");

    $username = $_POST["username"];
    $passwort = md5($_POST["password"]);

    $abfrage = "SELECT Username, Password FROM Login WHERE Username LIKE '$username' LIMIT 1";
    $ergebnis = mysql_query($abfrage);
    $row = mysql_fetch_object($ergebnis);
  
    if($row->Password == $passwort)
    {
        $_SESSION["username"] = $username;
        header("Location: http://mytastypi.ddns.net/profile.php");
        exit();
    }
    else
    {
        echo "Benutzername und/oder Passwort waren falsch. <a href=\"index.html\">Login</a>";
    }
    
    

?> 