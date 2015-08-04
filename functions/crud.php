<?php
   require_once './functions/db_connect.php';  
   
   function select($sql){
       global $conn;
       return $conn->query($sql);
   } 
   
   function insert($sql) {
       global $conn;
       return $conn->exec($sql);
   }
   
   function delete($sql) {
       global $conn;
       return $conn->exec($sql);
   }
   
   function update($sql) {
       global $conn;
       return $conn->exec($sql);
   }
?>
