<?php
if ($login_rank == '1') {
    /* High Level Analytics */

    /* Staffs */
    $query = "SELECT COUNT(*) FROM login WHERE login_rank = '0'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($staffs);
    $stmt->fetch();
    $stmt->close();


    /* Admins */
    $query = "SELECT COUNT(*) FROM login WHERE login_rank = '1'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($admins);
    $stmt->fetch();
    $stmt->close();


    /* Customers */
    $query = "SELECT COUNT(*) FROM customers";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($customers);
    $stmt->fetch();
    $stmt->close();


    /* Products */
    $query = "SELECT COUNT(*) FROM products";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($products);
    $stmt->fetch();
    $stmt->close();


    /* Total Orders */
    $query = "SELECT COUNT(*) FROM orders";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($total_orders);
    $stmt->fetch();
    $stmt->close();


    /* Income */
    $query = "SELECT SUM(order_price) FROM orders WHERE order_status = 'Paid'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($payments);
    $stmt->fetch();
    $stmt->close();
} else {
    /* Staffs */


    /* Customers */
    $query = "SELECT COUNT(*) FROM customers";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($customers);
    $stmt->fetch();
    $stmt->close();


    /* Products */
    $query = "SELECT COUNT(*) FROM products";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($products);
    $stmt->fetch();
    $stmt->close();


    /* Orders */
    $query = "SELECT COUNT(*) FROM orders";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($orders);
    $stmt->fetch();
    $stmt->close();


    /* Income */
    $query = "SELECT SUM(order_price) FROM orders WHERE order_status = 'Paid'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($payments);
    $stmt->fetch();
    $stmt->close();
}
