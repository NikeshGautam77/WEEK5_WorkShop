<?php
function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format");
    }
    return strtolower($email);
}

function cleanSkills($string) {
    $skills = explode(",", $string);
    $skills = array_map('trim', $skills);
    return $skills;
}

function saveStudent($name, $email, $skillsArray) {
    $line = $name . "|" . $email . "|" . implode(",", $skillsArray) . "\n";
    if (!file_put_contents("students.txt", $line, FILE_APPEND)) {
        throw new Exception("Unable to save student info");
    }
}

function uploadPortfolioFile($file) {
    $allowed = ['pdf', 'jpg', 'png'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("File upload error");
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        throw new Exception("Invalid file type. Only PDF, JPG, PNG allowed.");
    }

    if ($file['size'] > $maxSize) {
        throw new Exception("File exceeds 2MB size limit.");
    }

    $newName = uniqid("portfolio_", true) . "." . $ext;
    $uploadDir = __DIR__ . "/uploads/";

    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            throw new Exception("Failed to create upload directory.");
        }
    }

    $destination = $uploadDir . $newName;
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new Exception("Failed to move uploaded file.");
    }
}
?>