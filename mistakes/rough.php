<?php

// AJAX PHP WAY



$nameEr;
$ageEr;
$emailEr;
$rollEr;
$passEr;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty($_POST['name'])){
        $nameEr = "Name is Required";    
    }else{
        $name = trim($_POST['name']);
    }

    if(empty($_POST['age'])){
        $AgeEr = "Age is Required";    
    }else{
        $age = intval(trim($_POST['age']));
    }

    if(empty($_POST['email'])){
        $emailEr = "Email is Required";    
    }else{
        $email = trim($_POST['email']);
    }

    if(empty($_POST['roll'])){
        $rollEr = "Roll No is Required";    
    }else{
       $roll_No = intval(trim($_POST['roll']));
    }

    if(empty($_POST['password'])){
        $passEr = "Roll No is Required";    
    }else{
        $pass = trim($_POST['password']);
    }

}


?>