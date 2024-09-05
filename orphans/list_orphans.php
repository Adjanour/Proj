<?php
include '../config/db.php';
include '../templates/header.php';

// Fetch orphans from the database
$query = "SELECT Child_ID, First_Name, Last_Name, Date_Of_Birth, Gender, Admission_Date FROM Children";
$statement = $pdo->prepare($query);
$statement->execute();
$orphans = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Orphans List</h2>
<a href="add_orphan.php" class="btn btn-primary">Add Orphan</a>

<table class="table mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Admission Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orphans as $orphan): ?>
        <tr>
            <td><?= $orphan['Child_ID'] ?></td>
            <td><?= $orphan['First_Name'] . ' ' . $orphan['Last_Name'] ?></td>
            <td><?= $orphan['Date_Of_Birth'] ?></td>
            <td><?= $orphan['Gender'] ?></td>
            <td><?= $orphan['Admission_Date'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include '../templates/footer.php';
?>
