<?php
$id = $_GET['id'];
session_start();
$xml = simplexml_load_file("cars.xml");
foreach ($xml->children() as $car) {
    if ($id == $car->id) {
        $car_info = array(
            'id' => (int) $car->id,
            'category' => (string) $car->category,
            'availability' => (string) $car->availability,
            'brand' => (string) $car->brand,
            'model' => (string) $car->model,
            'year' => (string) $car->year,
            'mileage' => (string) $car->mileage,
            'fuel' => (string) $car->fuel,
            'seats' => (string) $car->seats,
            'price' => (int) $car->price,
            'description' => (string) $car->description,
            'days' => 1
        );
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array($id => $car_info);
        } else if (!isset($_SESSION["cart"][$id])) {
            // $count = count($_SESSION['cart']);
            $_SESSION["cart"][$id] = $car_info;
        }
    }
}
