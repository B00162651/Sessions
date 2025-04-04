<!--  this is the databse login page  -->
<head>
<title>Sign in</title>

<link rel="stylesheet" type="text/css" href="../css/signin.css">
</head>
<body>
<a href="index.php">Home</a>

    <h1>Below you can find pages to scroll without logging in!</h1>
    <a href="hello.php">Free Roam</a>
    <a href="hello2.php">Free Access</a>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul>
</ul>
</nav>
<div class="container">
    <!--Part 6 part 1-->
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <h4 class="form-signin-heading">If not a member <a href="register.php">sign up!</a></h4>
        <label for="inputUsername" >Username</label>
        <!--CLient side validation-->
        <input name="Username" type="username" id="inputUsername" class="form-control" required placeholder="Enter a valid Username" required autofocus>
        <label for="inputPassword">Password</label>
        <!--CLient side validation-->
        <input name="Password" type="password" id="inputPassword" class="form-control" required placeholder="Enter a valid Password" required>
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
function check() {
    if (isset($_POST['Submit'])) {
        //server side validation part 6 step 1 (paswword or username empty, error occurs)
        if (empty($_POST['Username']) || empty($_POST['Password'])) {
            echo "<p>Username and password are required</p>";
            return;
        }

        $tmpUser = trim($_POST['Username']);
        $tmpPass = $_POST['Password'];

        try {
            // part 6 step 4 taking the database data and comparing it to see if it matches to login
            require_once("../config.php");
            $connection = new PDO($dsn, $username, $password, $options);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL query to select through the db for user input part 6 step 4 
            $sql = "SELECT username, password FROM users WHERE username = :user";
            $stmt = $connection->prepare($sql);

            // Bind parameter
            $stmt->bindParam(":user", $tmpUser, PDO::PARAM_STR);
            $stmt->execute();

            // Fetch user data
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $fname_db = $result['username'];
                $pwd_db = $result['password'];

                //server side validation part 6 step 1 if correct goes to home
                if ($tmpUser == $fname_db && $tmpPass == $pwd_db) {
                    $_SESSION['username'] = $fname_db;
                    $_SESSION['Active'] = true;
                    header("Location: index.php");
                    exit;
                }
            }
            // error message
            echo "<p>Incorrect username or password</p>";

        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }
}

// call the function
check();
?>
