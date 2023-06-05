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
                    <td id="0" class="tilelink r1" >
                        Espresso
                    </td>
                    <td id="1" class="tilelink r1">
                        Long Black
                    </td>
                    <td id="2" class="tilelink r1">
                        Americano
                    </td>
                </tr>
                <tr>
                    <td id="3" class="tilelink r2">
                        Flat White
                    </td>
                    <td id="4" class="tilelink r2">
                        Latte
                    </td>
                    <td id="5" class="tilelink r2">
                        Iced Coffee
                    </td>
                </tr>
                <tr>
                    <td id="6" class="tilelink r3">
                        Cappuccino
                    </td>
                    <td id="7" class="tilelink r3">
                        Mochaccino
                    </td>
                    <td id="8" class="tilelink r3">
                        Hot Chocolate
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<script>

// Post finished order
function pushOrder() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "components/trigger.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify(order));
}

// Extras
function changeToExtras() {
    elements = document.getElementsByClassName('r1')
    for (var i = 0; i < elements.length; i++) {
        elements[i].removeEventListener('click', sizeClickListener);
    }

    var extrashot = document.getElementById('0');
    extrashot.innerText = 'Extra Shots';
    extrashot.style.color = 'black';
    extrashot.style.backgroundColor = 'grey';
    var milktype = document.getElementById('1');
    milktype.innerText = 'Other Milk';
    milktype.style.color = 'black';
    milktype.style.backgroundColor = 'white';
    var finish = document.getElementById('2');
    finish.innerText = 'Finish';

    elements = document.getElementsByClassName('r1');
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', function (event) {
            if (event.target.id == 0) {
                order['extrashots'] = order['extrashots'] + 1
                extrashot.innerText = 'Extra Shots: ' + order['extrashots'];
                console.log('Added shot, total: ' + order['extrashots'])
            }
            else if (event.target.id == 1) {
                order['milktype'] = 1
                milktype.innerText = 'Added';
                console.log('Other milk: ' + order['milktype'])
            }
            else if (event.target.id == 2) {
                pushOrder();
                window.location.replace("/pages/coffeevan.php");
            }
        });
    }
}

// Sizes
function changeToSize() {

    for (var i = 0; i < elements.length; i++) {
        elements[i].removeEventListener('click', typeClickListener);
    }
    removeR2 = document.getElementsByClassName('r2');
    removeR3 = document.getElementsByClassName('r3');
    for (var i = 0; i < removeR2.length; i++) {
        removeR2[i].style.display = 'none';
    }
    for (var i = 0; i < removeR3.length; i++) {
        removeR3[i].style.display = 'none';
    }
    var small = document.getElementById('0');
    small.innerText = 'Small';
    small.style.color = 'black';
    small.style.backgroundColor = 'lightblue';
    var medium = document.getElementById('1');
    medium.innerText = 'Regular';
    medium.style.color = 'black';
    medium.style.backgroundColor = 'lightgreen';
    var large = document.getElementById('2');
    large.innerText = 'Large';
    large.style.color = 'black';
    large.style.backgroundColor = 'orange';

    elements = document.getElementsByClassName('r1');
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', sizeClickListener);
    }
}

// Coffee Type
var elements = document.getElementsByClassName('tilelink');
var order = {
    'type': '',
    'size': '',
    'extrashots': 0,
    'milktype': 0
};
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', typeClickListener);
}

function sizeClickListener() {
    order['size'] = event.target.id;
    console.log("Size: " + order['size']);
    changeToExtras();
}
function typeClickListener() {
    order['type'] = event.target.id;
    console.log("Type: " + order['type']);
    changeToSize();
}

</script>
</body>