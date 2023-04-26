<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home @ Julius Babies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200&display=swap" rel="stylesheet">
</head>
<style>
    body {
        margin: 0;
    }

    .info {
        border: 1pt solid orange;
    }

    #header {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100vw;
        min-height: 500px;
    }

    #image {
        display: inline;
        position: absolute;
        top: 0;
        left: 0;
        transition: .5s;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-size: 125%;
        background-image: url("./img/header.jpg");
        background-repeat: no-repeat;
        background-position: center;
        animation: darken 4s ease-out;
        animation-delay: 1s;
        filter: brightness(0.7);

    }

    @keyframes darken {
        from {
            filter: brightness(1);
            background-size: 100%;
        }
        to {
            filter: brightness(0.7);
            background-size: 125%;
        }
    }

    #welcome_typing {
        color: white;
        font-family: 'Roboto', sans-serif;
        font-size: 800%;
        border-right: 0;
        padding-right: 0.05em;
        animation: typing 1s infinite;
    }

    @keyframes typing {
        0%, 49.999% {
            border-right: 0;
            padding-right: 0.05em;
        }
        50%, 100% {
            border-right: 0.05em solid white;
            padding-right: 0;
        }
    }

    #menu {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px;
        color: white;
        font-family: 'Roboto', sans-serif;
        font-size: 200%;
    }

    #menu a {
        color: white;
    }

    #menu a {
        color: #ffffff;
        display: inline-block;
        padding: 0 5px;
        text-decoration: none;
    }

    #menu a:after {
        background-color: #ffffff;
        content: '';
        display: block;
        height: .1em;
        margin-left: calc(5px * -1);
        margin-top: .2em;
        transition: width .5s;
        width: 0;
    }

    #menu a:hover:after {
        width: calc(100% + 5px * 2);
    }

</style>
<body>

<!-- Header -->
<div class="header" id="header">
    <div id="image"></div>
    <div id="menu"><a href="http://julius.familie-babies.de">Home</a> &#x2022; <a
            href="https://julius.familie-babies.de/internal.php">Intern</a> &#x2022; <a
            href="https://julius.familie-babies.de/wordpress">Blog</a></div>
    <div id="welcome_typing"></div>
</div>

<?php
if (isset($_GET["ref"]) && $_GET["ref"] == "old") {
    echo "<div class='info'>To allow routing via my own webserver this site has moved to julius.familie-babies.de.</div>
";
}
?>
</body>
</html>
<script>
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function animation() {
        let lastRandomText = ""
        while (true) {
            const text = ["Hallo.", "Herzlich willkommen.", "Internal server error (500)", "Julius Vincent Babies.", "Hier könnte ihre Werbung stehen"]
            let randomText = "";
            while (randomText === "" || randomText === lastRandomText) {
                randomText = text[Math.floor(Math.random() * text.length)]
            }
            document.getElementById("welcome_typing").classList.add("typing");
            for (let i = 0; i < randomText.length; i++) {
                // wait a random amount of time
                console.log()
                await sleep((Math.random() / 2) * 100 + 100);
                document.getElementById("welcome_typing").innerHTML += randomText[i]
            }
            document.getElementById("welcome_typing").classList.remove("typing");
            await sleep(3000)
            for (let i = 0; i < randomText.length; i++) {
                await sleep(50)
                document.getElementById("welcome_typing").innerHTML = document.getElementById("welcome_typing").innerHTML.slice(0, -1)
            }
            lastRandomText = randomText
        }
    }

    document.body.onload = function () {
        animation()
        document.body.addEventListener("mousemove", function (e) {
            document.getElementById("image").style.filter = "brightness(" + (((window.innerHeight - e.y) / window.innerHeight) / 1.3 + 0.3) * 0.7 + ")"
        })
    }
</script>