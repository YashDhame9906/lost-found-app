<?php
include "db.php";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];

    // Image upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    // Insert into DB
    $sql = "INSERT INTO items (title, description, type, location, contact, image)
            VALUES ('$title', '$description', '$type', '$location', '$contact', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Item posted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Item</title>
</head>
<body>

<h2>Post Lost/Found Item</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Item Title" required><br><br>

    <textarea name="description" placeholder="Description" required></textarea><br><br>

    <select name="type">
        <option value="lost">Lost</option>
        <option value="found">Found</option>
    </select><br><br>

    <input type="text" name="location" placeholder="Location" required><br><br>

    <input type="text" name="contact" placeholder="Contact" required><br><br>

    <input type="file" name="image" required><br><br>

    <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>