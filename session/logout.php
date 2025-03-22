<?php
session_start();
session_destroy(); 

// Redirect 
header("Location: ../publik/login.php");
exit;
