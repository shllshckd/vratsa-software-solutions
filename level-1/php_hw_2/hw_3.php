<?php 

//  Примерно ЕГН: 6101057509   
/*
+------------+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+
| Позиция    |  1  |  2  |  3  |  4  |  5  |  6  |  7  |  8  |  9  |  10 |
+------------+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+
| Тегло      |  x2 |  x4 |  x8 |  x5 | x10 |  x9 |  x7 |  x3 |  x6 |     |
+------------+-----+-----+-----+-----+-----+-----+-----+-----+-----+-----+

Десетата цифра е контролна и се изчислява по следния алгоритъм:

Всяка от първите девет цифри се умножава по съответното ѝ тегло и резултатите се сумират;
Получената сума се дели на 11 с остатък;
Ако остатъкът от делението е по-малък от 10, тогава той се взема като контролна цифра, иначе за контролна се взема цифрата 0.

(Теглата са съответната степен на двойката по модул 11.) 
*/

$one = 6;
$two = 1;
$three = 0;
$four = 1;
$five = 0;
$six = 5;
$seven = 7;
$eight = 5;
$nine = 0;

$weight_one = 2;
$weight_two = 4;
$weight_three = 8;
$weight_four = 5;
$weight_five = 10;
$weight_six = 9;
$weight_seven = 7;
$weight_eight = 3;
$weight_nine = 6;

$ten = (($one * $weight_one)
    + ($two * $weight_two)
    + ($three * $weight_three)
    + ($four * $weight_four)
    + ($five * $weight_five)
    + ($six * $weight_six)
    + ($seven * $weight_seven)
    + ($eight * $weight_eight)
    + ($nine * $weight_nine)) % 11;

if (!($ten < 10)) {
    $ten = 0;
}

echo $one . $two . $three . $four . $five . $six . $seven . $eight . $nine . $ten;
