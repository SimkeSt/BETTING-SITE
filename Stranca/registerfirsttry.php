<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = ("SELECT * FROM User WHERE Email=:email");
        $result = mysqli_query($db, $query);
        if ($result) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($result>rowCount() == 0) {
            $query1 = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password,:email)");
            $result1 = mysqli_query($db, $query1);
            if ($result1) {
                echo '<p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>


<form method="post" action="" name="signup-form">
<div class="form-element">
<label>Username</label>
<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
</div>
<div class="form-element">
<label>Email</label>
<input type="email" name="email" required />
</div>
<div class="form-element">
<label>Password</label>
<input type="password" name="password" required />
</div>
<button type="submit" name="register" value="register">Register</button>
</form>