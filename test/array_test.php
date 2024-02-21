<?php

echo "Hello world\n";


$array = [
    0 => [
        'Q1',
        'S1',
    ],
    1 => [
        0 => 'CO1',
        1 => 'CO2',
        2 => 'CO3',
        3 => 'Total',
        4 => 'CO1',
        5 => 'CO2',
        6 => 'CO3',
        7 => 'Total',
    ],
    2 => [
        0 => 2,
        1 => 0,
        2 => 1,
        3 => 5,
        4 => 4,
        5 => 3,
        6 => 4,
        7 => 11,
    ]
];

$header = [
    'Q1' => 0,
    'S1' => 4,
];


for($x = 0; $x < count($array[0]); $x++){
    echo $array[0][$x] . "\n";
    for($i=1; $i<count($array); $i++){

        $start = $header[$array[0][$x]];

        if($x == count($array[0])-1){
            $end = count($array[1]);
        }else{
            $end = $header[$array[0][$x+1]];
        }

        for($j=$start; $j<$end; $j++){
            echo $array[$i][$j] . " ";
        }
        echo "\n";
    }
}
