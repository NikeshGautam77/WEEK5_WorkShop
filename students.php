<?php
require 'header.php';
echo "<h2>Students List</h2>";

$filename = "students.txt";
if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($name, $email, $skills) = explode("|", $line);
        $skillsArray = explode(",", $skills);

        echo "<p><strong>Name:</strong> $name<br>
              <strong>Email:</strong> $email<br>
              <strong>Skills:</strong> " . implode(", ", $skillsArray) . "</p><hr>";
    }
} else {
    echo "<p>No students found.</p>";
}

require 'footer.php';
?>