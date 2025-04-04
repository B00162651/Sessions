<!-- This is part 6 step 4 putting the user data a to a DB -->
<head>
<link rel="stylesheet" type="text/css" href="../css/signin.css">
 <title>Register</title>
</head>
<body>
<!-- Part 6 step 3+4 includes DB with register form -->
<form action="" method="post" name="Register_Form" class="form-signin">
        <h2 class="form-signin-heading">Register</h2>
        <h4 class="form-signin-heading">Already a member <a href="login.php">Sign In!</a></h4>

        <label for="inputUsername">Username</label>
        <input name="username" type="text" id="inputUsername" class="form-control" required placeholder="Make a valid Username" required>

        <label for="inputPassword">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Make a valid Password" required>

        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>

    <a href="login.php">Go to login</a>
</div>

<?php
session_start();
// part 6 step 1 server side validation

// Part 6 step 4 transfer data from registration form into DB(login.php is used for DB tranfer )
if (isset($_POST['submit'])) {
    // part 6 step 1 server side validation
require "../common.php";
try {
require_once '../src/DBconnect.php';
$new_user = array(
"username" => escape($_POST['username']),
"password" => escape($_POST['password'])
);
$sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"users",
implode(", ", array_keys($new_user)),
":" . implode(", :", array_keys($new_user))
);
$statement = $connection->prepare($sql);
$statement->execute($new_user);
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
}

if (isset($_POST['submit']) && $statement){
echo $new_user['username']. ' successfully added';
}
?>


<?php include "../template/footer.php"; ?>