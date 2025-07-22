<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sign in to Explore</h1>
    <!-- (Email, Password) -->
    <div class="form-wrapper">
     <form action="authenticate.php" method="post">

        <div class="form-col">
            <label for="email">Email</label>
            <input type="email" name="useremail" id="email">
        </div>

        <div class="form-col">
            <label for="pass">Password</label>
            <input type="password" name="userpassword" id="pass">
        </div>
        
        <div class="form-col">
            <button type="submit">Sign In</button>
        </div>

        <div class="form-col">
            <span><?php echo $error; ?></span>
        </div>
     </form>
    </div>
</body>
</html>