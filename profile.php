<?php

    session_start();

    include(profile.html);
    echo $_SESSION["username"];

?>