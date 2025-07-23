<?php

require "connect.php";

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header('Location: login.php');
}else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $userEmail = trim($_POST['useremail'] ?? '');
    $userPass = trim($_POST['userpassword'] ?? '');

    $sqlquery = "SELECT * FROM studentRegistration WHERE Email = ? AND Password = ? AND user_status = 1 ORDER BY Roll_No ASC LIMIT 1"; 
    echo $sqlquery;

    $stmt = $conn->prepare($sqlquery);
    $stmt->bind_param('ss', $userEmail, $userPass);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows===1){
        $ans = $result->fetch_assoc();
        session_start();
        $_SESSION['Name'] = $ans['Name'];
        $_SESSION['Age'] = $ans['Age'];
        $_SESSION['Email'] = $ans['Email'];
        $_SESSION['Roll_No'] = $ans['Roll_No'];
        $_SESSION['Password'] = $ans['Password'];
        $_SESSION['user_status'] = $ans['user_status'];
        header('Location: dashboard.php');
        exit;
    }else{
        echo "DB ERROR" .$stmt->error;
        header('Location: login.php');
        
    }
}
$stmt->close();
$conn->close();
}


?>

