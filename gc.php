<?php 

$one = memory_get_usage() ;
echo 'before: '. $one .'</br>';

$Test = array (0=>'foo', 1=>'bar'). '</br>' ;
$two = memory_get_usage() ;
$math = $two-$one ;
echo 'after array set: '. $two .' ( <b>'. $math .' </b>)</br>';

$Test = NULL;
$three = memory_get_usage() ;
$math = $three-$one ;
echo 'after array null: '. $three .' ( <b>'. $math .' </b>)</br>';

unset($test) ;
$four = memory_get_usage() ;
$math = $four-$one ;
echo 'after array unset: '. $four .' ( <b>'. $math .' </b>)</br>';
 ?>