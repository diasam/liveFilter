<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vendita bibite login</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h1></h1>
<div class="loginBox">
    <h3>Login Form</h3>
    <a href="registration.php">Register</a>
    <br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="username" /><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="password" />  <br><br>
        <input type="submit" name="submit" value="Login" />
    </form>
    <div class="error">
        <?php
            include("check.php");
        ?>
    </div>
</div>
</body>
</html>