<?php
include '../config/db.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $role = $_POST['role'];
    $availability_days = $_POST['availability_days'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "INSERT INTO Volunteers (name, contact_info, role, availability_days, start_date, end_date) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $contact_info, $role, $availability_days, $start_date, $end_date]);

    header('Location: list_volunteers.php');
}
?>

<h2>Add New Volunteer</h2>
<form action="" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="contact_info" class="form-label">Contact Info</label>
        <input type="text" class="form-control" name="contact_info" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input type="text" class="form-control" name="role" required>
    </div>
    <div class="mb-3">
        <label for="availability_days" class="form-label">Availability Days</label>
        <input type="text" class="form-control" name="availability_days" required>
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" class="form-control" name="start_date" required>
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" class="form-control" name="end_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Volunteer</button>
</form>

<?php
include '../templates/footer.php';
?>
