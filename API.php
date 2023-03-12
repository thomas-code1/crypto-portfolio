<?php
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
//        $url = 'https://sandbox-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';

        $parameters = [
            'id' => '1,2,2083,1027,1321,52,1437,131,1831,3602,328,1765,1720,1684,1808,463,1807,693,1958,1042,2010,512'
        ];

        $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: XXX'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
//        echo '<pre>';
//        print_r(json_decode($response, true)); // print json decoded response
//        echo '</pre>';
        curl_close($curl); // Close request

        $result = json_decode($response, true);
?>