<?php
include '../config/db.php';
include '../templates/header.php';

// Fetch volunteers from the database
$query = "SELECT volunteer_id, name, contact_info, start_date, availability_days FROM Volunteers";
$statement = $pdo->prepare($query);
$statement->execute();
$volunteers = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Volunteers List</h2>
<a href="add_volunteer.php" class="btn btn-primary">Add Volunteer</a>

<table class="table mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact Info</th>
        <th>Start Date</th>
        <th>Availability Days</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteers as $volunteer): ?>
        <tr>
            <td><?= htmlspecialchars($volunteer['volunteer_id']) ?></td>
            <td><?= htmlspecialchars($volunteer['name']) ?></td>
            <td><?= htmlspecialchars($volunteer['contact_info']) ?></td>
            <td><?= htmlspecialchars($volunteer['start_date']) ?></td>
            <td><?= htmlspecialchars($volunteer['availability_days']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include '../templates/footer.php';
?>
