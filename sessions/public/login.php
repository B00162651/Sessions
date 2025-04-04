
<link rel="stylesheet" type="text/css" href="../css/signin.css">
<?php
require_once ('config.php');
session_start();
?>
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
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>

    <?php
    /* Check if login form has been submitted */
    /* isset — Determine if a variable is declared and is different than
    NULL*/
    if(isset($_POST['Submit']))
    {
    /* Check if the form's username and password matches */
    /* these currently check against variable values stored in
    config.php but later we will see how these can be checked against
    information in a database*/
    if( ($_POST['Username'] == $Username) && ($_POST['Password'] ==
    $Password) )
    {
        echo'Success';
        $_SESSION['Username'] = $Username; //store Username to the session the browser */
        $_SESSION['Active'] = true;// this will allow all in what we choose 
        header("location:index.php");
        exit; //we’ve just used header() to redirect to another page but we must terminate all current code so that it doesn’t run when we redirect
        
    
    }
    else
    echo 'Incorrect Username or Password';
    }
    ?>
    </div>
    </body>
</html>
