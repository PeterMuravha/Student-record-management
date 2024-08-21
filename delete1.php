<?php

include('config.php');
// Check if the 'id' GET parameter is set
if (isset($_GET['id'])) {
$id = $_GET['id'];
// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
// Execute the statement and check for success
if ($stmt->execute()) {
echo "";
} else {
echo "Error: " . $stmt->error;
}
// Close the statement and connection
$stmt->close();
$conn->close();
}

header("location:delete_form.php");
?>