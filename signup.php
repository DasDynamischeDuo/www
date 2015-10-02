 <?php
    $verbindung = mysql_connect("localhost", "root" , "1234.abcd")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

    mysql_select_db("test")
        or die ("Datenbank konnte nicht ausgewaehlt werden");

    $username = $_POST["username"];
    $passwort = $_POST["passwort"];
    $passwort2 = $_POST["passwort2"];

    if($passwort != $passwort2 OR $username == "" OR $passwort == "")
        {
        echo "Eingabefehler. Bitte alle Felder korekt ausfüllen. <a href=\"eintragen.html\">Zurück</a>";
        exit;
        }
    $passwort = md5($passwort);

    $result = mysql_query("SELECT id FROM login WHERE username LIKE '$username'");
    $menge = mysql_num_rows($result);

    if($menge == 0)
        {
        $eintrag = "INSERT INTO Login (Username, Password) VALUES ('$username', '$passwort')";
        $eintragen = mysql_query($eintrag);

        if($eintragen == true)
            {
            echo "Benutzername <b>$username</b> wurde erstellt. <a href=\"login.html\">Login</a>";
            }
        else
            {
            echo "Fehler beim Speichern des Benutzernames. <a href=\"eintragen.html\">Zurück</a>";
            }


        }

    else
        {
        echo "Benutzername schon vorhanden. <a href=\"eintragen.html\">Zurück</a>";
        }
?> 