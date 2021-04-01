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
    <title>Загрузка xml в бд</title>
    <meta charset="utf-8">
    <style>
         td, th {
            text-align: center
         }
      </style>
</head>
<body>
    <h1>Загрузка xml данные в базу</h1>


    <form action="./xmlSaver.php" method="post" enctype="multipart/form-data">
        <p>Xml:
        <input type="file" name="xml[]" />
        <input type="submit" value="Загрузить" />
        </p>
    </form>
</body>
</html>
<?php
$conn->close(); 
?>