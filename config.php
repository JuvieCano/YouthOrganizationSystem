<?php
   $server='localhost';
   $username='root';
   $password='';
   $dbname = 'yosDb';

   $conn = mysqli_connect($server,$username,$password,$dbname);

   if(!$conn){
       echo '<script>alert("Unable to connect to database.");</script>';
   }
?>