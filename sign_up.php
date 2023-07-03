<?php 
session_start();


if($_SERVER["REQUEST METHOD"]=="POST"&& isset($_POST['user_type']))
$user_type=$_POST['user_type'];


if($user_type==doctor){
    header(location:add_doctors.php);
    exit();

}elseif($user_type==patient){
    header(location:add_patient.php);
    exit();

}elseif($user_type==phCompany){
    header(location:)add_pharmaceuticalCompany.php;
    exit();

}elseif($user_type==supervisor){
    header(location:add_supervisor.php);
    exit();

}else{
    echo'<script>alert("invalid request made")</script>';
}












?>