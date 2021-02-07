<?php require('header.php')?>
<link rel=" stylesheet" href="./css/signInUp.css">

    <div class="section2">
        <div class="wrapper">
            <h1>
                SIGN IN
            </h1>

            <div class="form1">
                <form method="POST">

                    <label>Email</label>
                    <input class="input1" type="text" placeholder="Email" name="email" autofocus required>

                    <label>Password</label>
                    <input class="input1" type="Password" placeholder="Password" type="password" name="password" required>
                    <button class="signin-btn" type="button" id="btnSubmit" name="login">SIGN IN</button>
                </form>

                <button type="button">
                    <p>

                    </p>
                </button>
                <p class="or">or</p>
                <button onclick="window.location.href='signUp.php'" class="signup-btn" type="button">
                    <p>
                        SIGN UP
                    </p>
                </button>
            </div>

        </div>
        <script src="js/signInAPI.js"></script>
<?php require('footer.php')?>