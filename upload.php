<?php require 'header.php'; ?>
<h2>Upload Portfolio File</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="portfolio" required>
    <input type="submit" value="Upload">
</form>

<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        uploadPortfolioFile($_FILES['portfolio']);
        echo "<p style='color:green;'>File uploaded successfully!</p>";
    } catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<?php require 'footer.php'; ?>