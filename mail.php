<?php
session_start();
$message = "Dear customer,\n Thanks for renting cars from Hertz-UTS, The following are the order details:\n";
$total_price = 0;
$number = 0;

$message .= '<table class="table">' .
    '<thead class="thead-light">' .
    '<tr>' .
    '<th scope="col">Car</th>' .
    '<th scope="col">Miles</th>' .
    '<th scope="col">Fuel Type</th>' .
    '<th scope="col">Seat</th>' .
    '<th scope="col">Price</th>' .
    '<th scope="col">Rent days</th>' .

    '</tr>' .
    '</thead>' .
    '<tbody>';


if (isset($_SESSION['cart'])) {

    $totalMony = 0;
    foreach ($_SESSION['cart'] as $key => $value) {

        $message .=  '<tr>' .
            '<td>' . $value['brand'] . "-" . $value['model'] . "-" . $value['year'] . '</td>' .
            '<td>' . $value['mileage'] . '</td>' .
            '<td>' . $value['fuel'] . '</td>' .
            '<td>' . $value['seats'] . '</td>' .

            '<td>' . $value['price'] . '</td>' .
            '<td>' . $value["days"] . '</td>' .
            '<td>' . $value['price'] * $value["days"] . '</td>' .
            '</tr>';
    }
}
$message .=  '</tbody>';
$message .=   '</table>';
$message .= '<h4>Your total cost is:' . $_SESSION['total'] . '</h4>';

$email = $_REQUEST['email'];
$name = $_REQUEST['name'];
$to = $email;
$subject = "You have reserved from Hertz UTS";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset-UTF-8" . "\r\n";

$headers .= 'From: Yuze.Yang@student.uts.edu.au' . "\r\n" .
    'Reply-To: Yuze.Yang@student.uts.edu.au' . "\r\n";
mail($to, $subject, $message, $headers);
session_destroy();
?>
<h3>Thank you for renting, please check your email about the renting details</h3>