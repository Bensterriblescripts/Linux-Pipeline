<?php
include('../components/db.php');

// Get the current orders
$orders = selectOrders();

// Create a new uniqueID
insertUniqueOrder();

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="centercontainer">
            <button id="orderbutton" onclick="orderButton()">New Order</button>
        </div>
        <?php
        if (isset($orders[0])) {
            echo '
            <table id="ordertable">
                <tbody>
                    <tr id="key">
                        <td>
                            <u>Order</u>
                        </td>
                        <td>
                            <u>Size</u>
                        </td>
                        <td>
                            <u>Decaf</u>
                        </td>
                        <td>
                            <u>Milk</u>
                        </td>
                        <td>
                            <u>Shots</u>
                        </td>
                        <td>
                            <u>Syrup</u>
                        </td>
                        <td>
                            <u>Total</u>
                        </td>
                        <td>
                            <u>Time</u>
                        <td>
                    </tr>
            ';
            foreach ($orders as $order) {
                echo '
                <tr>
                    <td style="text-align: left;">'.$order['type'].'</td>
                    <td>'.$order['size'].'</td>';

                if (isset($order['decaf'])) {
                    echo '<td>'.$order['decaf'].'</td>';
                }
                else {
                    echo '<td></td>';
                }
                if (isset($order['milk'])) {
                    echo '<td>'.$order['milk'].'</td>';
                }
                else {
                    echo '<td></td>';
                }
                if (isset($order['shots']) && $order['shots'] != 0) {
                    echo '<td>'.$order['shots'].'</td>';
                }
                else {
                    echo '<td></td>';
                }
                if (isset($order['syrup'])) {
                    echo '<td>'.$order['syrup'].'</td>';
                }
                else {
                    echo '<td></td>';
                }
                echo '<td>'.$order['total'].'</td>';
                echo '<td>'.$order['time'].'</td>';
                echo '</tr>';
            }
            echo '
                </tbody>
            </table>';
        }
        else {
            echo '<div id="noorders">No Orders</div>';
        }
        ?>
    </body>
</html>
<script>
function orderButton() {
    window.location="https://paradisecoffee.cafe/admin/order.php";
}
</script>