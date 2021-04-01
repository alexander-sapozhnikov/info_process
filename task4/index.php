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
    <style>
         td, th {
            text-align: center
         }
      </style>
</head>
<body>
<h1>Список товаров</h1>

  <?php
    $sql = "SELECT * from product;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table style="width:100%">
        <tr>
          <th>Индефикатор</th>
          <th>Название</th>
          <th>Количество</th>
          <th>Действия</th>
        </tr>';
        
        while($row = $result->fetch_assoc()) {
            echo '<tr> <form action="/edit.php">';

            echo '<input id="name"  type="hidden" name="id" value = "'.$row["id"].'">';

            echo '<td>'.$row["id"].'</td>';

            echo '<td> <input id="name" type="text" name="name" value = "'.$row["name"].'"> </td>';

            echo '<td> <input id="count" type="text" name="count" value="'.$row["count"].'"> </td>';

            echo '<td> <input type="submit" value="Изменить"> </form>';

            echo '<form action="/delete.php" style= "float: right;">';
            echo '<input id="name"  type="hidden" name="id" value = "'.$row["id"].'">';
            echo '<input type="submit" value="Удалить"></td> </from></td>';

            echo '</form> </tr>';
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