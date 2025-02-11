<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/browsestyle.css">
    <script src="https://kit.fontawesome.com/c4c0a58e47.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/scripts/search.js" defer></script>
    <script type="text/javascript" src="public/scripts/currentDate.js" defer></script>
    <script type="text/javascript" src="public/scripts/profileButton.js" defer></script>
    <title>Popdle</title>
</head>
<body>
    <div class = "browse-container">
        <nav>
            <div class="left-nav-content">
                <a href = "dailyQuiz">
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href = "dailyQuiz">
                    <i class="fa-solid fa-gear"></i>
                </a>
                <i class="fa-solid fa-chart-simple"></i>
                <a href="suggestions">Suggestions</a>
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
                <i class="fa-solid fa-user" id="profileButton"></i>
            </div>
        </nav>
        <header>
            <div class="browse-tools">
                <div class = "browse-toggles">
                    <button>Top</button>
                    <button>New</button>
                </div>
                <b>Current suggestions:</b>
                <div class = "browse-searchbar">
                    <input placeholder = "Search for a suggestion"></input>
                </div>
            </div>
        </header>
        <main>
            <section class="suggestions" id = "suggestions">
                <?php foreach($suggestions as $suggestion): ?>
                <div class="suggestions-container">
                    <h2><?=$suggestion->getTitle()?></h2>
                    <img src="public/uploads/<?= $suggestion->getImage();?>" class="franchise-images">
                    <p>es</p>
                </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>

<template id="suggestion-template">
    <div class="suggestions-container">
        <h2>title</h2>
        <img src="" class="franchise-images">
        <p>description</p>
    </div>
</template>