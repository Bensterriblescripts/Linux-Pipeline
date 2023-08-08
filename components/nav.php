<?php
?>
<html>
<head>
    <style>
        @font-face {
            font-family: nice;
            src: url(/assets/AlexBrush-Regular.ttf);
        }
        #navbar {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1rem;
            display: flex;
            justify-content: center;

            background-color: lightpink;
            opacity: 0.8;
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
            margin-right: 50rem;
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
    </style>
    </head>
    <body>
        <div id="navbar">
            <ul id=titlebar>
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
    </body>
</html>