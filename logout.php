<?php
include('includes/connect.php');
include('includes/function.php');
session_start();
session_unset();
session_destroy();

header('location:index.php');
?>