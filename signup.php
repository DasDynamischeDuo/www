 <?php
    $connection = mysql_connect("localhost:3306", "default")
        or die("Connection to Database refused");

    mysql_select_db("Accounts")
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
                $query = "SELECT ID FROM Adress WHERE ZIP = '$zip'";
                $result = mysql_query($query);
                $row = mysql_fetch_object($result);
                $adressId = $row->ID;
    
    $result = mysql_query("SELECT ID FROM Account WHERE Username LIKE '$username'");
    $quantity = mysql_num_rows($result);

    if($quantity == 0)
        {
        $result = mysql_query("SELECT ID FROM Adress WHERE ZIP = '$zip'");
        $quantity = mysql_num_rows($result);

        if($quantity == 0)
            {
                $query = "INSERT INTO Adress (Adress, ZIP) VALUES ('$adress', '$zip')";
                mysql_query($query);
            }
                $query = "SELECT ID FROM Adress WHERE ZIP = '$zip'";
                $result = mysql_query($query);
                $row = mysql_fetch_row($result);
                $adressId = $row[2];
       
       
       
        $query = "INSERT INTO Account (Username, Password, Email, Birthday, Adress, AboutMe) VALUES ('$username', '$password', '$email', '$birthday', '$adressId', '$aboutMe')";
        $result = mysql_query($query);

        if($result == true)
            {
            echo "User <b>$username</b> was created. <a href=\"index.html\">Login</a>";
            }
        else
            {
            echo "Error while saving User. <a href=\"signup.html\">Try again!</a>";
            }
        }

    else
        {
        echo "Username is already Used. <a href=\"index.html\">Try again!</a>";
        }
?> 