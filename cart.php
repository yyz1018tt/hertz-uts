<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hertz-UTS</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Hertz-UTS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" style="text-align: center;" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Car Rental Center <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="form-inline my-2 my-lg-0">
                <a style="color:green" href="index.html" class="btn btn-outline-success my-2 my-sm-0" type="submit">Back</a>
            </ul>
        </div>
    </nav>


    <div class="container">
        <h3 style="text-align:center" class="mt-5 mb-5">Reservation Details</h3>
        <form action="checkout.php" name="myForm" onsubmit='return validation()'>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Apperance</th>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Price Per Day</th>
                        <th scope="col">Rental Days</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $keys => $values) {
                            $title = $values['brand'] . "-" . $values['model'] . "-" . $values['year'];
                            $link = "deleteCar.php?id=" . $values['id']
                    ?>
                            <tr>

                                <td><?php echo $values['id'] ?></td>
                                <td><?php echo "<img src='./img/" . $values['model'] . ".jpg' style='height: 100px; width: 100px'>" ?></td>
                                <td><?php echo $title ?></td>
                                <td><?php echo $values['price'] ?></td>
                                <td><?php echo '<input name="days[]" id="days" required min="1" type="number" value="' . $values['days'] . '" >' ?></td>
                                <td><?php echo '<a href="' . $link . '" class="btn btn-danger">Delete Car</a>' ?></td>
                            </tr>
                    <?php
                        }
                    }


                    ?>

                </tbody>
            </table>

            <button type="submit" id="checkOutButton" class="btn btn-danger" onclick="checkEmpty()">Check Out</button>

        </form>
    </div>
    <script>
        function checkEmpty() {
            var arr = <?php echo json_encode($_SESSION['cart']); ?>;
            if (arr.length == 0) {
                alert("No car has been reserved");
            }
        }
    </script>
</body>

</html>