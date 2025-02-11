<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/browsestyle.css">
    <script src="https://kit.fontawesome.com/c4c0a58e47.js" crossorigin="anonymous"></script>
    <script src="public/scripts/profileButton.js" defer></script>
    <script src="public/scripts/limitQuestionText.js" defer></script>
    <script src="public/scripts/currentDate.js" defer></script>
    <script src="public/scripts/answers.js" defer></script>
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
<!--                    <a href = "dailyQuiz">
                        <i class="fa-solid fa-gear"></i>
                    </a>-->
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
                <b>Today's question:</b>

            </header>
            <main class = 'browse-end'>
                <section class="dailyQuiz">
                    <img src = '<?=$question->getImage();?>'>
                    <p><?=$question->getContent();?></p>
                    <form class = "quizOptions" data-correct="<?=$question->getCorrectAnswer();?>" action = "">
                        <button data-option="1">
                            <b>A: </b>
                            <?=$question->getOptionA();?>
                        </button>
                        <button data-option="2">
                            <b>B: </b>
                            <?=$question->getOptionB();?></button>
                        <button data-option="3">
                            <b>C: </b>
                            <?=$question->getOptionC();?>
                        </button>
                        <button data-option="4">
                            <b>D: </b>
                            <?=$question->getOptionD();?>
                        </button>
                    </form>
                </section>
            </main>
        </div>
        <div class = "stats">
            <b>Current Statistics</b>
            <p>Wins: <?=$_SESSION['wins']?></p>
            <p>Losses: <?=$_SESSION['losses']?></p>
        </div>
    </body>
</head>