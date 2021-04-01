<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
 
$servername = "localhost";
$username = "root";
$password = "1";
$table = "test";

$conn = new mysqli ($servername, $username, $password, $table);

foreach ($_FILES["xml"]["type"] as $key => $type) {

    if($type == "text/xml"){
        $file = file_get_contents($_FILES["xml"]["tmp_name"][0]);
        $data = new SimpleXMLElement($file);

        foreach($data->product as $product) {
            addProduct($product);
        }
    } else{
        echo "Это не файл xml!";
    }
}

function addProduct($product){
    global $conn;
    $name = $product->name;
    $count = $product->count;


    $sql = "INSERT INTO `product` (`name`, `count`) VALUES ('$name', $count) ";
    if ($conn->query($sql) === TRUE) {
        echo "Сохранили продукт \"$name\" в базу!";
    } else {
        echo "Ошибка с продуктом \"$name\": </br>" . $sql . "<br>" . $conn->error;
    }

    echo "</br></br>";
}

$conn->close(); 
?>

<html>
<head>
    <title>Отправка данных в базу!</title>
    <meta charset="utf-8">
</head>
<body>
<form action="/index.php">
    <input type="submit" value="Вернуться">
</form>
</body>
</html>