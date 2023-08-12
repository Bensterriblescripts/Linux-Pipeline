<?php
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradise Coffee</title>
    <link rel="icon" type="image/x-icon" href="/assets/photos/PC_Plant-Branch_Full-Colour.png">
    <style>
        @font-face {
            font-family: nice;
            src: url(/assets/AlexBrush-Regular.ttf);
        }
        #navbar {
            width: 100%;
            position: fixed;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2.5rem;
            display: flex;
            justify-content: center;
            z-index: 1;

            /* background-color: lightpink; */
            /* opacity: 0.8; */
            border-radius: 15px;
        }
        #navbar ul {
            list-style-type: none;
            margin-top: auto;
            margin-bottom: auto;
        }
        #navbar li {
            font-size: 20px;
            padding: 5px;
            text-decoration: none;
            color: black;
        }
        .navlinks {
            text-decoration: none;
            color: black;
        }
        #site-title {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 44rem;
        }
        #title {
            font-family: nice;
            text-align: left;
            font-size: 60px;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: -8rem;
            font-weight: bold;
            text-decoration: none;
            color: black;
        }
        #img-tl {
            position: absolute;
            margin-left: 0;
            top: 0;
        }
    </style>
</head>
    <img id="img-tl" src="../assets/photos/PC_Plant-Branch_Full-Colour_SMALL.png" alt="">
    <div id="navbar">
        <ul>
            <li id="site-title">
                <a id="title" href="https://paradisecoffee.cafe">Paradise Coffee</a>
            </li>
        </ul>
        <ul>
            <li>
                <a class="navlinks" href="https://paradisecoffee.cafe">Home</a>
            </li>
        </ul>
        <ul>
            <li>
                <a class="navlinks" href="https://paradisecoffee.cafe/contact.php">Contact</a>
            </li>
        </ul>
        <ul>
            <li>
                <a class="navlinks" href="https://paradisecoffee.cafe/about.php">About</a>
            </li>
        </ul>
        <ul>
            <li>
                <a class="navlinks" href="https://paradisecoffee.cafe/login.php">Login</a>
            </li>
        </ul>
    </div>
</html>