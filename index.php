<?php
session_start();

if (isset($_POST['submit'])) {
if (isset(($_POST['fam']), $_POST['pas'])) {
  $way = "c:/server/domains/localhost/login.json";
  $fill = file_get_contents($way);
  $array = json_decode($fill, true);
  $flag = false;
  foreach ($array as $value) {
    if ($value['log'] === $_POST['fam'] and $value['password'] === $_POST['pas']) {
      echo "все ок";
      $flag = true;
      $_SESSION['status'] = 'user';
      $_SESSION['name'] = $value['fio'];
      echo '<meta http-equiv="refresh" content="0;URL=/list.php">';
    }
    }
  if ($flag == false) {
    echo "Вы ввели не верного пользователя или пароль. Попробуйте еще раз.";
  }
}
}
if (isset($_POST['submit2'])) {
    $_SESSION['status'] = 'guest';
    $_SESSION['name'] = $_POST['fam'];
    echo '<meta http-equiv="refresh" content="0;URL=/list.php">';
}
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Авторизация</title>
  <meta charset="utf-8">
  <link type="text/css" href="css/style.css" rel="stylesheet">
</head>
<body>
  <form action="" method="post">
    <span>Авторизуйтесь или введите имя и войдите как гость:</span>
    <br>
    <br>
    <span>Введите логин:</span>
    <input type="text" required name="fam">
    <br>
    <br>
    <span>Введите пароль:     </span>
    <input type="password" name="pas">
    <br>
    <br>
    <input type="submit" name="submit" value="Авторизация">
    <input type="submit" name="submit2" value="Гость">
  </form>
</body>
</html>
