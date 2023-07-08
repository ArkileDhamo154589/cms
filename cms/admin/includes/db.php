<?php
//in phpMyAdmin create a new db cms 
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'cms';


$conn =  new mysqli ($servername,$username,$password,$database);


//if connection to your db not working show the error
if ($conn->connect_error){
    die('Conection failed:' .$conn->connect_error);
}
 //if it's working you will see this message.
 //echo 'Connect Succesfuly';