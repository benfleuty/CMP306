<?php

//  Database connections

 function connect()
 {
     $servername = "lochnagar.abertay.ac.uk";
     $username = "sql1900040";
     $password = "EVUrsMKYpvIn";
     $dbname = $username;

     /* @var mysqli_result $conn */
     return mysqli_connect($servername, $username, $password, $dbname);
 }