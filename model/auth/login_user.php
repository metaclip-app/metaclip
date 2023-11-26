<?php
echo "login_user.php connected";
require('../../database/database.php');

$databaseConnection = new Connection();

function login($conn, $email, $password) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        return;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT id, username, password FROM users WHERE email = :email";
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false) {
        if (password_verify($password, $result['password'])) {
            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            header("Location: ../../view/pages/app.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    login($databaseConnection, $email, $password);
} else {
    echo "Invalid request method.";
}
?>