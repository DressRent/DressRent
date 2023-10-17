<?php
   $host        = "localhost";
   $port        = "5432";
   $dbname      = "DressRent";
   $user        = "postgres";
   $password    = "Estillo1216.";

   $db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Connection established\n";
   }
?>
