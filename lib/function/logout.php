<?php
    //lets start the sessions
    session_start();

    session_reset();
    session_destroy();

    //reserect user bak to login
    header('location:../view/login.php');
?>