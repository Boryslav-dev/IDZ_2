<?php

    session_start();
    include "db.php";
    global $pdo;
    
    if (isset($_POST['change'])) {
        $sql = $pdo -> prepare( "UPDATE pass_manager SET
        resource = ?,
        login = ?,
        email = ?,
        password = ?,
        description = ? 
        WHERE ID = ?");
        $sql -> execute(array( base64_encode($_POST['resource']),
        base64_encode($_POST['login']),
        base64_encode($_POST['email']),
        base64_encode( $_POST['password']),
        base64_encode($_POST['description']),
        $_POST['change']));
        header( "Location: index.php" );
    } 
    if (isset($_POST['OK'])) {
        var_dump($_POST);
        $sql = $pdo -> prepare( "INSERT INTO pass_manager (user_name, resource, login, email, password, description) 
        VALUES (?,?,?,?,?,?);");
        $sql -> execute(array(base64_encode($_SESSION['user_name']),
        base64_encode($_POST['resource']),
        base64_encode($_POST['login']),
        base64_encode($_POST['email']),
        base64_encode($_POST['password']),
        base64_encode( $_POST['description'])));
        header( "Location: index.php" );
    }


    if (isset($_POST['delete'])) {
        var_dump($_POST['delete']);
        $sql = $pdo -> prepare("DELETE FROM pass_manager WHERE pass_manager.ID = ?");
        $sql -> execute(array($_POST['delete']));
        header( "Location: index.php" );
    }

    if (isset($_POST['go-change'])) {
        $sql = $pdo -> prepare("SELECT ID, user_name, resource, login, email, password, description 
        FROM pass_manager WHERE ID = ?");
        $sql -> execute(array($_POST['go-change']));
        $infouser = $sql->fetchAll();

        $_SESSION['resource'] = base64_decode($infouser[0]['resource']);
        $_SESSION['login'] = base64_decode($infouser[0]['login']);
        $_SESSION['email'] = base64_decode($infouser[0]['email']);
        $_SESSION['password'] = base64_decode($infouser[0]['password']);
        $_SESSION['description'] = $infouser[0]['description'];
        $_SESSION['ID'] = $_POST['go-change'];

        header( "Location: index.php" );
    }
