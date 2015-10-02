<?php

    session_start();

    include(profile.php);
    echo $_SESSION["username"];

?>