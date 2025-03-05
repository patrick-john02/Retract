<?php
// Define the default password
$defaultPassword = "123";

// Hash bcrypt
$hashedPassword = password_hash($defaultPassword, PASSWORD_DEFAULT);

echo "Default Password: $defaultPassword <br>";
echo "Hashed Password: $hashedPassword";
?>
