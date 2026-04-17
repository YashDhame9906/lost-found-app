<?php
include __DIR__ . "/db.php";

$sql = "SELECT * FROM items ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Items</title>
    <style>
        body { font-family: Arial; }
        .card {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 15px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }
        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .lost { color: red; font-weight: bold; }
        .found { color: green; font-weight: bold; }
    </style>
</head>
<body>

<h2>Lost & Found Items</h2>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<div class="card">
    <img src="uploads/<?php echo $row['image']; ?>">

    <h3><?php echo $row['title']; ?></h3>

    <p><?php echo $row['description']; ?></p>

    <p class="<?php echo $row['type']; ?>">
        <?php echo strtoupper($row['type']); ?>
    </p>

    <p><b>Location:</b> <?php echo $row['location']; ?></p>
    <p><b>Contact:</b> <?php echo $row['contact']; ?></p>
</div>

<?php
    }
} else {
    echo "No items found";
}
?>

</body>
</html>