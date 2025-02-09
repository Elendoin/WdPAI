<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/browsestyle.css">
    <script src="https://kit.fontawesome.com/c4c0a58e47.js" crossorigin="anonymous"></script>
    <title>Popdle</title>
</head>
<head>
    <body>
        <div class = "browse-container">
            <nav>
                <div class="left-nav-content">   
                    <i class="fa-solid fa-house"></i>
                    <i class="fa-solid fa-gear"></i>
                </div>
                <img src="public/img/text_logo.svg" class = "logo">
                <div class = "right-nav-content">
                    <p id="datetime"></p>
                    <script>
                        var now = new Date();
                        var datetime = now.toLocaleString();
                        var day = String(now.getDate()).padStart(2, '0');
                        var month = String(now.getMonth() + 1).padStart(2, '0');
                        var year = now.getFullYear();

                        var formattedDate = day + '.' + month + '.' + year;

                        document.getElementById("datetime").innerHTML = formattedDate;
                    </script>
                    <i class="fa-solid fa-user"></i>
                </div>
            </nav>
            <header>
                <div class="browse-tools">
                    <div class = "browse-toggles">
                        <button>Favorite</button>
                        <button>Top</button>
                        <button>New</button>
                    </div>
                    <b>Select a franchise:</b>
                    <div class = "browse-searchbar">
                        <input placeholder = "Search for a franchise"></input>
                    </div>
                </div>
            </header>
            <main>
                <section class="franchises">
                    <div class="franchise-container">
                        <img src="public/img/Star_Wars_Logo.png" class="franchise-images">
                    </div>
                    <div class="franchise-container">
                        <img src="public/img/International_Pokémon_logo.svg.png" class="franchise-images">
                    </div>
                    <div class="franchise-container">
                        <img src="public/uploads/<?= $franchise->getImage();?>" class="franchise-images">
                    </div>
                </section>
            </main>
        </div>
    </body>
</head>