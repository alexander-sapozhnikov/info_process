<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
 
$servername = "localhost";
$username = "root";
$password = "1";
$table = "test";

$conn = new mysqli ($servername, $username, $password, $table);

$id = $_GET['id'];

if(!empty($id)){
    $sql = "DELETE FROM  `product` where `id` = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Удалили продукт с номером \"$id\" из базы!";
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