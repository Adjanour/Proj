<?php
include 'templates/header.php';
include 'config/db.php';

// Fetch data for stats
$orphanCountQuery = "SELECT COUNT(*) AS total_orphans FROM Children";
$volunteerCountQuery = "SELECT COUNT(*) AS total_volunteers FROM Volunteers";
$donationCountQuery = "SELECT COUNT(*) AS total_donations FROM Donations";
$supplyCountQuery = "SELECT COUNT(*) AS total_supplies FROM Supplies";

$orphanCount = $pdo->query($orphanCountQuery)->fetch()['total_orphans'];
$volunteerCount = $pdo->query($volunteerCountQuery)->fetch()['total_volunteers'];
$donationCount = $pdo->query($donationCountQuery)->fetch()['total_donations'];
$supplyCount = $pdo->query($supplyCountQuery)->fetch()['total_supplies'];

// Fetch recent activity
$recentDonationsQuery = "SELECT name, donors.amount, donation_date FROM Donations join donors on donors.donor_id = Donatinons.donor_id ORDER BY date DESC LIMIT 5";
$recentSuppliesQuery = "SELECT item_name, quantity, received_date FROM Supplies ORDER BY received_date DESC LIMIT 5";
$recentVolunteersQuery = "SELECT name, join_date FROM Volunteers ORDER BY join_date DESC LIMIT 5";

$recentDonations = $pdo->query($recentDonationsQuery)->fetchAll(PDO::FETCH_ASSOC);
$recentSupplies = $pdo->query($recentSuppliesQuery)->fetchAll(PDO::FETCH_ASSOC);
$recentVolunteers = $pdo->query($recentVolunteersQuery)->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Welcome to the Orphanage Management System</h1>
<p>Manage donations, supplies, and volunteers.</p>

<div class="row">
    <!-- Quick Stats -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Orphans</h5>
                <p class="card-text"><?= $orphanCount ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Volunteers</h5>
                <p class="card-text"><?= $volunteerCount ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Donations</h5>
                <p class="card-text"><?= $donationCount ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Supplies</h5>
                <p class="card-text"><?= $supplyCount ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row mt-4">
    <div class="col-md-6">
        <h3>Recent Donations</h3>
        <ul class="list-group">
            <?php foreach ($recentDonations as $donation): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($donation['donor_name']) ?>:</strong>
                    <?= htmlspecialchars($donation['amount']) ?> -
                    <?= htmlspecialchars($donation['date']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="col-md-6">
        <h3>Recent Supplies</h3>
        <ul class="list-group">
            <?php foreach ($recentSupplies as $supply): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($supply['item_name']) ?>:</strong>
                    <?= htmlspecialchars($supply['quantity']) ?> -
                    <?= htmlspecialchars($supply['received_date']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <h3>Recent Volunteers</h3>
        <ul class="list-group">
            <?php foreach ($recentVolunteers as $volunteer): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($volunteer['name']) ?>:</strong>
                    Joined on <?= htmlspecialchars($volunteer['join_date']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Quick Actions -->
    <div class="col-md-6">
        <h3>Quick Actions</h3>
        <ul class="list-group">
            <li class="list-group-item"><a href="add_orphan.php" class="btn btn-primary">Add New Orphan</a></li>
            <li class="list-group-item"><a href="add_volunteer.php" class="btn btn-primary">Add New Volunteer</a></li>
            <li class="list-group-item"><a href="add_donation.php" class="btn btn-primary">Log New Donation</a></li>
            <li class="list-group-item"><a href="add_supply.php" class="btn btn-primary">Add New Supply</a></li>
        </ul>
    </div>
</div>

<?php
include 'templates/footer.php';
?>
