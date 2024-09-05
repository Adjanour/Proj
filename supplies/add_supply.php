<?php
include '../config/db.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $received_date = $_POST['received_date'];

    $query = "INSERT INTO Supplies (item_name, category, quantity, received_date) 
              VALUES (?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$item_name, $category, $quantity, $received_date]);

    header('Location: list_supplies.php');
}
?>

<h2>Add New Supply</h2>
<form action="" method="POST">
    <div class="mb-3">
        <label for="item_name" class="form-label">Item Name</label>
        <input type="text" class="form-control" name="item_name" required>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" name="category" required>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" name="quantity" required>
    </div>
    <div class="mb-3">
        <label for="received_date" class="form-label">Received Date</label>
        <input type="date" class="form-control" name="received_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Supply</button>
</form>

<?php
include '../templates/footer.php';
?>
