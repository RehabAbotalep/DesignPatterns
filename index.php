<?php
/** repeat string problem from foodics exam*/
function repeatString(String $s, int $N):String{
    $l = strlen($s);
    $i=0;
    while($i < $N-$l){
        $s.=$s[$i++];
    }
    return $s;
}
$output = repeatString("+--", 5);
echo $output;


