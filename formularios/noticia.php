<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Formulário usando o método get através da URL e em seguida mandando para o exibir.php -->
    <form method="GET" action="exibir.php">
        Nome: <input type="text" name="nome"><br><br>
        Idade: <input type="number" name="idade"><br><br>
        Email: <input type="text" name="Email"><br><br>
        <button type="submit">Enviar</button>
    </form>

    <!--Formulário usando o método post, não passa pel  url então é mais seguro -->
    <form method="Post" action="exibir.php">
        Nome: <input type="text" name="nomea"><br><br>
        Idade: <input type="number" name="idadea"><br><br>
        Email: <input type="text" name="Emaila"><br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>