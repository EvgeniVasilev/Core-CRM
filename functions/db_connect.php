<?php
  
  try{
     $dsn = "mysql:host=localhost;dbname=orenda.crm";    
     $conn = new PDO($dsn, "root", "");     
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e){
      echo $e->getMessage();
  }
?>
