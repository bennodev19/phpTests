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
        <?php
        for ($i = 1; $i <= $numbersCount; $i++) {
        ?>
            <input type="number" name=<?php echo "number" . $i ?> size="25" value="<?php echo (isset($numbers[$i -1])) ? $numbers[$i - 1] : '0'; ?>" />
            <br />
        <?php
        }
        ?>

        <div>
            <button type="submit" name="sentFormData" value="true">Vergleichen/Tauschen</button>
        </div>
    </form>

</body>

</html>