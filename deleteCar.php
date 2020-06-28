<?php

session_start();
$id = $_GET['id'];

if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart'][$id]);
}
header("Location: cart.php");
