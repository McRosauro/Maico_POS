<?php
include('../server/connection.php');
$alert = array();

if (isset($_POST['add_products'])) {
    $pro_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $qty = mysqli_real_escape_string($db, $_POST['qty']);
    $unit = mysqli_real_escape_string($db, $_POST['unit']);
    $min_stocks = mysqli_real_escape_string($db, $_POST['min_stocks']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($_FILES['image']['name']);
    $user = $_SESSION['username'];

    $sql = "INSERT INTO products (product_name, sell_price, quantity, unit, min_stocks, remarks, location, image) 
            VALUES ('$pro_name', '$price', '$qty', '$unit', '$min_stocks', '$remarks', '$location', '$image')";

    $result = mysqli_query($db, $sql);

    if ($result && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('location: ../products/products.php?added');
    } else {
        $msg = "There was a problem adding the product!";
        $alert[] = $msg;
    }
}
?>
