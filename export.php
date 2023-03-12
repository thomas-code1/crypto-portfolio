<?php
    $myfile = fopen("quotes_" . date("Y-m-d_H-i") . ".txt", "w");

    for ($i=0 ; $i<sizeof($id_ref) ; $i++){
        fwrite($myfile, $table[1][$i] . ", " . $table[3][$i] . ";\n");          // Symbol and Price
    }

    fwrite($myfile, "Total Valuation, " . $sum . ";");
?>