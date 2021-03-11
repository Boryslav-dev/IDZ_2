<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
</head>
<body>
  <?php
    session_start();
    include "db.php";
    global $pdo;

    if(isset($_SESSION['user_name'])) {
        echo ("<a href='logout.php'>Выйти</a>");
    }
    else {
      echo("<a href='registration.php'>Sign up</a>");
      echo("<a href='login.php'>Sing in</a>");
    } 
    ?>

  <form action="processing.php" method="post">
    <table>
        <tr>
            <td>Ресурс</td>
            <td><input type="text" name="resource" value=""></td>
        </tr>
        <tr>
            <td>Почта</td>
            <td><input type="text" name="email" value=""></td>
        </tr>
        <tr>
            <td>Логин</td>
            <td><input type="text" name="login" value=""></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="text" name="password" value=""></td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><input type="text" name="description" value=""></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="OK" value="Добавить"></td>
        </tr>
    </table>
  </form>
  <form action="processing.php" method="post">
    <table>
        <tr>
            <td>Ресурс</td>
            <td><input type="text" name="resource" value="<?= $_SESSION['resource']; ?>"></td>
        </tr>
        <tr>
            <td>Почта</td>
            <td><input type="text" name="email" value="<?= $_SESSION['email']; ?>"></td>
        </tr>
        <tr>
            <td>Логин</td>
            <td><input type="text" name="login" value="<?= $_SESSION['login']; ?>"></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="text" name="password" value="<?= $_SESSION['password']; ?>"></td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><input type="text" name="description" value="<?=$_SESSION['description']; ?>"></td>
        </tr>
        <tr>
            <?php echo('<form action = "processing.php" method="post">');
                echo('<button class="change" name="change" value="'.$_SESSION['ID'].'">Change</button>');
                ?>
        </tr>
    </table>
</form>

  <table border='1'>
    <tr>
        <td>Ресурс</td>
        <td>Логин</td>
        <td>Почта</td>
        <td>Пароль</td>
        <td>Описание</td>
        <td>Редактирование</td>
    </tr>
    <?php
    if (isset($_SESSION['user_name'])) {
        $sql = $pdo -> prepare('SELECT ID, resource, login, email, password, description FROM pass_manager WHERE user_name = ?');
        $sql -> execute(array(base64_encode($_SESSION['user_name'])));
        $result = $sql->fetchAll();
        foreach ($result as $a) {
            echo("<tr>");
            foreach (array_slice($a, 1) as $d) {
                echo('<td class="cell">');
                echo base64_decode($d);
                echo("</td>");
            }
            echo("<td>");
            echo('<form action = "processing.php" method="post">');
            echo('<button class="go-change" name="go-change" value="'.$a['ID'].'">Change</button>');
            echo('<button class="delete" name="delete" value="'.$a['ID'].'">Delete</button>');
            echo('</form>');
            echo("</td>");
            echo("</tr>");
        }
      }
      else {
        echo("Войдите что-бы увидеть");
      }
    ?>
</table>
</body>
</html>
