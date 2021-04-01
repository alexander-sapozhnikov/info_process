<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
 
$servername = "localhost";
$username = "root";
$password = "1";
$table = "test";

$conn = new mysqli ($servername, $username, $password, $table);

$name = $_GET['name'];
$count = $_GET['count'];
$id = $_GET['id'];

if(!empty($name) && !empty($count)){
    $sql = " UPDATE `product` set  `name` = '$name', `count` = $count where `id` = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Обновили продукт \"$name\" в базе";
      } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
      }
}
$conn->close(); 
?>

<html>
<head>
    <title>Склад</title>
    <meta charset="utf-8">
</head>
<body>
<form action="/index.php">
    <input type="submit" value="Вернуться">
</form>
</body>
</html>