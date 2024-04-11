<?php

//量と長さをランダムに生成
$quantity = rand(0, 20);
if($quantity){
    for($i = 0; $i < $quantity; $i++){
        $length[] = rand(0, 10);
    }
} else {
    $length[] = 0;
}
printf('%s %s %s %s %s', "量=", $quantity, " 長さ=", implode(', ', $length), "\n");

//絵の出力計算
$max_length = max($length);
$height = $max_length + 2;
$width = $quantity * 2 + 2;
if($max_length == 0){
    $width = 4 + max(0, $quantity - 1) * 2;
    $height = 3; 
}

function lengthJudgement($w, $h) {
    global $length, $quantity;
    $h--;
    $index = ($w - 3) / 2;
    $length_index = $length[$index];
    if($h < $length_index){
        return 'X';
    } else if($h == $length_index){
        return 'V';
    } else {
        return '.';
    }
}

for($i = 1; $i <= $height; $i++){
    for($j = 1; $j <= $width; $j++){
        if(($i == 1 || $i == $height) && $j == 1){
            echo '+';
        } else if(($i == 1 || $i == $height) && $j > 1){
            echo '-';
        } else if((1 < $i && $i < $height + 1) && $j == 1){
            echo '|';
        } else if((1 < $i && $i < $height + 1) && $j % 2 == 0){
            echo '.';
        } else {
            echo lengthJudgement($j, $i) ;
        }
    }
    echo "\n";
}
?>
