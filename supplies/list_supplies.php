<?php
include '../config/db.php';
include '../templates/header.php';

// Fetch supplies from the database
$query = "SELECT * FROM Supplies";
$statement = $pdo->prepare($query);
$statement->execute();
$supplies = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Supplies List</h2>
<a href="add_supply.php" class="btn btn-primary">Add Supply</a>

<table class="table mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Received Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($supplies as $supply): ?>
        <tr>
            <td><?= $supply['supply_id'] ?></td>
            <td><?= $supply['item_name'] ?></td>
            <td><?= $supply['category'] ?></td>
            <td><?= $supply['quantity'] ?></td>
            <td><?= $supply['received_date'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include '../templates/footer.php';
?>
