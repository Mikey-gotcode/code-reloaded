<?php
session_start(); 
include "./dbcon.php";
error_reporting($ERR_ALL);


$query="SELECT * FROM ``";
$result=mysqli_query($conn,$query);


//method 2
$result2=mysqli_query($conn,$query);

$options="";

while($row2=mysqli_fetch_array($result2))
{
    $options=$options."<options>$row2[1]</options>";
}

























?>