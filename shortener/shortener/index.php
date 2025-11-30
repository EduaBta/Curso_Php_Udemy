<?php
include('conexao.php');

$url = false;
if (isset($_POST['url'])) {

    $hash = uniqid();
    $url = $mysqli->real_escape_string($_POST['url']);
    $views = 0;
    $url_prefix = 'http://localhost:8888/shortener/r.php?h=';

    $mysqli->query("INSERT INTO urls (id, url, views) VALUES('$hash', '$url', '$views')") or die($mysqli->error);
    $url = $url_prefix . $hash;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortner</title>
</head>

<body>
    <form method="POST">
        <input type="url" name="url" placeholder="Type your URL here">
        <button>Shorten!</button>
    </form>
    <?php if ($url !== false) { ?>
        <p>
            URL Encurtada:<br>
            <input type="text" readonly value="<?php echo $url; ?>">
        </p>
    <?php } ?>
</body>

</html>