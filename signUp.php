<?php require('header.php')?>
<link rel=" stylesheet" href="./css/signInUp.css">

    <div class="section2">
        <div class="wrapper">
            <h1>
                SIGN UP
            </h1>

            <div class="form1">
                <form method="POST">

                    <label>First Name:</label>
                    <input class="input1" type="text" name="firstname" autofocus required>


                    <label>Last Name:</label>
                    <input class="input1" type="text" name="lastname" autofocus required>


                    <label>Email:</label>
                    <input class="input1" type="text" name="email" autofocus required>


                    <label>Password:</label>
                    <input class="input1" type="Password" name="password" required>
                    <button type="button" class="signin-btn" id="btnSubmit" name="register">Register</button>
                </form>

                <p class="or">or</p>
                <button class="signup-btn" type="button">
                    <p>
                        SIGN IN
                    </p>
                </button>
            </div>

        </div>
        <script src="./js/signUpAPI.js"></script>
    <?php require('footer.php')?>