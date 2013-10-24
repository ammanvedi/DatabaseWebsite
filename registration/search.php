<html>
<head>
<Title>Registration Form</Title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<h1>Results</h1>


<?php
   
    try {

       $con = mysql_connect("eu-cdbr-azure-west-b.cloudapp.net", "bd7654de37b884", "47056796") or die("Error connecting to database: ".mysql_error());
        mysql_select_db("UsersDatabase") or die(mysql_error());
    }
    catch(Exception $e){
        die(var_dump($e));
    }



    // Insert registration info
    $query = $_GET['query'];
   // $raw_results = mysql_query("SELECT * FROM registration_tbl WHERE name={$query}");

     $raw_results = mysql_query("SELECT * FROM registration_tbl
            WHERE (`name` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%')") or die(mysql_error());

    //debug 
    //$raw_results = mysql_query("SELECT * FROM registration_tbl");


    // Retrieve data
   if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['name']."</h3>".$results['email']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
            if($query = NULL){
                echo "NULL";
            }
            print $query;
        }
         
    
?>
</body>
</html>