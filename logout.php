<?php

//initialise session
session_start();
//unset session
session_unset();
//destroy session
session_destroy();
 
 
 if(!isset($_SESSION['username']))
 {
 header('Location: ./index.html');
 }
 ?>