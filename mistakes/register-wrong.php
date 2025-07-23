<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // Block direct access
    header("Location: ./");
    exit();
}
require "connect.php";
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Old Logic

    $name = trim($_POST['name'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $email = trim($_POST['email']?? '');
    $roll_No = trim($_POST['roll'] ?? '');
    $pass = trim($_POST['password']?? '');

    // if(empty($name)){
    //     echo "This Field is required <br>";
    // }else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    //     echo "Only Letters Allowed <br>";
    // }
    
    // if(empty($age)){
    //     echo "This Field is required <br>";
    // }else if($age <= 0 || $age > 120){
    //     echo "Give Proper Age <br>";
    // }
    
    // if(empty($email)){
    //     echo "Email is Required <br>";
    // }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     echo "Give Valid Email <br>";
    // }
    
    // if(empty($roll_No)){
    //     echo "Roll No is Required <br>";
    // }
    
    // if(empty($pass) || strlen($pass) < 8 ){
    //     echo "No pass <br>";
    // }else if(strlen($pass) < 8 ){
    //     echo"wrong pass";
    // }

    //Old Logic

    //New Logic
    if
    (
    empty($name) || 
    empty($age) || 
    empty($email) || 
    empty($roll_No) || 
    empty($pass)
    )
    {
        header('Location: ./');
        // echo "All fields are required <br>";
        $emptyEr = "All Fields are required";
        $_SESSION['empty'] = $emptyEr;
    }else{
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            header('Location: ./');
            // echo "Only Letters Allowed <br>";
            $nameEr = "Only Letters Allowed";
            $_SESSION['nameEr'] = $nameEr;
        }elseif(!is_numeric($age) || $age <= 0 || $age > 120){
            header('Location: ./');
            // echo "Give Proper Age <br>";
            $ageEr = "Give Proper Age";
            $_SESSION['ageEr'] = $ageEr;
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: ./');
            // echo "Give Proper Email";
            $emailEr = "Give Proper Email";
            $_SESSION['emailEr'] = $emailEr;
        }elseif(strlen($pass) < 8 ){
            header('Location: ./');
            // echo "Password Should be strong";
            $passEr = "Password Should be strong";
            $_SESSION['passEr'] = $passEr;
        }elseif(!is_numeric($roll_No)){
            header('Location: ./');
            // echo "Only Numerics Allowed";
            $rollEr = "Give Proper Roll No";
            $_SESSION['rollEr'] = $rollEr;
        }else{
            $stmt = $conn-> prepare("INSERT INTO studentRegistration(Name, Age, Email, Roll_No, Password) VALUES (?,?,?,?,?)");
            $stmt->bind_param('sisis', $name, $age, $email, $roll_No, $pass);
            if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "DB Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
        }
    };
    //New Logic
    
}


?>

<h2>Check Your Details</h2>

<p><?php echo $name; ?></p>
<p><?php echo $age; ?></p>
<p><?php echo $email; ?></p>
<p><?php echo $roll_No; ?></p>
<p><?php echo $pass;?></p>

<?php

//Sending the data to Database

// $stmt = $conn-> prepare("INSERT INTO studentRegistration(Name, Age, Email, Roll_No, Password) VALUES (?,?,?,?,?)");
// $stmt->bind_param('sisis', $name, $age, $email, $roll_No, $pass);

//         if ($stmt->execute()) {
//             echo "Registration successful.";
//         } else {
//             echo "DB Error: " . $stmt->error;
//         }

// $stmt->close();
// $conn->close();

?>


    <h4>Now You Can login here</h4>
    <a href="login.php">Login</a>


