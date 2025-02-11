<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/scripts/loginCheck.js" defer></script>
    <script type="text/javascript" src="public/scripts/currentDate.js" defer></script>
    <title>LOGIN</title>
</head>
<head>
    <body>
        <div class = "container">
            <div class = "logo-container">
                <img src="public/img/text_logo.svg">
            </div>
            <div class = "register-container">
                <form class = "login", action = "register", method = "POST">
                    <div class = "messages">
                        <?php
                            if(isset($messages)){
                                    foreach($messages as $message){
                                        echo $message;
                                    }
                            }
                        ?>
                    </div>
                    <div class = "login-text">Email</div>
                    <input class = "register-input" name="email" type="text" placeholder="email@email.com">
                    <div class = "login-text">Password</div>
                    <input class = "register-input" name="password" type="password" placeholder="password">
                    <div class = "login-text">Confirm password</div>
                    <input class = "register-input" name="confirmedPassword" type="password" placeholder="password">
                    <div class = "login-text">Name</div>
                    <input class = "register-input" name="name" type="text" placeholder="John">
                    <div class = "login-text">Surname</div>
                    <input class = "register-input" name="surname" type="text" placeholder="Smith">
                    <button class = "register-button", type = "submit">Register</button>
                    <a href="login">Already logged in?</a>
                    <p class = "login-text" id="datetime", style = "display: flex; justify-content: center;"></p>
                </form>
            </div>
        </div>
    </body>
</head>