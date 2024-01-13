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


    
  
      

      
      $query 	= "INSERT INTO logs (username,purpose) VALUES('$user','products $pro_name added')";
       $insert = mysqli_query($db,$query);
      header('location: ../products/products.php?added');
      if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    }else{
      $msg = "There was a problem uploading the image!";
      
  }
}

