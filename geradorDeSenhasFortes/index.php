<?php

if (isset($_POST['length'])) {
    $length = intval($_POST['length']);
    $lowercase = isset($_POST['lowercase']);
    $uppercase = isset($_POST['uppercase']);
    $symbols = isset($_POST['symbols']);
    $numbers = isset($_POST['numbers']);

    if (!$lowercase && !$uppercase && !$symbols && !$numbers) {
        echo "Failed to generate password. Choose at least 1 type";
    }

    $lowercase_chars = "abcdefghijkmnopqrstuvwxyz";
    $uppercase_chars = "ABCDEFGHIJKMNOPQRSTUVWXYZ";
    $symbols_chars = "!@#$%&*()_+=";
    $numbers_chars = "0123456789";

    $password = "";
    $valid_options = "";

    if ($lowercase) {
        $valid_options .= $lowercase_chars;
    }

    if ($uppercase) {
        $valid_options .= $uppercase_chars;
    }

    if ($symbols) {
        $valid_options .= $symbols_chars;
    }

    if ($numbers) {
        $valid_options .= $numbers_chars;
    }

    for ($k = 0; $k < $length; $k++) {
        $random_number = rand(0, strlen($valid_options) - 1);
        $password .= $valid_options[$random_number];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>

<body>
    <?php if (isset($password)) { ?>
        <h4>Generated Password</h4>
        <input type="text" readonly value="<?php echo $password; ?>">
    <?php } ?>

    <h4>Generate a Password</h4>
    <form method="POST" action="">
        <p>
            <label for="">Password Length</label>
            <input type="number" min="8" required value="16" name="length">
        </p>
        <p>
            <label for="">Include Lowercase</label>
            <input type="checkbox" value="1" checked name="lowercase">
        </p>
        <p>
            <label for="">Include Uppercase</label>
            <input type="checkbox" value="1" checked name="uppercase">
        </p>
        <p>
            <label for="">Include Symbols</label>
            <input type="checkbox" value="1" checked name="symbols">
        </p>
        <p>
            <label for="">Include Numbers</label>
            <input type="checkbox" value="1" checked name="numbers">
        </p>
        <p>
            <button>Generate!</button>
        </p>
    </form>

</body>

</html>