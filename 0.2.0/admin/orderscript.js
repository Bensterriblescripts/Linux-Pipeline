order = [];
shots = 0;

function coffee() {

    function send() {
        console.log(order);
    }

    function addShot() {
        shots = shots + 1;
        order['shots'] = shots;
        console.log(order['shots']);
    }

    function syrup(element) {
        order['syrup'] = element.innerHTML;
        console.log(order['syrup']);
        
        buttons[1].innerHTML = "Milk";
        buttons[2].innerHTML = "Extra Shots";
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].innerHTML = "Syrup";
        buttons[4].innerHTML = "Decaf";

        buttons[1].onclick = function() {extras(this)};
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].onclick = function() {extras(this)};
        buttons[4].onclick = function() {extras(this)};
        buttons[5].onclick = function() {send(this)};
    }

    function milk(element) {
        order['milk'] = element.innerHTML;
        console.log(order['milk']);
        
        buttons[1].innerHTML = "Milk";
        buttons[2].innerHTML = "Extra Shots";
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].innerHTML = "Syrup";
        buttons[4].innerHTML = "Decaf";

        buttons[1].onclick = function() {extras(this)};
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].onclick = function() {extras(this)};
        buttons[4].onclick = function() {extras(this)};
        buttons[5].onclick = function() {send(this)};
    }

    function decaf() {
        order['decaf'] = "Decaf";
        console.log(order['decaf']);
        
        buttons[1].innerHTML = "Milk";
        buttons[2].innerHTML = "Extra Shots";
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].innerHTML = "Syrup";
        buttons[4].innerHTML = "Decaf";

        buttons[1].onclick = function() {extras(this)};
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].onclick = function() {extras(this)};
        buttons[4].onclick = function() {extras(this)};
        buttons[5].onclick = function() {send(this)};
    }

    function extras(element) {

        buttons[1].innerHTML = "Milk";
        buttons[2].innerHTML = "Extra Shots";
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].innerHTML = "Syrup";
        buttons[4].innerHTML = "Decaf";

        extra = element.innerHTML;
        if (extra == "Milk") {

            buttons[1].innerHTML = "Trim";
            buttons[2].innerHTML = "Soy";
            buttons[3].innerHTML = "Almond";
            buttons[4].innerHTML = "Coconut";
            buttons[5].innerHTML = "Oat";

            buttons[1].onclick = function() {milk(this)};
            buttons[2].onclick = function() {milk(this)};
            buttons[3].onclick = function() {milk(this)};
            buttons[4].onclick = function() {milk(this)};

        }
        if (extra == "Syrup") {
            buttons[1].innerHTML = "Vanilla";
            buttons[2].innerHTML = "Caramel";
            buttons[3].innerHTML = "Hazelnut";
            buttons[4].innerHTML = "Butterscotch";

            buttons[1].onclick = function() {syrup(this)};
            buttons[2].onclick = function() {syrup(this)};
            buttons[3].onclick = function() {syrup(this)};
            buttons[4].onclick = function() {syrup(this)};
        }
        if (extra == "Decaf") {
            decaf();
        }
    }

    function size(element) {
        order['size'] = element.innerHTML;
        console.log(order['size']);

        buttons[1].innerHTML = "Milk";
        buttons[2].innerHTML = "Extra Shots";
        buttons[3].innerHTML = "Syrup";
        buttons[4].innerHTML = "Decaf";

        buttons[5].innerHTML = "Finish";

        buttons[1].onclick = function() {extras(this)};
        buttons[2].onclick = function() {addShot(this)};
        buttons[3].onclick = function() {extras(this)};
        buttons[4].onclick = function() {extras(this)};
        buttons[5].onclick = function() {send(this)};

        buttons[3].style.display = "block";
        buttons[4].style.display = "block";
        buttons[5].style.display = "block";
    }
    
    function type(element) {
        order['type'] = element.innerHTML;
        console.log(order['type']);

        buttons[1].innerHTML = "Medium";
        buttons[2].innerHTML = "Large";

        buttons[1].onclick = function() {size(this)};
        buttons[2].onclick = function() {size(this)};

        buttons[3].style.display = "none";
        buttons[4].style.display = "none";
        buttons[5].style.display = "none";
        buttons[6].style.display = "none";
        buttons[7].style.display = "none";
        buttons[8].style.display = "none";
    }

    // Start here
    buttons = [];
    for (x = 1; x < 9; x++ ) {
        buttons[x] = document.getElementById(x);
        buttons[x].onclick = function() {type(this)};
        buttons[x].style.backgroundColor = "#7a482d";
    }

    buttons[1].innerHTML = "Flat White";
    buttons[2].innerHTML = "Latte";
    buttons[3].innerHTML = "Cappuccino";
    buttons[4].innerHTML = "Mochaccino";
    buttons[5].innerHTML = "Long Black";
    buttons[6].innerHTML = "Americano";
    buttons[7].innerHTML = "Espresso";
    buttons[8].innerHTML = "";

    buttons[5].style.display = "block";
    buttons[6].style.display = "block";
    buttons[7].style.display = "block";
}

function tea() {

    function send() {
        console.log(order);
    }

    function service(element) {
        order['milk'] = element.innerHTML;
        send();
    }

    function milk() {
        buttons[1].innerHTML = "Normal";
        buttons[2].innerHTML = "Trim";
        buttons[3].innerHTML = "Soy";
        buttons[4].innerHTML = "Almond";
        buttons[5].innerHTML = "Coconut";
        buttons[6].innerHTML = "Oat";

        buttons[1].onclick = function() {service(this)};
        buttons[2].onclick = function() {service(this)};
        buttons[3].onclick = function() {service(this)};
        buttons[4].onclick = function() {service(this)};
        buttons[5].onclick = function() {service(this)};
        buttons[6].onclick = function() {service(this)};

    }

    function type(element) {
        order['type'] = element.innerHTML;
        console.log(order['type']);

        buttons[1].innerHTML = "Milk";
        buttons[2].innerHTML = "Finish";
        buttons[3].style.display = "none";

        buttons[1].onclick = function() {milk()};
        buttons[2].onclick = function() {send()};
    }

    // Start here
    buttons = [];
    for (x = 1; x < 9; x++ ) {
        buttons[x] = document.getElementById(x);
        buttons[x].onclick = function() {type(this)};
        buttons[x].style.backgroundColor = "#7a482d";
    }

    buttons[1].innerHTML = "Lemon Honey & Ginger";
    buttons[2].innerHTML = "English Breakfast";
    buttons[3].innerHTML = "Early Grey";

    buttons[4].style.display = "none";
    buttons[5].style.display = "none";
    buttons[6].style.display = "none";
    
}