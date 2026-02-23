<?php
include "../db.php";

$id = $_GET['id'];
$get = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = $id");
$client = mysqli_fetch_assoc($get);

$message = "";

if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($full_name == "" || $email == "") {
        $message = "Name and Email are required!";
    } else {
        mysqli_query($conn, "UPDATE clients
                             SET full_name='$full_name', email='$email', phone='$phone', address='$address'
                             WHERE client_id=$id");
        header("Location: clients_list.php");
        exit;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Client</title>
</head>
<body>

<?php include "../nav.php"; ?>

<div class="container">
    <h2>Edit Client</h2>
    <p class="error"><?= $message ?></p>

    <form method="post">
        <label>Full Name*</label>
        <input type="text" name="full_name" value="<?= $client['full_name'] ?>">

        <label>Email*</label>
        <input type="text" name="email" value="<?= $client['email'] ?>">

        <label>Phone</label>
        <input type="text" name="phone" value="<?= $client['phone'] ?>">

        <label>Address</label>
        <input type="text" name="address" value="<?= $client['address'] ?>">

        <br><br>
        <button class="btn" type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>