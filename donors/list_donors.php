<?php
include '../config/db.php';
include '../templates/header.php';

// Fetch donors from the database
$query = "SELECT * FROM Donors";
$statement = $pdo->prepare($query);
$statement->execute();
$donors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Donor List</h2>
<a href="add_donor.php" class="btn btn-primary">Add Donor</a>

<table class="table mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Donation Date</th>
        <th>Amount</th>
        <th>Type</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($donors as $donor): ?>
        <tr>
            <td><?= $donor['donor_id'] ?></td>
            <td><?= $donor['name'] ?></td>
            <td><?= $donor['contact_info'] ?></td>
            <td><?= $donor['donation_date'] ?></td>
            <td><?= $donor['amount'] ?></td>
            <td><?= $donor['donation_type'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include '../templates/footer.php';
?>
