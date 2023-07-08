<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'cms';


$conn =  new mysqli ($servername,$username,$password,$database);

if ($conn->connect_error){
    die('Conection failed:' .$conn->connect_error);
}

echo 'Connect Succesfuly';