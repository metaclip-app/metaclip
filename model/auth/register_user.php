<?php
echo "register_user.php connected";
require('../../database/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function register($conn, $username, $email, $password) {
        if (strlen($password) < 8) {
            echo "A senha deve ter no mínimo 8 caracteres";
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        $stmt = $conn->getConnection()->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $hash);

        $result = $stmt->execute();

        return $result;
    }

    $databaseConnection = new Connection();
    $conn = $databaseConnection->getConnection();
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = register($databaseConnection, $username, $email, $password);
    header("Location: ../../view/pages/login.php");
} else {
    echo "Invalid request method.";
}

//function register($username, $email, $password) {
//        $existingname = $this->verificarNomeExistente($nome);
//        if($nomeExistente){
//            print "<script> alert('Nome já cadastrado')</script>";
//            return false;
//        }
//
//        $emailExistente = $this->verificarEmailExistente($email);
//        if($emailExistente){
//            print "<script> alert('Email já cadastrado')</script>";
//            return false;
//        }
//
//        if (strlen($password) < 8) {
//            echo "A senha deve ter no mínimo 8 caracteres";
//            return false;
//        }
//
//
//        $hash = password_hash($password, PASSWORD_DEFAULT);
//
//        $sql = "INSERT INTO users (username, email, password) VALUES (? ,? ,? )";
//
//        $stmt = $this->conn->prepare($sql);
//        $stmt->bindValue(1,$username);
//        $stmt->bindValue(2,$email);
//        $stmt->bindValue(3,$hash);    
//        $result = $stmt->execute();
//
//        return $result;
//    }
?>