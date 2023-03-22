<?php
include("conectadb.php");
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $nome = $_POST['nome'];
    $descriçao = $_POST['descriçao'];
    $estoque = $_POST['estoque'];
    $custo = $_POST['custo'];
    $preco = $_POST['preco'];
    $ativo = $_POST['ativo'];
}
#cria uma condiçao para o banco de dados 
$bancodedados = "SELECT COUNT (pro_id) FROM produtos WHERE pro_nome = '$nome";
#resultado esta chamando tanto o conectadb quanto o banco de dados
$resultado = mysqli_query($link,$bancodedados);
$resultado_db = mysqli_query($link,$bancodedados);

while($tbl = mysqli_fetch_array($resultado)){
    $contagem = $tbl[0];
    if($contagem == 0){
    $bancodedados_db = "INSERT INTO produtos(pro_id,pro_nome,pro_descriçao,pro_preco,pro_custo,pro_ativo,pro_estoque) VALUES('$nome','$descriçao','$preco','$custo','$ativo','$estoque')";
    mysqli_query($link, $bancodedados);
    
}  
else{
    echo("PRODUTO JA EXISTENTE");
    header("location produto.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAR PRODUTOS</title>
    <link rel="stylesheet" href="newestilo.css">
</head>
<body>
    <form action="produto.php" method="post">
        <label>NOME</label>
        <input type="text" name="nome">
        <br>
        <label>DESCRIÇAO</label>
        <input type="text" name="descriçao">
        <br>
        <label>PREÇO</label>
        <input type="text" name="preco">
        <br>
        <label>custo</label>
        <input type="text" name="custo">
        <br>
        <label>ESTOQUE</label>
        <input type="text" name="estoque">
        <br>
    </form>
</body>
</html>
