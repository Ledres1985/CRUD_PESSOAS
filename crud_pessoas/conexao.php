<?php
 /*try{
  $conn = new PDO('sqlite3:cadastro');
 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Conexão realizada com sucesso.";  
 } catch (PDOException $e){
    echo "Falha de conexão ". $e->getMessage(); 
 }
*/

 $conn = new sqlite3("cadastro.db");
 