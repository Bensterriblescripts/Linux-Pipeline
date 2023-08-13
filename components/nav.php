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
            /* background-image: url('../assets/photos/PC_Flower_Pink_MEDIUM.png');
            background-size: cover; */
            width: 100%;
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2.5rem;
            display: flex;
            justify-content: center;
            z-index: 1;

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
        #img-t2 {
            position: absolute;
            left: 0.5rem;
            top: 0.5rem;
            display: none;
        }

        @media (max-width: 1000px) {
            
            #navbar {
                display: block;
                margin-top: auto;
                margin-left: -1rem;
                margin-right: auto;
                text-align: center;
            }
            #site-title {
                margin-right: auto;
                margin-left: auto;
            }
            #title {
                margin-left: auto;
                margin-right: auto;
                font-size: 30px;
            }
            #img-tl {
                display: none;
            }
            #img-t2 {
                display: block;
            }
        }
    </style>
</head>
    <img id="img-tl" src="../assets/photos/PC_Plant-Branch_Full-Colour_SMALL.png" alt="plant">
    <img id="img-t2" src="../assets/photos/PC_Plant-Branch_Full-Colour_SMALLER.png" alt="plant">
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
                <a class="navlinks" href="https://paradisecoffee.cafe/login.php">Login</a>
            </li>
        </ul>
    </div>
</html>