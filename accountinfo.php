<?php 
    session_start();

?>

<html>

<body>

    <form method="POST" action="info-backend.php">

        <label>Full Name:</label>
        <input class="input1" type="text" name="fullname" autofocus required>


        <label>Floor/Unit Number:</label>
        <input class="input1" type="text" name="flrnum" autofocus required>


        <label>Province:</label>
        <input class="input1" type="text" name="province" autofocus required>

        <label>Municipality:</label>
        <input class="input1" type="text" name="municipality" autofocus required>

        <label>Barangay:</label>
        <input class="input1" type="text" name="barangay" autofocus required>

        <label>Mobile Number:</label>
        <input class="input1" type="text" name="mobilenum" autofocus required>

        <button type="submit" class="signin-btn" name="register">Register</button>
    </form>
</body>

</html>