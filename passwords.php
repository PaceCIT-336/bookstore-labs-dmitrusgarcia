<?php
require_once 'login.php';

$email1 = 'skumar@email.com';
$email2 = 'nfrasier@email.com';
$password1 = 'password1';
$password2 = 'password2';

$hash1 = password_hash($password1, PASSWORD_DEFAULT);
$hash2 = password_hash($password2, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("UPDATE Customers SET Password=? WHERE Email=?");
    $stmt->bindParam(1, $hash1, PDO::PARAM_STR);
    $stmt->bindParam(2, $email1, PDO::PARAM_STR);
    $stmt->execute();

    $stmt = $pdo->prepare("UPDATE Customers SET Password=? WHERE Email=?");
    $stmt->bindParam(1, $hash2, PDO::PARAM_STR);
    $stmt->bindParam(2, $email2, PDO::PARAM_STR);
    $stmt->execute();

    echo "Passwords updated successfully.";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
