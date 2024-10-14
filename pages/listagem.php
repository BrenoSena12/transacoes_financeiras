<?php 

    include_once('../script/config.php');



    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        echo $data;
        $sql ="SELECT * FROM tb_transacoes WHERE categoria LIKE '%$data%' or tipo LIKE '%$data%' or valor LIKE '%$data%' ORDER BY id ASC";


    }
    else{
        $sql ="SELECT * FROM tb_transacoes ORDER BY id ASC";
    }




    $result = $conexao -> query($sql);
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/listage.css">
    <title>transacoes</title>


</head>
<body>

    <main>
        
        <h1>Lista de Transações</h1> 


        <div class="box-search">
            <input type="search" class="form-control w-25" id="pesquisar" placeholder="pesquisa...">

            <button onclick="searchData()" class="btn btn-sm btn-primary ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            </button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">categoria</th>
                    <th scope="col">tipo</th>
                    <th scope="col">valor</th>
                    <th scope="col">editar/excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                
                    while($dados = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>". $dados['id']."</td>";
                        echo "<td>". $dados['categoria']."</td>";
                        echo "<td>". $dados['tipo']."</td>";
                        echo "<td>". $dados['valor']."</td>";
                        echo "<td>
                        
                            <a class='btn btn-primary'  href='edit.php?id=$dados[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                </svg>
                            </a>

                            <a class='btn btn-danger'  href='../script/delete.php?id=$dados[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                </svg>
                            </a>


                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <div class="voltar">
            <a href="../index.php">Voltar</a>
        </div>
        
    </main>

    <script>
        var search = document.getElementById('pesquisar');
        
        search.addEventListener("keydown", function(event)
        {
            if(event.key === "Enter")
            {
                searchData();
            }
        });
        
        function searchData()
        {
            window.location = 'listagem.php?search='+search.value;
        }
    </script>
        
</body>
</html>