<?php
require "connect.php";

echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = trim($_POST['name'] ?? '');
    $nameErr;
    $age = intval(trim($_POST['age'])?? '');
    $email = trim($_POST['email']?? '');
    $roll_No = intval(trim($_POST['roll'])?? '');
    $pass = trim($_POST['password']?? '');

  

    if(empty($name)){
        echo "This Field is required <br>";
    }else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        echo "Only Letters Allowed <br>";
    }
    
    if(empty($age)){
        echo "This Field is required <br>";
    }else if($age <= 0 || $age > 120){
        echo "Give Proper Age <br>";
    }
    
    if(empty($email)){
        echo "Email is Required <br>";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Give Valid Email <br>";
    }
    
    if(empty($roll_No)){
        echo "Roll No is Required <br>";
    }
    
    if(empty($pass) || strlen($pass) < 8 ){
        echo "No pass <br>";
    }else if(strlen($pass) < 8 ){
        echo"wrong pass";
    }

    
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

$stmt = $conn-> prepare("INSERT INTO studentRegistration(Name, Age, Email, Roll_No, Password) VALUES (?,?,?,?,?)");
$stmt->bind_param('sisis', $name, $age, $email, $roll_No, $pass);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "DB Error: " . $stmt->error;
        }

$stmt->close();
$conn->close();

?>


    <h4>Now You Can login here</h4>
    <a href="login.php">Login</a>


