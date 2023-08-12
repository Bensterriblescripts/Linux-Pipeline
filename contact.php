<?php
include('components/nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            display: flex;
            position: static;
            background-image: linear-gradient(pink, white);
            margin-left: auto;
            margin-right: auto;

            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        #core {
            margin-top: 10rem;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .center-image {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div id="core">
        <p>
            Kapiti based coffee van, run by a barista with a decade of experience.
        </p>
        <img class="center-image" src="../assets/photos/fb_photo.jpg" alt="me">
    </div>
</body>
</html>