<?php session_start();

if (empty($_SESSION['cart']) || !isset($_SESSION['cart'])) {
    header("Location: index.html");
}

$days = $_REQUEST['days'];

$total = 0;
$index = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $_SESSION["cart"][$key]["days"] = $days[$index];
    $total += $days[$index++] * $value["price"];
}
$_SESSION["total"] = $total;


?>
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
                <a style="color:green;" href="cart.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Cart</a>
            </ul>
        </div>
    </nav>


    <div class="container">
        <form action="mail.php" class="mt-5">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Full Name</label>
                    <input type="text" class="form-control" required name="name" placeholder="Full Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" class="form-control" required name="address" placeholder="Address">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" required name="city" placeholder="Suburb">
                </div>
                <div class="form-group col-md-6">
                    <label>State</label>
                    <input type="text" class="form-control" required name="state" placeholder="State">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>State</label>
                    <input type="text" class="form-control" required name="state" placeholder="Country">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" required name="email" placeholder="Email">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Post Code</label>
                    <input type="text" class="form-control" required name="postCode" placeholder="Country">
                </div>
            </div>

            <div class="form-row">
                <label>Payment Type<span style="color:red">*</span>:</label>
                <select id="paymentType" required>
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="PayPal">PayPal</option>
                    <option value="AmericanExpress">AmericanExpress</option>
                </select>
            </div>

            <h4 style="margin-top: 5%">The total price for your reservation would be: <?php echo $_SESSION['total'] ?> </h4>

            <button type="submit" name="purchase" class="btn btn-primary mt-5">Purchase</button>
        </form>
    </div>
</body>

</html>