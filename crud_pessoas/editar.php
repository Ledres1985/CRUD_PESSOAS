<?php
  include('conexao.php');

  $id= intval($_GET['id']);
  $nome = "";
  $email = "";
  $erro = false;


  if(isset($_POST['enviar'])){
    
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    
  //if(empty($id))
  //  echo "Todos os campos devem ser preenchidos";
    if(empty($nome))
      $erro = "Todos os campos devem ser preenchidos";
    if(empty($email))
      $erro = "Todo os campos devem ser preenchidos";
    
    if($erro){
        echo $erro;
    }else{
       $sql_code = "UPDATE teste2 SET nome='$nome', email='$email' WHERE id = '$id'";
       $sql_query = $conn->query($sql_code);
       //$sql_query->execute();
       $deu_certo = $sql_query;
    
       if($deu_certo){
        echo "Dados alterados com sucesso!!";
        die("<a href='index.php'>Voltar para a página inicial</a>");
       }       
      }
    
    }
  
  $sql_cadastro = "SELECT * FROM teste2 WHERE id = '$id' LIMIT 1";
  $query_cadastro = $conn->query($sql_cadastro) or die("Dados não encontrados");
  $cadastro = $query_cadastro->fetchArray(SQLITE3_BOTH);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Formuláruo de Edição</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <h1>Formulário de Edição</h1>
  <a href="index.php">Voltar</a>
  <form method="post" action="">
    <p>
      id:
      <input type="text" name="id" value="<?php echo $cadastro['id']; ?>">
    </p>
    <p>
      nome:
      <input type="text" name="nome" value="<?php echo $cadastro['nome']; ?>">
    </p>
    <p>
      email:
      <input type="text" name="email" value="<?php echo $cadastro['email']; ?>">
    </p>
    <p>
      <input type="submit" name='enviar'>
    </p>
  </form>
  </body>
</html>
