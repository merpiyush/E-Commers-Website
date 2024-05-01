<?php 
    include('new_conn.php'); 
    ?>
<?php

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the about_us table
    $select = "SELECT * FROM product_page";
    $result = $conn->query($select);

    // Check if the query was successful and if there is data to display
    if ($result && $result->num_rows > 0) {
        // Fetch the data and display it
        $row = $result->fetch_assoc();
        //Title text 
        $pro1 = $row['pro1'];
        $pron1 = $row['pron1'];
        $prop1 = $row['prop1'];
        $pro2 = $row['pro2'];
        $pron2 = $row['pron2'];
        $prop2 = $row['prop2'];
        $pro3 = $row['pro3'];
        $pron3 = $row['pron3'];
        $prop3 = $row['prop3'];
        $pro4 = $row['pro4'];
        $pron4 = $row['pron4'];
        $prop4 = $row['prop4'];
        $pro5 = $row['pro5'];
        $pron5 = $row['pron5'];
        $prop5 = $row['prop5'];
        $pro6 = $row['pro6'];
        $pron6 = $row['pron6'];
        $prop6 = $row['prop6'];
        $pro7 = $row['pro7'];
        $pron7 = $row['pron7'];
        $prop7 = $row['prop7'];
        $pro8 = $row['pro8'];
        $pron8 = $row['pron8'];
        $prop8 = $row['prop8'];
        $pro9 = $row['pro9'];
        $pron9 = $row['pron9'];
        $prop9 = $row['prop9'];
        $pro10 = $row['pro10'];
        $pron10 = $row['pron10'];
        $prop10 = $row['prop10'];
        $pro11 = $row['pro11'];
        $pron11 = $row['pron11'];
        $prop11 = $row['prop11'];
        $pro12 = $row['pro12'];
        $pron12 = $row['pron12'];
        $prop12 = $row['prop12'];

    } else {
        // $aboutText = "No data available";
        //  $heading_1;
        //  $p_1;
    }

    // Close the database connection
    $conn->close();
    
?>