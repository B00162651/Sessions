<!-- This is the method for part 6 part 3, register form to simply append a users new login info to users.txt file  -->
 

<form action="" method="post">
    <h2>Register</h2>
    <label>Username:</label>
    <!-- server side validation part 6 step 1 -->
    <input type="text" name="username" required placeholder ="Enter a valid username">
    <label>Password:</label>
    <input type="password" name="password" required placeholder="Enter a valid password">
    <button type="submit" name="submit">Register</button>
</form>


<?php
session_start();
// part 6 step 1 server side validation
require("../common.php");
// part 6 step 3 add the data into a file to use as login, tranfer is made into to users.txt for login to pull the data from
//  (used in login1.php to transfer data) 
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // server side validation part 6 step 1
    if (!empty($username) && !empty($password)) {
        $file = "users.txt";
        $userData = $username . ":" . $password . PHP_EOL;
        file_put_contents($file, $userData, FILE_APPEND);
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Please enter a username and password.";
    }
}
?>