<?php
include '../config/db.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $admission_date = $_POST['admission_date'];

    // Insert the data into the Children table
    $query = "INSERT INTO Children (First_Name, Last_Name, Date_Of_Birth, Gender, Admission_Date) 
              VALUES (?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$first_name, $last_name, $dob, $gender, $admission_date]);

    // Redirect after successful insertion
    header('Location: list_orphans.php');
    exit;
}
?>

<h2>Add New Orphan</h2>
<form action="" method="POST">
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" required>
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" required>
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" required>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="admission_date" class="form-label">Admission Date</label>
        <input type="date" class="form-control" name="admission_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Orphan</button>
</form>

<?php
include '../templates/footer.php';
?>
