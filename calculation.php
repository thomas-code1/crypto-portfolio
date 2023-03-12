<?php
    $id_ref = array("1","2","2083","1027","1321","52","1437","131","1831","3602","328","1765","1720","1684","1808","463","1807","693","1958","1042","2010","512");
    $share_ref = array("0.49465543","71.51308049","0.65488385","8.01355034","154.17198","7515.162672","6.99476","4.51585","3.77224","3.77144","15.4800772","906.14395","1397.6","109.84","117.7841221","7367.17299","3510.394963","5480.083955","4491.00","17595.84501","1394.387364","1580.8");
    $PRU_ref = array("3902.52","42.01","0","292.44","13.77","0.2339","228.51","265.92","465.21","0","85.48","1.277","1.056","14.4","7.87","0.1454","0.389","0.1687","0.114","0.0462","0.6646","0.5587");

    $count = sizeof($id_ref);
    $deposit = 28454.53;

    $table = array(
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array(),
        array()
    );

    $sum = 0;

    for ($i=0 ; $i<$count ; $i++){
        $table[0][$i] = $i+1;               // #
        
        $table[1][$i] = $result['data'][$id_ref[$i]]['name'];     // Name

        $table[2][$i] = $result['data'][$id_ref[$i]]['symbol'];     // Symbol

        $table[3][$i] = $share_ref[$i];                   // Shares

        if($PRU_ref[$i] == 0) {                 
            $table[4][$i] = null;               // PRU
        } else {
            $table[4][$i] = $PRU_ref[$i];               // PRU
        }
        $table[5][$i] = $result['data'][$id_ref[$i]]['quote']['USD']['price'];      // Price

        $table[6][$i] = $table[3][$i]*$table[5][$i];        // Value

        if ($table[4][$i] == null) {
            $table[7][$i] = null;      // Performance
        } else {
            $table[7][$i] = ($table[5][$i]-$table[4][$i])/$table[4][$i];      // Performance
        }

        $table[8][$i] = $result['data'][$id_ref[$i]]['quote']['USD']['percent_change_24h'];         // Change 24h

        $sum = $sum + $table[6][$i];
    }

    $table[6][$count] = $sum;           // Total Value
    $table[7][$count] = ($table[6][$count]-$deposit)/$deposit;               // Total Performance

?>