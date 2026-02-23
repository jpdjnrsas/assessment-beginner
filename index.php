<?php
include "db.php";

$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) s FROM services"))['s'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) b FROM bookings"))['b'];
$revenue = mysqli_fetch_assoc(mysqli_query($conn,
  "SELECT IFNULL(SUM(amount_paid),0) r FROM payments"))['r'];
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
  <h2>Dashboard Overview</h2>

  <div class="cards">
    <div class="card"><h3>Total Clients</h3><p><?= $clients ?></p></div>
    <div class="card"><h3>Total Services</h3><p><?= $services ?></p></div>
    <div class="card"><h3>Total Bookings</h3><p><?= $bookings ?></p></div>
    <div class="card"><h3>Total Revenue</h3><p>₱<?= number_format($revenue,2) ?></p></div>
  </div>
</div>

</body>
</html>