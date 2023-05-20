<?php
    session_start();
    session_unset();
    header("location: acceuil.php");
?>