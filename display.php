<?php
    
    setlocale(LC_MONETARY,"en_US");

    echo "<table class='table table-bordered table-hover'>
            <thead class='thead-dark'>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Symbol</th>
                <th>Shares</th>
                <th>PRU ($)</th>
                <th>Price ($)</th>
                <th>Value ($)</th>
                <th>Performance (%)</th>
                <th>Change 24h (%)</th>
            </tr></thead>";

    for ($i=0 ; $i<$count ; $i++){

        echo "<tr><td>";
        echo $table[0][$i];               // #

        echo "</td><td class='name'>";
        echo $table[1][$i];               // Name

        echo "</td><td>";
        echo $table[2][$i];               // Symbol

        echo "</td><td>";
        echo round($table[3][$i], 4);       // Shares

        echo "</td><td>";
        if ($table[4][$i] == null) {                // PRU
            echo "-";
        } else {
            echo "$" . money_format("%!.2i", $table[4][$i]);               // PRU
        }

        echo "</td><td>";
        echo "$" . money_format("%!.4i", $table[5][$i]);     // Price

        echo "</td><td class='value'>";
        echo "$" . money_format("%!.2i", $table[6][$i]);               // Value
        
        echo "</td><td>";
        if ($table[7][$i] == null) {            // Performance
            echo "∞";                       
        } else {
            echo round($table[7][$i]*100, 1) . "%";               // Performance
        }

        echo "</td><td>";
        echo round($table[8][$i], 1) . "%";     // Change 24h

        echo "</td></tr>";
    }

    echo "<tr class='bg-primary text-white'><td></td><td class='name'>TOTAL</td><td></td><td></td><td></td><td></td><td class='value'>";
    echo "$" . money_format("%!.2i", $table[6][$count]);             // Total Valuation
    echo "</td><td>";
    echo round($table[7][$count]*100, 1) . "%";             // Total Performance
    echo "</td><td></td></tr></table>"

?>