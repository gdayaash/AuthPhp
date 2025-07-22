<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Register Here</h1>
    <!-- (Name, Age, Email, Roll Number, Password) -->
    <div class="form-wrapper">
     <form action="register.php" method="post" class="fregister">

        <div class="form-col">
            <label for="name">Name</label> <span><?php echo $nameEr; ?></span>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-col">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" min="1" max="99">
        </div>

        <div class="form-col">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-col">
            <label for="roll">Roll No</label>
            <input type="number" name="roll" id="roll">
        </div>

        <div class="form-col">
            <label for="pass">Password</label>
            <input type="password" name="password" id="pass">
        </div>
        
        <div class="form-col">
            <button type="submit">Submit & Register</button>
        </div>



     </form>
    </div>

</body>
</html>