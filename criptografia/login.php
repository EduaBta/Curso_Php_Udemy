<?php
if(isset($_POST['email'])) {

    include('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])) {
        echo "Usuario logado!";
    } else {
        echo "Falha ao logar! Senha ou e-mail incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="email"><br>
        <input type="password" name="senha"><br>
        <button type="submit">LOGAR</button>
    </form>
</body>
</html>
