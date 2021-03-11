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

if(!empty($name) && !empty($count)){
    $sql = "INSERT INTO `product` (`name`, `count`) VALUES ('$name', $count) ";
    if ($conn->query($sql) === TRUE) {
        echo "Сохранили продукт в базу";
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