


<?php

$servername ="localhost";
$username ="root";
$password ="";
$dbname ="zombie_bank";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    die("could not connect to the database due to following error -->".mysqli_connect_error());

}
?>
