<?php
session_start();
if ($_SESSION['status'] <> 'user') {
  http_response_code(403);
  header('HTTP/1.1 403 Not Found');
  exit(1);
}

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Обработка форм</title>
  <meta charset="utf-8">
  <link type="text/css" href="css/style.css" rel="stylesheet">
</head>
<body>
  <form enctype="multipart/form-data" action="" method="POST">
    <div>Выбирите файл с тестом</div>
     <br>
       <input name="userfile" type="file" />
     <br>
     <br>
   <input type="submit" value="Отправить">
  </form>
  <?php
  if (!empty($_FILES)) {

    if (array_key_exists('userfile', $_FILES)) {
      if ($_FILES['userfile']['error'] === 0) {
        $name = basename($_FILES["userfile"]["name"]);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], "temp/$name"))
        {
           //  echo "файл сохранен";
          echo '<meta http-equiv="refresh" content="0;URL=/list.php">';
        }



      }
    }
  }
   ?>
  <br>
  <br>
  <a href="list.php">lest.php</a>
</body>
</html>
