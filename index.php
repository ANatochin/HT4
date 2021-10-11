<?php
//Создать функцию принимающую массив произвольной вложенности и определяющий любой элемент номер которого передан параметром во всех вложенных массивах.

$firstArray = [
    2,
    3,
    [5, 6, 7],
    4,
    [1,2,54,[3,5,47,33]]
];

getArrayElement($firstArray, 2);


function getArrayElement(array $array, int $elementKey){
    foreach ($array as $value){
        if(is_array($value)){
            if(array_key_exists($elementKey, $value)){
                if(is_array($value[$elementKey])){
                    getArrayElement($value[$elementKey], $elementKey);
                }
                echo '<pre>';
                var_dump($value[$elementKey]);
                echo '</pre>';
            }else{
                echo 'Key not exist';
            }

        }
    }
}



//Создать функцию которая считает все буквы b в переданной строке, в случае если передается не строка функция должна возвращать false
$phrase = 'ababbababahabab';
$phrase2 = 5;
echo '<pre>';
var_dump(getSymbol($phrase,'b'));
var_dump(getSymbol($phrase2,'b'));
echo '</pre>';

function getSymbol ($string, $checkSymbol){
    if (is_string($string)){
        $phraseArr = str_split($string);
        $counter = 0;
        foreach ($phraseArr as $symbol){
            if ($symbol === $checkSymbol){
                $counter ++;
            }
        }
        return $counter;
    }else{
        return false;
    }

}

//Создать функцию которая считает сумму значений всех элементов массива произвольной глубины

$secondArray = [
    'one' => 2,
    3,
    'three'=>[5, 6, 7],
    4,
    'five'=>[1,2,3,54]
];

echo '<pre>';
var_dump(arrayTotalSum($secondArray));
echo '</pre>';


function arrayTotalSum ($array){
    $totalSum = 0;
    foreach($array as $value){
        if (is_array($value)){
            $totalSum += array_sum($value);
        }else{
            $totalSum+=$value;
        }
    }
    return $totalSum;
}


//Создать функцию которая определит сколько квадратов меньшего размера можно вписать в квадрат большего размера размер возвращать в float
$bigSquare = 54;
$smallSquare = 21;

echo "=====================";

echo '<pre>';
var_dump(smallerSquaresQuantity($bigSquare, $smallSquare));
echo '</pre>';


function smallerSquaresQuantity ($big, $small){
    if ($big < $small){
        return 'This can not be';
    } else {
        return $big/$small;
    }
}


