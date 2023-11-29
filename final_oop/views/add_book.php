<?php
require_once '../classes/book.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['PassengerName'];
    $payment = $_POST['payment'];
    $qty = $_POST['available'];

    $product = new Product();
    $product->addProduct($productName, $price, $qty);

    header('Location: ./dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>

</head>
<body>
    <?php include './sidebar.php'; ?>
    <h3>Add Book</h3>
    <form method="post" enctype="multipart/form-data">
        <label for="productName">Passenger Name:</label>
        <input type="text" name="PassengerName" required><br>
        <label for="payment">Payment:</label>
        <input type="number" name="payment" step="0.01" required><br>
        <label for="qty">Available:</label>
        <input type="number" name="qty" required><br>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>