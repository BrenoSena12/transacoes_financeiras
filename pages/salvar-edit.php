<?php 

    include_once('../script/config.php');

    if(isset($_POST['update']))
    {
        $categoria = $_POST['categoria'];
        $valor     = $_POST['valor'];
        $tipo      = $_POST['tipo'];
        $id        = $_POST['id'];

        if($tipo == 'receita')
        {
            $sqlUpdate = "UPDATE tb_transacoes SET categoria='$categoria', valor='$valor', tipo='$tipo'
                          WHERE id = '$id'";
        }
        else{

            $valor = $valor - $valor - $valor;

            $sqlUpdate = "UPDATE tb_transacoes SET categoria='$categoria', valor='$valor', tipo='$tipo'
                          WHERE id = '$id'";
        }

        $result = $conexao->query($sqlUpdate);
    }

    header('Location: listagem.php');
?>