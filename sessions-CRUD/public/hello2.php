<?php
("../template/header.php");

$_SESSION['Active'] = true;
?>
<h1>hello part 6 step 2</h1>
    <!--Part 6 part 2 pages to see with no login-->
    <h2>Answer to part 6 step 2: The session is the problem when trying to access pages when not logged in</h2>
<h2>This session is set at true on this page so the same as the login so no need to be logged in to look at this page so the problem is the session not the redirect.</h2>
<h3>To see the rest of the website please return back to sign in or register</h3>

<a href="register.php">Register</a>
<a href="login.php">Sign in</a>

