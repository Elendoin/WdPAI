<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/browsestyle.css">
    <script src="https://kit.fontawesome.com/c4c0a58e47.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/scripts/currentDate.js" defer></script>
    <script type="text/javascript" src="public/scripts/profileButton.js" defer></script>
    <script src="public/scripts/statsButton.js" defer></script>
    <title>Popdle</title>
</head>
<head>
    <body>
        <div class = "browse-container">
            <nav>
                <div class="left-nav-content">
                    <a href = "dailyQuiz">
                        <i class="fa-solid fa-house"></i>
                    </a>
                    <i class="fa-solid fa-chart-simple" id="stats-button"></i>
                    <a href="suggestions"><i class="fa-solid fa-lightbulb"></i></a>
                </div>
                <img src="public/img/text_logo.svg" class = "logo">
                <div class = "right-nav-content">
                    <p id="datetime"></p>
                    <div id="popup" class="popup">
                        <p class="logout-text">Logged in as: <strong><?php echo $_SESSION['user']->getName(); ?></strong></p>
                        <form method = "POST" action="logout";>
                            <button class = "logout-button" type="submit">Log Out</button>
                        </form>
                    </div>
                    <i class="fa-solid fa-user" id="profile-button"></i>
                </div>
            </nav>
            <header>
                <div class="browse-tools">
                    <b>Upload:</b>
                </div>
            </header>
            <main>
                <form class = "upload-form" action = "addSuggestion" method = "POST", ENCTYPE="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                    <div class = "browse-searchbar">
                        <input name = "title" type = "text" placeholder = "title">
                    </div>
                    <textarea name = "description" rows = "5" placeholder="description"></textarea>
                    <input type = "file", name = "file">
                    <button type = "submit">Submit</button>
                </form>
            </main>
        </div>
        <div class = "stats">
            <b>Current Statistics</b>
            <p>Wins: <?=$_SESSION['wins']?></p>
            <p>Losses: <?=$_SESSION['losses']?></p>
        </div>
    </body>
</head>