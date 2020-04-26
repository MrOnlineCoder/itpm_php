<?php
//  guard.php
//  Checks if user is in testing process.
//
session_start();

if (!$_SESSION['testing']) {
    header('Location: ../index.php');
    return;
}
?>