<?php
$result = "";
if (empty($_GET)) {
    $result =  'Ничего не передано!';
}
$operation = $_GET['operation'];
$x = $_GET['x'];
$y = $_GET['y'];

if (empty($operation)) {
    $result = 'Не передана операция';
}



if (empty($x) || empty($y)) {
    $result = 'Не переданы аргументы';
}

if($result == ""){
    switch ($operation) {
        case "+":
            $result = $x + $y;
            break;
        case "-":
            $result = $x - $y;
            break;
        case "*":
            $result = $x * $y;
            break;
        case "/":
            $result = $x / $y;
            break;
    }
}
?>

<html>
<head>
    <title>Калькулятор</title>
    <meta charset="utf-8">
</head>
<body>
<form action="/task2.php">
    <input type="text" name="x" value = "<?php echo $x?>">
    <select name="operation"  >
        <option  <?php if ($operation == "+") echo "selected"?>>+</option>
        <option  <?php if ($operation == "-") echo "selected"?>>-</option>
        <option  <?php if ($operation == "*") echo "selected"?>>*</option>
        <option <?php if ($operation == "/") echo "selected"?>>/</option>
    </select>
    <input type="text" name="y" value = "<?php echo $y?>">
    <div> = <?php echo $result?></div>
    <input type="submit" value="Посчитать">
</form>
</body>
</html>
