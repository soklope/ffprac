<?php 
//connect to DB
$conn = mysqli_connect('localhost', 'soklope', 'soklope123', 'ninja_pizza');

// check connection
if(!$conn){
    echo 'connection error: ' . mysqli_connect_error(); 
}


?>
