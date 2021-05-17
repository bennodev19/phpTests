<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
console_log(getZutrittsversuche());
?>

<head>
    <meta charset="UTF-8">
    <title>Zutrittsversuche</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Zutrittsversuche');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
        <p>Nothing to show?</p>
    </div>

    <!-- Footer -->
    <?php
    renderFooter();
    ?>

</body>

</html>