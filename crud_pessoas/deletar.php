<?php

 if(isset($_POST['confirmar'])){
    
  include('conexao.php'); 
  
  $id = intval($_GET['id']);
  $sql="DELETE FROM teste2 WHERE id = '$id'";

  $show=$conn->query($sql) or die("Falha ao deletar");
  
  if($show)
      echo "Dados deletados com sucesso!";
      echo '<p><a href="index.php">Voltar para a página incial</a>';
      die();
 }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Deletar cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <form action="" method="post">
      <h1>Deletar cadastro</h1>
 
      <p>Tem certeza que deseja deletar este cafastro?</p>

      <p><a href="index.php">Voltar para a página incial</a></p><br>
      <input type="submit" name="confirmar" value="confirmar">
    
    </form>
    
   </body> 
</html>
