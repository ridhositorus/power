<?php
	$time_start = microtime(true);
	$x = 10;
	$y = 900;

    $GLOBALS['power1_call'] = 0;
    $GLOBALS['power2_call'] = 0;
    echo "Start Power 2 : ".$time_start;
    // internet recursive function
	function power($a, $b){
		$GLOBALS['power1_call']++;
		if($b == 0){
			return 1;
		}elseif($b == 1){
			return $a;
		}
		$m = power($a, (int)($b / 2));
		if ($b % 2 == 0) {
	        return $m * $m;
	    } else return $a * power($a, $b - 1);
	} 
	$value = power($x,$y);
	$time_end = microtime(true);
	echo "<br>End Power 2 : ".$time_end;
    $time1 = $time_end - $time_start;
    echo "<br>Time : ".$time1." ---- ".($_SERVER["REQUEST_TIME_FLOAT"]);
    echo "<br>Result : ".$value;
    echo "<br>Process Time 1 : {$time1}. Called ".$GLOBALS['power1_call']." times. <hr>";

    // more effective recursive function
    $time_start = microtime(true);
    echo "Start Power 2 : ".$time_start;
    
	function power2($a, $b){
		$GLOBALS['power2_call']++;
		if($b == 0){
			return 1;
		}elseif($b == 1){
			return $a;
		}elseif($b >= 2){
			$m = power2($a, (int)($b / 2));
			if ($b % 2 == 0) {
		        return $m * $m;
		    } else {
		    	return $m * $m * $a;
		    }
		}
	}

	$value = power2($x,$y);
	$time_end = microtime(true);
	echo "<br>End Power 2 : ".$time_end;
    $time2 = $time_end - $time_start;
    echo "<br>Time : ".$time2." ---- ".($_SERVER["REQUEST_TIME_FLOAT"]);
    echo "<br>Result : ".$value;

    echo "<br>Process Time 2 : {$time2}. Called ".$GLOBALS['power2_call']." times. <hr>";
    echo $time2 > $time1 ? "Power 1 is faster" : "Power 2 is faster";
?>