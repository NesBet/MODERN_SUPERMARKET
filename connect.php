<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='Kibet#Rono5420';
$DATABASE='Sign Up';

$con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$con){
    die(mysqli_connect_error());
}

?>