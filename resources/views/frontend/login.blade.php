<body class="login-container">
    <div class="login-wrapper">
        <form name="loginForm" method="POST" action="index.php/site/login" class="login-box">
            <fieldset id="login-fieldset">
                <legend> Sign In Now </legend>

                <?php if (Yii::$app->user->getState('login_err')) { ?>
                    <div class="login-error"><?php echo 'Invalid Username or Password'; ?></div>
                <?php } ?>
                <div class="form-block">
                    <input type="text" placeholder="Username" name="LoginForm[username]" autofocus>
                </div>
                <div class="form-block">
                    <input type="password" placeholder="Password" name="LoginForm[password]">
                </div>
                <div class="form-block">
                    <input type="submit" class="btn-sign-in" name="submit" value="Sign In">
                </div>
            </fieldset>
        </form> <!-- End of Login Box -->
    </div> <!-- End of Login Wrapper -->
</body>