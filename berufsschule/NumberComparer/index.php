<!DOCTYPE html>
<html lang="en">

<?php
// Import logic
require "logic.inc.php";
?>

<head>
    <meta charset="UTF-8">
    <title>Number Comparer</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>

    <h1>Zahlen vergleichen und tauschen</h1>

    <form method="post" action="">
        <input type="number" name="number1" size="25" value="<?php echo (isset($numbers[0])) ? $numbers[0] : ''; ?>" />
        <br />
        <input type="number" name="number2" size="25" value="<?php echo (isset($numbers[1])) ? $numbers[1] : ''; ?>" />

        <div>
            <button type="submit" name="sentFormData" value="true">Vergleichen/Tauschen</button>
        </div>
    </form>

</body>

</html>