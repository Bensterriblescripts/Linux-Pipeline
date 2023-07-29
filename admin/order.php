<?php
?>
<script src="../admin/orderscript.js?5"></script>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="centercontainer">
            <button id="orderbutton" onclick="closeOrder()">Finish Order</button>
        </div>
        <div class="rightcontainer">
            <button id="returnbutton" onclick="home()">Return</button>
        </div>
        <table class="neworder">
            <tbody>
                <tr>
                    <td>
                        <button id="1" class="orderbuttons" style="background-color: #7a482d;" onclick="coffee()">Coffee</button>
                    </td>
                    <td>
                        <button id="2" class="orderbuttons" style="background-color: #a9eb8f" onclick="tea()">Tea</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="3" class="orderbuttons" style="background-color: #c2a074" onclick="snacks(this)">Snacks</button>
                    </td>
                    <td>
                        <button id="4" class="orderbuttons" style="background-color: #403f3f" onclick="other(this)">Other</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="5" class="orderbuttons" style="display: none;">Sneaky Peaky 1</button>
                    </td>
                    <td>
                        <button id="6" class="orderbuttons" style="display:none;">Sneaky Peaky 2</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="7" class="orderbuttons" style="display: none;">Sneaky Peaky 3</button>
                    </td>
                    <td>
                        <button id="8" class="orderbuttons" style="display:none;">Sneaky Peaky 4</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<script>
function home() {
    window.location="https://paradisecoffee.cafe/admin/home.php";
}
function closeOrder() {
    $var = "NewID";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "../components/triggers.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify($var));
    window.location="https://paradisecoffee.cafe/admin/home.php";
}
</script>