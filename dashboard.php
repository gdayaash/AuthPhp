<?php 
session_start(); 
?>

<?php
if(!isset($_SESSION['Name'])){
    header('Location: login.php');
    exit;
}

?>


<h1>Welcome to the Page <?php echo $_SESSION['Name']; ?></h1>


<p><?php echo $_SESSION['Age'] ?></p>


<p><?php echo $_SESSION['Email'] ?></p>


<p><?php echo $_SESSION['Roll_No'] ?></p>


