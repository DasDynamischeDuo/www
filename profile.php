<?php
        session_start();
?>


<?php
        
        print "test";
        
        $username = $_SESSION["username"];

        $connection = mysql_connect("localhost", "root", "1234.abcd");
        $db = mysql_select_db("test");

        $query = "SELECT * FROM Login WHERE Username = " . $username . ";"
        $ergebnis = mysql_query($abfrage);
        print $ergebnis;
?>
            