<?php
?>
<script src="orderscript.js?45"></script>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="centercontainer">
            <button id="orderbutton" onclick="home()">Return</button>
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
                        <button id="3" class="orderbuttons" style="background-color: #c2a074" onclick="shakes(this)">Shakes</button>
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
    window.location.href="https://paradisecoffee.cafe/admin/home.php";
}
</script>