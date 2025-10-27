<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <h1>Formulário como php</h1>


        nome: <input name="nome" type="text"><br><br>
        email: <input name="email" type="text"><br><br>
        website: <input name="website" type="text"><br><br>
        comentário: <textarea name="comentario" cols="30" rows="3"></textarea><br><br>
        Gênero: <input name="genero" value="Masculino" type="radio"> Masculino
        <input name="genero" value="Feminino" type="radio"> Feminino
        <input name="genero" value="Outro" type="radio">Outro<br><br>
        <button name="enviado" type="submit">Enviar</button><br><br>
        <h1>Dados Enviados: </h1>
        <?php
        if (isset($_POST['enviado'])) {
            if (empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100) {
                echo '<p>Preencha o campo nome corretamente</p>';
                die();
            }


            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo '<p> Prencha o campo email</P>';
                die();
            }

            if (!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
                echo '<p> Prencha o campo website</P>';
                die();
            }
            $genero = "Não tenho ";
            if (isset($_POST['genero'])) {
                $genero = $_POST['genero'];
                if ($genero != "masculino" && $genero != "Feminino" && $genero != "outro") {
                    echo '<p> Prencha o campo genero corretamente</P>';
                    die();
                }
            }
            echo "<p><b>Nome:</b>" . $_POST['nome'] . "</p>";
            echo "<p><b>email:</b>" . $_POST['email'] . "</p>";
            echo "<p><b>website:</b>" . $_POST['website'] . "</p>";
            echo "<p><b>comentario:</b>" . $_POST['comentario'] . "</p>";
            echo "<p><b>Gênero:</b>" . $genero . "</p>";
        }

        ?>
    </form>

</body>

</html>