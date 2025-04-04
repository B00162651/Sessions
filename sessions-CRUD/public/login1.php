
<!-- This is the login for part 6 step 3  -->
 <!-- only works when logged in through the database -->
<link rel="stylesheet" type="text/css" href="../css/signin.css">

    <title>Sign in</title>
</head>


<body>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul>
</ul>
</nav>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" required placeholder="Enter a valid username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" required placeholder="Enter a valid password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>

    <?php
session_start();
// part 6 step 1 server side validation
require("../common.php");

if (isset($_POST['Submit'])) {
    $file = "users.txt";
    $username = trim($_POST['Username']);
    $password = trim($_POST['Password']);

    if (file_exists($file)) {
        $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($users as $user) {
            if ($user === "$username:$password") {
                $_SESSION['Username'] = $username;
                header("Location: index.php");
                exit;
            }
        }
    }
    echo "Incorrect Username or Password.";
}
?>
    </div>
    </body>
</html>