<?php
include('conexao.php');

$sql_clientes = "Select * from clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem dos Clientes</title>
</head>

<body>
    <h1>Lista dos Clientes</h1>
    <p>Estes são so clientes cadastrados no sistema: </p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Nascimento</th>
            <th>Data de cadastro</th>
            <th>Telefone</th>
            <th>Açoes</th>
        </thead>
        <tbody>
            <?php if ($num_clientes == 0) { ?>
                <tr>
                    <td colspan="7">Nenhum Cliente cadastrado</td>
                </tr>
                <?php
            } else {
                while ($clientes = $query_clientes->fetch_assoc()) {

                $telefone = "Não informado";
                if(!empty($clientes['telefone'])){
                    $ddd = substr ($clientes['telefone'],0,2);
                    $parte1 = substr ($clientes['telefone'],2,5);
                    $parte2 = substr ($clientes['telefone'],7);
                    $telefone = "($ddd) $parte1-$parte2";
                }
                $nascimento = "Não informado";
                if(!empty($clientes['nascimento'])){
                    $nascimento = implode('/',array_reverse(explode('-', $clientes['nascimento'])));

                }
                $data_cadastro = date("d/m/y H:i",strtotime($clientes['data']));
                ?>
                    <tr>
                        <td><?php echo $clientes['id'];?></td>
                        <td><?php echo $clientes['nome'];?></td>
                        <td><?php echo $clientes['email'];?></td>
                        <td><?php echo $nascimento;?></td>
                        <td><?php echo $data_cadastro;?></td>
                        <td><?php echo $telefone; ?></td>
                        <td>
                            <a href="editar_clientel.php?id=<?php echo $clientes['id'];?>">Editar</a>
                            <a href="deletar_clientel.php?id=<?php echo $clientes['id'];?>">Deletar</a>
                        </td>
                    </tr>
            <?php
                }
            } ?>
        </tbody>
    </table>

</body>

</html>