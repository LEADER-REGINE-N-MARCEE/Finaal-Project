<?php
//start session
session_start();

//redirect if logged in
if (isset($_SESSION['user'])) {
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html>

<body>
    <form method="POST" action="login-backend.php">
        <fieldset>
            <div class="form-group">
                <input class="form-control" placeholder="Email" type="text" name="email" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password" type="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </fieldset>
    </form>
</body>

</html>