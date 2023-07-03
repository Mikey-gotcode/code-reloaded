<?php 
session_start();
include "./dbcon.php";

if($_SERVER["REQUEST METHOD"]=="POST" && $_POST['login'])
$user_type=$_POST['user_type'];
$userName=$_POST['Username'];
$passWord=$_POST['Password'];

$table=''

if($user_type=='doctor'){
    header(location:doctor.php);
    exit();

}elseif($user_type=='patient'){
    header(location:patient.php);
    exit();

}elseif($user_type=='phCompany'){
    header(location:pharmaceuticalCompany.php);
    exit();
}elseif($user_type=='supervisor'){
    header(location:supervisor.php);
    exit();
    
}else{
    echo'<script>alert("user type not selected")</script>';
}









?>