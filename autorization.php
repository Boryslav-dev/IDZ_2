<?php
    include ("db.php");
    session_start();
    if(isset($_POST['in']))
    {
        $stm = $pdo -> prepare("SELECT users.id, users.login, users.password FROM users WHERE users.login LIKE ? ");
        $stm ->execute(array($_POST['login']));
        $loginResult=$stm->fetchAll();
        if(empty($loginResult))
        {
            echo "No";
        }
        else if($loginResult[0]['login']==$_POST['login'] && password_verify($_POST['password'], $loginResult[0]['password'])==true)
        {
            $_SESSION['user_name']=$_POST['login'];
            $_SESSION['resource'] = '';
            $_SESSION['login'] = '';
            $_SESSION['email'] = '';
            $_SESSION['password'] = '';
            $_SESSION['description'] = '';
            $_SESSION['ID'] = ' ';
            header( "Location: index.php" );
        }
    }

    else if(isset($_POST['up']))
    {
        $stm = $pdo -> prepare("SELECT COUNT(1) FROM users WHERE users.login LIKE ?");
        $stm ->execute(array($_POST['login-up']));
        $regResult=$stm->fetchAll(PDO::FETCH_COLUMN);
        if($regResult[0]==0)
        {
            $stm=$pdo -> prepare("INSERT INTO users (login, password) VALUES (?, ?)");
            $stm ->execute(array($_POST['login-up'],
            password_hash($_POST['password-up'],PASSWORD_DEFAULT)));
            header( "Location: index.php" );
        }
        else
        {
            echo "No";
        }
    }
?>