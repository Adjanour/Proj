<?php
include '../config/db.php';
include '../templates/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $donation_date = $_POST['donation_date'];
    $amount = $_POST['amount'];
    $donation_type = $_POST['donation_type'];

    $query = "INSERT INTO Donors (name, contact_info, donation_date, amount, donation_type) 
              VALUES (?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $contact, $donation_date, $amount, $donation_type]);

    header('Location: list_donors.php');
}
?>

<h2>Add New Donor</h2>
<form action="" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Donor Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="contact" class="form-label">Contact Info</label>
        <input type="text" class="form-control" name="contact" required>
    </div>
    <div class="mb-3">
        <label for="donation_date" class="form-label">Donation Date</label>
        <input type="date" class="form-control" name="donation_date" required>
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Donation Amount</label>
        <input type="number" class="form-control" name="amount" required>
    </div>
    <div class="mb-3">
        <label for="donation_type" class="form-label">Donation Type</label>
        <select class="form-select" name="donation_type" required>
            <option value="Money">Money</option>
            <option value="Supplies">Supplies</option>
            <option value="Clothes">Clothes</option>
            <option value="Food">Food</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Donor</button>
</form>

<?php
include '../templates/footer.php';
?>
