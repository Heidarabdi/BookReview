<?php
$host = "localhost";
$user = "root";
$password = "ca120";
$dbname = "bookreview";
$GLOBALS['conn'] = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

