<?php

    $servername = "localhost";
    $dbname = "cryptoDB";
    $username = "root";
    $password = "root";
    $crypto = 'Bitcoin';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception
        echo "Connected successfully!<br>";
/*
        $sql = "DROP DATABASE Test";
        $conn->exec($sql);
        echo "Database dropped successfully!<br>";  

        $sql = "CREATE DATABASE cryptoDB";
        $conn->exec($sql);
        echo "Database created successfully!<br>";   

        $sql = "CREATE TABLE Portfolio (
            id int(6),
            crypto_name VARCHAR(20),
            crypto_symbol VARCHAR(6),
            crypto_shares FLOAT(10),
            crypto_pru FLOAT(10),
            crypto_price FLOAT(10),
            crypto_value FLOAT(10),
            crypto_performance FLOAT(10),
            crypto_change24h FLOAT(10)
            )";

        $conn->exec($sql);
        echo "Table created successfully!<br>";         */

        $sql = "INSERT INTO Portfolio (id, crypto_name, crypto_symbol)
        VALUES
            ('1','" . $crypto . "','BTC'), 
            ('2','Litecoin','LTC');";

        $conn->exec($sql);
        echo "It worked!<br>";   

    }

    catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    } 

    $conn = null;     // Closes the connection

?>