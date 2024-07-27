<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="/logos/view/includes/logos.css">
</head>

<body>

    <div class="login_box">
        <h1 id="login_h1">Log in</h1>

        <div class="login_input_area">
            <p>Username:</p>
            <input type="text" id="login_input_box">
        </div>

        <div class="login_input_area">
            <p>Password:</p>
            <input type="text" id="login_input_box">
        </div>

        <div class="login_input_area">
            <input type="checkbox" id="remember_me">
            <label for="remember_me">Remember me?</label>
        </div>

        <div class="login_input_area">
            <a href="#"><p>Forgotten password</p></a>
        </div>

        <div class="login_input_area">
            <a href="/logos/view/home.php"><button id="go_button">Admin profile</button></a>
        </div>

        <div class="login_input_area">
            <a href="/logos/view/non-admin.php"><button id="go_button">Non-admin profile</button></a>
        </div>

    </div>

</body>

</html>