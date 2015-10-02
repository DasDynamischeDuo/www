<?php
session_start();
?>

<?php
if(!isset($_SESSION["username"]))
   {
   echo "Bitte erst <a href=\"login.html\">einloggen</a>";
   exit;
   }
    else
    {
    print $_SESSION["username"];
    }
?> 