<?php
include('../components/triggers.php');
checkToken();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        body {
            background-image: url(/assets/naturalwhite-bg.jpg);
        }
        body a {
            text-decoration: none;
        }
        #core {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .option {
            font-size: 30px;
            border: 1px black;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="logout-btn">
        <form id="logoutForm" method="post">
            <input type="hidden" name="logout" value="true">
            <button type="submit" style="padding: 5px; font-size 14px;">Logout</button>
        </form>
    </div>
    <table id="core">
        <tbody>
            <tr>
                <td class="option"> 
                    <a href="https://paradisecoffee.cafe/admin/orderhome.php">Orders</a>
                </td>
                <td class="option">
                    <a href="http://222.153.12.161:8096">Media</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>