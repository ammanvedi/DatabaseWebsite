<html>
<head>
<Title>Registration Form</Title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<h1>Results</h1>


<?php

//connect to the sql database 
//this method is done without PDO
   
    try {

       $con = mysql_connect("eu-cdbr-azure-west-b.cloudapp.net", "bd7654de37b884", "47056796") or die("Error connecting to database: ".mysql_error());
        mysql_select_db("UsersDatabase") or die(mysql_error());
    }
    catch(Exception $e){
        die(var_dump($e));
    }

    



    // get the query passed from the form in index.php
    $query = $_GET['query'];
    //execute query using php
    $raw_results = mysql_query("SELECT * FROM registration_tbl
            WHERE (`name` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%')") or die(mysql_error());


   if(mysql_num_rows($raw_results) > 0){ 
             
            while($results = mysql_fetch_array($raw_results)){
             
                echo "<p>".$results['name']."<br/>".$results['email']."<br/>"
                .$results['date']."<br/>".$results['company']."</p>";
            }
             
        }
        else{ // condition for no results returned
            echo "No results, nothing to show";
        }
         
    
?>
</body>
</html>