<?php 

    if(isset($_POST['submit'])){

        include_once('../script/config.php');

        $categoria = $_POST['categoria'];
        $valor     = $_POST['valor'];
        $tipo      = $_POST['tipo'];

        if($tipo == 'receita')
        {
            $result = mysqli_query($conexao, "INSERT INTO tb_transacoes(categoria, valor, tipo) VALUES ('$categoria', '$valor', '$tipo')");
        }
        else{
            $valor = $valor - $valor - $valor;
            $result = mysqli_query($conexao, "INSERT INTO tb_transacoes(categoria, valor, tipo) VALUES ('$categoria', '$valor', '$tipo')");
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transações</title>
    <link rel="stylesheet" href="../css/tela_inicial.css">
</head>
<body>

    <main>

        <div class="titulo"> <!--Titulo-->
            <h1>transações Financeiras</h1>
        </div>

        <form action="tela-inicial.php" method="POST"> <!--Formulario-->

            <div class="categoria">
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" id="categoria" required placeholder="Ex: conta água">
            </div>
            
            <div class="valor">
                <label for="valor">Valor:</label>
                <input type="number" name="valor" id="valor" required placeholder="R$00">
            </div>

            <div class="tipo">

                <label for="tipo">Tipo:</label>

                <select name="tipo" id="tipo">
                <option value="receita">Receita</option>
                <option value="Despesa">Despesa</option>
            </select>
            </div>

            <div class="botao">
                <input type="submit" name="submit" id="submit" value="Incluir">
            </div>
           
        </form>

        <div class="voltar">
            <a href="../index.php">Voltar</a>
        </div>
        

    </main>
    
</body>
</html>