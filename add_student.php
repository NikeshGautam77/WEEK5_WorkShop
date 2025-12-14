<?php require 'header.php'; ?>

<h2>Add Student Info</h2>
<form method="POST" action="">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Skills (comma-separated): <input type="text" name="skills" required><br>
    <input type="submit" value="Save">
</form>

<?php
require 'functions.php'; // custom functions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = formatName($_POST['name']);
        $email = validateEmail($_POST['email']);
        $skillsArray = cleanSkills($_POST['skills']);

        saveStudent($name, $email, $skillsArray);
        echo "<p style='color:green;'>Student info saved successfully!</p>";
    } catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<?php require 'footer.php'; ?>