<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/scripts/currentDate.js" defer></script>
    <title>LOGIN</title>
</head>
<head>
    <body>
        <div class = "container">
            <div class = "logo-container">
                <img src="public/img/text_logo.svg">
            </div>
            <div class = "login-container">
                <form class = "login" action = "login" method = "POST">
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
                    <input class = "email-input" name="email" type="text" placeholder="email@email.com">
                    <div class = "login-text">Password</div>
                    <input class = "email-input" name="password" type="password" placeholder="password">
                    <button class = "login-button" type = "submit">Log in</button>
                </form>
                <a href="register">
                    <button class = "register-button">Register</button>
                </a>
                <p class = "login-text" id="datetime" style = "display: flex; justify-content: center;"></p>
            </div>
        </div>
    </body>
</head>