<?php
// index.php
require 'header.php'; // include header

echo "<h1>Welcome to Student Portfolio Manager</h1>";
echo "<ul>
        <li><a href='add_student.php'>Add Student Info</a></li>
        <li><a href='upload.php'>Upload Portfolio File</a></li>
        <li><a href='students.php'>View Students</a></li>
      </ul>";

require 'footer.php'; // include footer
?>