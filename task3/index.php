<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
 
$servername = "localhost";
$username = "root";
$password = "1";
$table = "test";

$conn = new mysqli ($servername, $username, $password, $table);
?>

<html>
<head>
    <title>Склад</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Список товаров</h1>
<table style="width:100%">
  <tr>
    <th>Индефикатор</th>
    <th>Название</th>
    <th>Количество</th>
  </tr>
  <?php
    $sql = "SELECT * from product;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["name"].'</td>';
        echo '<td>'.$row["count"].'</td>';
        echo "</tr>";
    }
    } else {
        echo "Склад пуст!";
    }
    ?>
</table> 

<form action="/insert.php">
    <lavel for="name">Название товара</label>
    <input id="name" type="text" name="name">
    <lavel for="count">Количество товара</label>
    <input id="count" type="text" name="count">
    <input type="submit" value="Сохранить">
</form>
</body>
</html>
<?php
$conn->close(); 
?>