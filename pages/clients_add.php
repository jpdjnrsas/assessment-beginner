<?php
include "../db.php";
$message = "";

if (isset($_POST['save'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($full_name == "" || $email == "") {
        $message = "Name and Email are required!";
    } else {
        mysqli_query($conn, "INSERT INTO clients (full_name,email,phone,address)
                             VALUES ('$full_name','$email','$phone','$address')");
        header("Location: clients_list.php");
        exit;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Client</title>
</head>
<body>

<?php include "../nav.php"; ?>

<div class="container">
    <h2>Add Client</h2>
    <p class="error"><?= $message ?></p>

    <form method="post">
        <label>Full Name*</label>
        <input type="text" name="full_name">

        <label>Email*</label>
        <input type="text" name="email">

        <label>Phone</label>
        <input type="text" name="phone">

        <label>Address</label>
        <input type="text" name="address">

        <br><br>
        <button class="btn" type="submit" name="save">Save</button>
    </form>
</div>

</body>
</html>