<?php

require "connect.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $userEmail = trim($_POST['useremail'] ?? '');
    $userPass = trim($_POST['userpassword'] ?? '');

    // echo "Email: " .$userEmail ."<br>";
    // echo "Password: " .$userPass ."<br>";

    $stmt = $conn-> prepare("SELECT * FROM studentRegistration where Email = ? && Password = ?");
    $stmt-> bind_param('ss', $userEmail, $userPass);

    //Fetching the data from mysqli
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $ans = $result->fetch_assoc();

            if($ans['Email'] == $userEmail && $ans['Password'] == $userPass && $ans['user_status']){
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
                // header('Location: login.php');
                echo "Invalid Credentials Or user MayBe Removed";
                // header('Location: login.php');
            }

        } else {
            echo "DB Error: " . $stmt->error;
        }

$stmt->close();
$conn->close();

    }

?>

