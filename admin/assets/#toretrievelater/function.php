<?php
require 'config.php';

if(isset($_POST['action'])){
        if($_POST['action'] == "edit"){
            edit();
        }
    }

function edit() {
    global $conn;
    $id = $_POST['id'];
    $name = $_POST['inAdminName'];
    $username = $_POST['inUsername'];
    $email = $_POST['inEmail'];
    $password = $_POST['inPassword_1'];

    $sql = "UPDATE admin_login SET name = '$name', username = '$username', email = '$email', password = '$password' WHERE admin_id = $id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return true;
}
?>