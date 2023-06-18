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
// Tile: 1 & 2
$today = getTodayTotal();
// Tile: 3
$total = getYesterdayTotal()

?>
<body>
    <div class="ptitle">
        <h1>Dashboard</h1>
    </div>
    <div>
        <table id="orderlist-table">
            <tbody>
                <?php include ('components/orderbuilder.php')?>
            </tbody>
        </table>
    </div>
    <div>
        <table id="stattable">
            <tbody>
                <tr class="r1">
                    <td onclick="window.location.href='/pages/orders.php'" id="1" class="tilelink">
                        Ordering Dashboard
                    </td>
                    <td id="2" class="tile" contentEditable>
                        <?php 
                            if ($today != 0) {
                                echo "Today's Cash: <br>". '$' .$today['cash'];
                            }
                            else {
                                echo "Enter Cash";
                            }
                        ?>
                    </td>
                    <td id="3" class="tile" contentEditable>
                        <?php 
                            if ($today != 0) {
                                echo "Today's Eftpos: <br>" . '$' . $today['eftpos'];
                            }
                            else {
                                echo "Enter Eftpos";
                            }
                        ?>
                    </td>
                </tr>
                <tr class="r2">
                    <td id="4" class="tilelink">
                        View Previous Orders
                    </td>
                    <td id="5" class="tile">
                        Total Yesterday:<br >
                        <?php echo "$".$total ?>
                    </td>
                    <td id="6" class="tilelink">
                        View Your Stats
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
        this.innerText = 'Cash:\n' + '$' + cash;
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
        this.innerText = 'Eftpos: \n' + '$' + eftpos;
    }
})

</script>
</body>