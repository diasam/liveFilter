<?php
session_start();
include_once("connection.php"); 
include_once("user.php");
$error = "";
if(isset($_POST["submit"])) {
    if(empty($_POST["username"]) || empty($_POST["password"])) {
        $error = "Both fields are required.";
    } else if ($_POST["submit"] == "Login"){
        if(($user = existsInDatabase($db_mysql, $_POST['username'], $_POST['password'])) != null) {
            $_SESSION['user_logged'] = serialize($user);
            header("location: home.php");
        } else {
            $error = "Incorrect username or password.";
        }
    }
    
}
function existsInDatabase($db, $username, $password) {
    try {
        $stmt=$db->prepare("SELECT nome, cognome, tipo FROM accesso.utente WHERE username = :username and password = :password ");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $password = md5($password);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 50);
        $stmt->execute();
        if($stmt->rowCount() == 1) {
            $result = $stmt->fetch();
            return new User($result['nome'], $result['cognome'], $result['tipo']);
        } else {
            return null;
        }   
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }
}
echo $error;