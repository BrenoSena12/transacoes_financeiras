<?php 

    if(!empty($_GET['id'])){

        include_once('../script/config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM tb_transacoes WHERE id = $id";

        $result = $conexao -> query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($dados = mysqli_fetch_assoc($result))
            {
                $categoria = $dados['categoria'];
                $valor     = $dados['valor'];
                $tipo      = $dados['tipo'];
            }
        }
        else
        {
            header('Location: edit.php');
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

    <style>
        a{
            text-align: center;
            margin-top: 15px;
            color: black;
            text-decoration: none;
        }
        
        a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <main>

        <div class="titulo"> 
            <h1>transações Financeiras</h1>
        </div>

        <form action="salvar-edit.php" method="POST"> <!--Formulario-->

            <div class="categoria">
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" id="categoria" value="<?php echo $categoria ?>" required>
            </div>
            
            <div class="valor">
                <label for="valor">Valor:</label>
                <input type="number" name="valor" id="valor" value="<?php echo $valor ?>" required >
            </div>

            <div class="tipo">

                <label for="tipo">Tipo:</label>

                <select name="tipo" id="tipo">
                <option value="receita"> Receita </option>
                <option value="despesa"> Despesa </option>
            </select>
            </div>

           <!--vai retornar o id de formar invisivel -->
            <input type="hidden" name="id" value="<?php echo $id ?>">


            <div class="botao">
                <input type="submit" name="update" id="update" value="Incluir">
            </div>
        </form>

        <a href="listagem.php">voltar</a>

    </main>
    
</body>
</html>