<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clients</title>
</head>
<body>

<?php include "../nav.php"; ?>

<div class="container">
    <h2>Clients</h2>
    <p><a class="btn" href="clients_add.php">+ Add Client</a></p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['client_id'] ?></td>
                <td><?= $row['full_name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['address'] ?></td>
                <td>
                    <a class="btn" href="clients_edit.php?id=<?= $row['client_id'] ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>