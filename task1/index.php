<?php
    $diskC = array (
        "folder1" => array(
            "subfolder11" => array(
            "txt_file" => "report.txt", "pdf_file" => "essay.pdf"
            ),
            "subfolder12" => array(
            "jpg_file" => "picture.jpg", 
            "gif_file" => "animation.gif",
            "subfolder121" => array(
                "jpg_file" => "pictures.jpg", "gif_file" => "animation.gif"
                ),
            ),
            
        ),
        "folder2" => array(
            "subfolder21" => array(
            "txt_file" => "report.txt", "pdf_file" => "article.pdf"
            ),
            "subfolder22" => array(
            "txt_file" => "sketch.txt", "pdf_file" => "essay.pdf"
            ),
            "subfolder23" => array(
                "pdf_file" => "draw.txt", "pdf_file" => "line.pdf"
            ),
            "subfolder24" => array(
                "subfolder241" => array(
                "txt_file" => "report.txt", "pdf_file" => "article.pdf"
                ),
                "subfolder242" => array(
                "txt_file" => "sketch.txt", "pdf_file" => "essay.pdf"
                ),
                "subfolder243" => array(
                    "pdf_file" => "draw.txt", "pdf_file" => "lineNew.pdf"
                )
            )
        )
        ); 

    // печатае пробелы для вывода дерева
    function printSpace($count){
        echo "|";
        for ($i=0; $i < $count; $i++) { 
            echo "-----";
        }
    }

    // обход дерева в глубину и вывод
    function showTreeInDeep($array, $level){
        foreach($array as $key => $value) {
            printSpace($level);
            echo $key;
            if(!is_array($value)){
                echo " ";
                echo $value;
            }
            echo  "\n";

            treeInDeep($value, $level + 1);
        }
    }

    $map = [];

    // обход дерева в глубину и удаление повторяющихся
    function checkAndDeleteRepeatFile($key, $value){
        $ans = [];

        foreach($value as $k => $v) {
            if(is_array($v)){
                $ans[$k] = checkAndDeleteRepeat($k, $v);
            } else if(isNotRepeatFile($v)) {
                $ans[$k] = $v;
            }
        }

        return $ans;
    }

    // проверят, что такого файла не было
    function isNotRepeatFile($file){
        global $map;
        if(array_key_exists($file, $map)){
            return false;
        } else {
            $map[$file] = 0;
            return true;
        }
    }

    $zeroLevel = 0;
    echo "<pre>";
    echo "BEFORE: \n";
    showTreeInDeep($diskC, $zeroLevel);


    $diskC = checkAndDeleteRepeatFile("", $diskC);

    echo "\n\n";
    echo "AFTER: \n";
    showTreeInDeep($diskC, $zeroLevel);
    echo "</pre>";
?>
