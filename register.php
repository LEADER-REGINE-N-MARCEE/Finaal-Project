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
    <form method="POST" action="register-backend.php">
        <fieldset>
            <div class="form-group">
                <input class="form-control" placeholder="First Name" type="text" name="fname" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Last Name" type="text" name="lname" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="email" type="text" name="email" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Re-type Password" type="password" name="password2" required>
            </div>
            <button type="submit" name="register">Register</button>
        </fieldset>
    </form>
</body>

</html>