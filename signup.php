 <?php
    $connection = mysql_connect("localhost:3306", "default")
        or die("Connection to Database refused");

    mysql_select_db("Account")
        or die ("Database not found");

    $username = $_POST["username"];
    $password = $_POST["passwort"];
    $password2 = $_POST["passwort2"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $adress = $_POST["adress"];
    $zip = $_POST["zip"];
    $aboutMe = $_POST["aboutMe"];

    if($password != $password2 OR $username == "" OR $password == "")
        {

        echo "Input error. <a href=\"signup.html\">Try again</a>";
        exit;
        }
    $password = md5($password);

    
    $result = mysql_query("SELECT ID FROM Accounts WHERE Username LIKE '$username'");
    $quantity = mysql_num_rows($result);

    if($quantity == 0)
        {
        $result = mysql_query("SELECT ID FROM Adress WHERE ZIP = '$zip'");
        $quantity = mysql_num_rows($result);

        if($quantity == 0)
            {
                $query = "INSERT INTO Adress (Adress, Zip) VALUESE ('$adress', '$zip')";
            }
                $query = "SELECT ID FROM Adress WHERE Adress = '$adress'";
                $result = mysql_query($query);
                $row = mysql_fetch_object($result);
                $adressId = $row->ID;
       
       
       
        $query = "INSERT INTO Accounts (Username, Password, Email, Brithday, Adress, AboutMe) VALUES ('$username', '$password', '$email', '$birthday', '$adressId', '$aboutMe')";
        $result = mysql_query($query);

        if($result == true)
            {
            echo "User <b>$username</b> was created. <a href=\"index.html\">Login</a>";
            }
        else
            {
            echo "Error while saving User. <a href=\"signup.html\">Try again!</a>";
            localhost:3306
                    print "<br>Password: " . $password . "<br>";
                    print "Username: " . $username . "<br>";
                    print "Email: " . $email . "<br>";
                    prlocalhost:3306int "Birthday: " . $birthday . "<br>";
                    print "About Me: " . $aboutMe . "<br>";
                    print "About Me: " . $adressId . "<br>";
            localhost:3306
            }
        }

    else
        {
        echo "Username is already Used. <a href=\"index.html\">Try again!</a>";
        }
?> 