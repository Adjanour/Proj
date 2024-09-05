<?php
include '../config/db.php';
include '../templates/header.php';

// Get the total donation amount
$query = "SELECT SUM(amount) AS total_donations FROM Donors";
$statement = $pdo->prepare($query);
$statement->execute();
$total_donations = $statement->fetch(PDO::FETCH_ASSOC)['total_donations'];

// Get donations by category
$query = "SELECT donation_type, SUM(amount) AS total FROM Donors GROUP BY donation_type";
$statement = $pdo->prepare($query);
$statement->execute();
$donations_by_category = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Donation Report</h2>

<p><strong>Total Donations: </strong>$<?= $total_donations ?></p>

<h3>Donations by Category</h3>
<table class="table mt-3">
    <thead>
    <tr>
        <th>Category</th>
        <th>Total Amount</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($donations_by_category as $category): ?>
        <tr>
            <td><?= $category['donation_type'] ?></td>
            <td>$<?= $category['total'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include '../templates/footer.php';
?>
