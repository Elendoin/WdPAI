<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN</title>
</head>
<head>
    <body>
        <div class = "container">
            <div class = "logo-container">
                <img src="public/img/text_logo.svg">
            </div>
            <div class = "login-container">
                <form class = "login", action = "login", method = "POST">
                    <div class = "messages">
                        <?php
                            if(isset($messages)){
                                    foreach($messages as $message){
                                        echo $message;
                                    }
                            }
                        ?>
                    </div>
                    <div class = "login-text">Username</div>
                    <input class = "email-input" name="email" type="text" placeholder="email@email.com">
                    <div class = "login-text">Password</div>
                    <input class = "email-input" name="password" type="password" placeholder="password">
                    <button class = "login-button", type = "submit">Log in</button>
                    <button class = "register-button">Register</button>
                    <p class = "login-text" id="datetime", style = "display: flex; justify-content: center;"></p>
                    <script>
                        var now = new Date();
                        var datetime = now.toLocaleString();
                        var day = String(now.getDate()).padStart(2, '0');
                        var month = String(now.getMonth() + 1).padStart(2, '0');
                        var year = now.getFullYear();

                        var formattedDate = day + '.' + month + '.' + year;

                        document.getElementById("datetime").innerHTML = formattedDate;
                    </script>

                </form>
            </div>
        </div>
    </body>
</head>