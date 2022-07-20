<?php

    session_start();
    include('database/dbcon.php');

    $id = $_GET['id'];
    $dlt_query = "DELETE FROM orders WHERE id = '$id' ";
    $run_dlt_query = mysqli_query($con, $dlt_query);
    $_SESSION['message'] = "Order Shipped Successfully";
    header('Location: placed-orders.php');
?>