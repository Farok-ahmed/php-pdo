<?php
//for($i =10; $i>0; $i--){
//    echo $i;
//    echo PHP_EOL;
//}

for ($i = 0; $i<10; $i++){
    echo $i;
    echo PHP_EOL;
}
echo PHP_EOL;
$j = 0;
while($j<10){
    if ($j %2 ==0){
        echo $j;
    }
    echo PHP_EOL;
    $j++;
}
echo PHP_EOL;
echo "Fibonacci";
echo PHP_EOL;
// 0 1 1 2 3 5 8 13 21 ......

$veryOld =0;
$old =1;
$new =1;
for ($i=0; $i<10; $i++){
    echo $veryOld." ";
    $old = $new;
    $new = $old + $veryOld;
    $veryOld = $old;
}

echo PHP_EOL;
$students = ['Rahim','Karim',"Jamal","Salam"];
$students[2]='Balam';

array_pop($students);
array_shift($students);

array_push($students,"Raju");
array_unshift($students,"Kalam");

foreach($students as $student){
    echo $student;
    echo PHP_EOL;
}

$foods = [
    'vegetables'=>'brinjal,brocolli,carrot,capsicam',
    'fruits'=>'orange,banana,apple',
    'drinks'=>'water,milk'
];
$keys = array_keys($foods);
//foreach($keys as $key){
//    echo $key;
//}
print_r($keys);
echo PHP_EOL;
$values = array_values($foods);
//foreach($values as $value){
//    echo $value;
//}
print_r($values);

echo PHP_EOL;
$vagetablesName = 'brinjal,brocolli,carrot,capsicam';
//$vagetablesArray = explode(", ",$vagetablesName);
$vagetablesArray = preg_split("/(, |,)/",$vagetablesName);
var_dump($vagetablesArray);
echo PHP_EOL;
$vagetablesString = join(", ",$vagetablesArray);
var_dump($vagetablesString);
echo PHP_EOL;

$fruies = array('Apple','Banana','Orange','Plum','Milk','Mango');
//$someFruits = array_slice($fruies,2);
$someFruits = array_slice($fruies,2,3);
print_r($someFruits);
//print_r($fruies);
echo PHP_EOL;
$numbers = array(11,2,25,14,10,55,48,79,58,69,48,35,26);
//sort($numbers);
rsort($numbers);
print_r($numbers);
echo PHP_EOL;
if (in_array(25,$numbers)){
    echo "25 is Found!".PHP_EOL;
}
$offset = array_search(25,$numbers);
echo $offset;
echo PHP_EOL;

$num1 =array(11,2,25,14,10,55,48,79,58,69,48,35,26);
$num2 =array(111,20,215,14,10,55,48,79,57,9,8,5,6);

$comm =array_intersect($num1,$num2);
print_r($comm);
echo PHP_EOL;
$commbaine = array_combine($num1,$num2);
print_r($commbaine);

echo PHP_EOL;

$string = "A Quick brown fox jumps over the lazy dog";
echo strpos($string,'fox');