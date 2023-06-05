<?php
include('components/queries.php');

if (isset($_COOKIE['user_token'])) {
    $token = $_COOKIE['user_token'];
    $auth = getUserByToken($token);
    if (!$auth) {
        header('Location: /pages/login.php');
        exit;
    }
} 
else {
    header('Location: /pages/login.php');
    exit;
}

echo '<link rel="stylesheet" type="text/css" href="../main.css">';
?>
<body>
    <div class="ptitle">
        <h1>Orders</h1>
    </div>
    <a href="/pages/coffeevan.php" class="returnlink">Back</a>
    <div>
        <table id="ordertable">
            <tbody>
                <tr>
                    <td id="1" class="tilelink r1" >
                        Espresso
                    </td>
                    <td id="2" class="tilelink r1">
                        Long Black
                    </td>
                    <td id="3" class="tilelink r1">
                        Americano
                    </td>
                </tr>
                <tr>
                    <td id="4" class="tilelink r2">
                        Flat White
                    </td>
                    <td id="5" class="tilelink r2">
                        Latte
                    </td>
                    <td id="6" class="tilelink r2">
                        Iced Coffee
                    </td>
                </tr>
                <tr>
                    <td id="7" class="tilelink r3">
                        Cappuccino
                    </td>
                    <td id="8" class="tilelink r3">
                        Mochaccino
                    </td>
                    <td id="9" class="tilelink r3">
                        Hot Chocolate
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<script>

// Cash
document.getElementById('2').addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === '13') {
        event.preventDefault();
        this.blur();
        this.classList.add('flip');
        cash = this.innerText;
        var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        xhttp.open("GET", "components/trigger.php?cash=" + encodeURIComponent(cash), true);
        xhttp.send();
        this.innerText = '$' + cash;
    }
})

// Eftpos
document.getElementById('3').addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === '13') {
        event.preventDefault();
        this.blur();
        this.classList.add('flip');
        this.contentEditable = false;
        eftpos = this.innerText;
        var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        xhttp.open("GET", "components/trigger.php?eftpos=" + encodeURIComponent(eftpos), true);
        xhttp.send();
        this.innerText = '$' + cash;
    }
})

</script>
</body>