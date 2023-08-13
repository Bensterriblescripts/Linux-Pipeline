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
            text-align: center;

            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        #core {
            margin-top: 11rem;
            margin-left: auto;
            margin-right: auto;
        }
        .center-image {
            border-radius: 10px;
            margin-top: 2rem;
        }
        #small-title {
            font-size: 20px;
            margin-bottom: 2rem;
        }

        #contact {
            text-align: center;
            justify-content: center;
            display: flex;
        }
        #about {
            margin-top: 2rem;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            justify-content: center;
            display: flex;
        }
        @media (max-width: 1000px) {
            .center-image {
                border-radius: 0px;
            }
        }
    </style>
</head>
<body>
    <div id="core">
        <table id="contact">
            <tbody>
                <tr>
                    <td id="small-title">
                        <u>Contact Information</u>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        Sou Yi Nanson
                    </td>
                </tr>
                <tr>
                    <td>
                        021 400 257
                    </td>
                </tr>
                <tr>
                    <td>
                        souyimen95@gmail.com
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="about">
            <tbody>
                <tr id="small-title">
                    <td>
                        <u>About</u>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        Owned and run by a Cambodian/Kiwi barista, Paradise Coffee started in Kapiti during 2023.
                        <br>
                        <br>
                        Sou Yi spent over 10 years working in Cafés around Wellington making coffees and serving food.
                        <br>
                        She spent the last few years saving up for a new coffee van to run her way, with coffee that meets her standards.
                    </td>
                </tr>
            </tbody>
        </table>
        <img class="center-image" src="../assets/photos/fb_photo.jpg" alt="me">
    </div>
</body>
</html>