<?php

include('conexao.php');
$id = intval($_GET['id']);
function limpar_texto($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}

if (count($_POST) > 0) {
    
    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];

    if (empty($nome)) {
        $erro = "Preencha o nome";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o E-mail";
    }

    if (!empty($nascimento)) {
        $pedacos = explode('/', $nascimento);
        if (count($pedacos) == 3) {
            $nascimento = implode('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }
    if (!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if (strlen($telefone) != 11) {
            $erro = "O telefone tem q ser preenchido no padrão (11) 00000-0000";
        }
    }

    if ($erro) {
        echo "<p><b>Erro: $erro</b></p>";
    } else {
        $sql_code = "update clientes 
        set nome = '$nome',
        email = '$email',
        nascimento = '$nascimento',
        telefone = '$telefone'
        where id = '$id';
        ";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if ($deu_certo) {
            echo "<p><b>Cliente atualizado com sucesso</b></p>";
            unset($_POST);
        }
    }
}


$sql_clientes = "select * from clientes where id = '$id'";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$clientes = $query_clientes->fetch_assoc(); 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>

<body>
    <a href="/clientes.php">Voltar para a lista</a>
    <form method="post" action="">
        <p>
            <label>Nome</label>
            <input value="<?php echo $clientes['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>E-mail</label>
            <input value="<?php echo $clientes['email']; ?>" name="email" type="text">
        </p>
        <p>
            <label>Telefone</label>
            <input value="<?php if(!empty($clientes['telefone'])) echo formatar_telefone( $clientes['telefone']); ?>" placeholder="(11) 99999 - 9999" name="telefone" type="text">
        </p>
        <p>
            <label>Data de Nascimento</label>
            <input value="<?php if(!empty($clientes['nascimento']))  echo formatar_data( $clientes['nascimento']); ?>" name="nascimento" type="text">
        </p>
        <p>
            <button type="submit">Salvar Cliente</button>
        </p>

    </form>
</body>

</html>