<?php
session_start();
$test = $_GET['test'];
$way = "c:/server/domains/localhost/temp/$test";
if (!file_exists($way))  {
  http_response_code(404);
  header('HTTP/1.1 404 Not Found');
//header('Location: www.website.com/404');
//  echo 'Тест не найден!';
  exit(1);
}
$fill = file_get_contents($way);
$array = json_decode($fill, true);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Обработка форм</title>
  <meta charset="utf-8">
  <link type="text/css" href="css/style.css" rel="stylesheet">
</head>
<body>
  <form action="" method="post">

    <?php
     $n = 0;
     $score = 0;
     foreach ($array as $value) {
       echo '<fieldset>';
       echo '<legend>'.$value['question'].'</legend>';
       $answer = $value['answer'];
       $n++;
       foreach ($answer as $vopr) {
         echo '<label><input type="radio" name="radio'.$n.'" value="'.$vopr.'" >'.$vopr.'</label>';
       }
       echo '</fieldset>';
       $lll = 'radio'.$n;
       if (isset($_POST[$lll])) {
        // $family = $_POST['family'];
        // $nam = $_POST['nam'];
         $_SESSION['fio'] = $_SESSION['name'];

         if ($_POST[$lll] == $value['result']) {
           $score++;
          // $echo = $echo.'На вопрос '.$value['question'].' Вы ответилт '.$_POST[$lll].' - это верный ответ'.'<br>';
         }
         //else {
          // $echo = $echo.'На вопрос '.$value['question'].' Вы ответили '.$_POST[$lll].'- это не верный ответ'.'<br>';
        // }
       }


     }
     ?>
     <br>
     <input type="submit" name="submit" value="Отправить">
     <br>

  </form>
<?php
if ($n>0) {
 $credit = ($score*100)/$n;
 if ($credit >= 90){
 $_SESSION['rating'] = 'пять';
 echo '<img src="picture.php">';
 }
 elseif ($credit >= 70 and $credit < 90 ){
 $_SESSION['rating'] = 'четыре';
 echo '<img src="picture.php">';
 }
 elseif ($credit >= 40 and $credit < 70 ){
 $_SESSION['rating'] = 'три';
 echo '<img src="picture.php">';
 }
 else  {
   if (isset($_POST['submit'])) {
     echo "не сдали зачет";}
   }

}
 ?>

</body>
</html>
