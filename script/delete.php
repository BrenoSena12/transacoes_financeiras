<?php 

    if(!empty($_GET['id'])){

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM tb_transacoes WHERE id = $id";

        $result = $conexao -> query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM tb_transacoes WHERE id = '$id'";
            $resultDelete = $conexao -> query($sqlDelete);

            header('Location:../pages/listagem.php');
        }
        else
        {
            header('Location: edit.php');
        }
        
    }

?>