<?php
 include('conexao.php');
 $id = $nome = $email = "";

 if(isset($_POST['enviar'])){
    
  $id = $_POST['id'];  
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $erro = false;

  if(empty($id) || !intval($id))
    $erro = "<b>Preencha todos os campos</b><br>";
    
  if(empty($nome) || strlen($nome) < 3)
    $erro = "<b>Preencha todos os campos</b><br>";
    
  if(empty($email))
    $erro = "<b>Preencha todos os campos</b><br>";
    
  if($erro){
    //for($i=0;$i<count($erro); $i++){echo $erro[$i];}
     echo $erro;
      }else{
        $sql="INSERT INTO teste2(id,nome,email)
        VALUES('$id','$nome','$email')";
        $show=$conn->query($sql);
        if($show){
          echo "Dados inseridos com sucesso!";
        }else{
          echo "Falha: ".$conn->lastErrorMsg();
            }
   }
 }
?>
<!DOCTYPE html>
<html>
<!-- Este é um teste para commit -->
<!-- Alterei --> 
  <head>
    <title>Formuláruo de cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <h1>Cadastro de pessoas</h1>
  <form method="post" action="index.php">
    <p>
      id:
      <input type="text" name="id">
    </p>
    <p>
      nome:
      <input type="text" name="nome">
    </p>
    <p>
     email:
     <input type="text" name="email">
    </p>
    <p>
      <input type="submit" name="enviar">
    </p>
  </form>
  <h2>Lista de pessoas</h2>
  <table border="1" width="60%">
    <thead>
      <th>id</th>
      <th>nome</th>
      <th>email</th>
      <th>ação</th>
    </thead>
     <?php
       $query ="SELECT * FROM teste2 ORDER BY id";
       $linhas = $conn->query($query);
       while($lin = $linhas->fetchArray(SQLITE3_ASSOC)){
     ?>
      <tbody>
          
              <td><?php echo $lin['id']; ?></td>
              <td><?php echo $lin['nome']; ?></td>
              <td><?php echo $lin['email']; ?></td>
              <td>
                <a href="editar.php?id=<?php echo $lin['id'];?>">editar</a>
                <a href="deletar.php?id=<?php echo $lin['id'];?>">deletar</a>
              </td>
        
      </tbody>
    <?php    
         }
    ?>
 </table>
 
</html>
