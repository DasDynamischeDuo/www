<?php

   session_start(); 

    echo $_SESSION["username"];
    include(profile.html);

?>