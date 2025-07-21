<?php session_start(); ?>

<?php 
require "connect.php"; 
?>

<?php
$remove = 0;
$removeuser = $_SESSION['Email'];

echo $removeuser;

$stmt = $conn->prepare("UPDATE studentRegistration SET user_status = ? WHERE EMAIL = ?");
$stmt->bind_param('is', $remove, $removeuser);

if($stmt->execute()){
    echo "<h1>You have been successfully Removed.";
}else{
    echo "db Error";
}

$stmt->close();
$conn->close();

?>