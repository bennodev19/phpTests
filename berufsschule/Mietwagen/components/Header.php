<?php
function renderHeader($title)
{
    if (!isset($title))
        $title = "Not set!";

    // Logout
    // https://stackoverflow.com/questions/19323010/execute-php-function-with-onclick
    if (isset($_GET['logout'])) {
        logout();
        $_GET['logout'] = null; // Reset logout in order to not endles refresh the site
        refresh(); // Refresh site in order to call the php script in the site again
    }
?>
    <header>
        <div>
            <a href="./Zutrittsversuche.php">Zutrittsversuche</a>
            |
            <a href="./Mitarbeiter.php">Mitarbeiter</a>
            |
            <a href="./Mietwagen.php">Mietwagen</a>
            |
            <a href='<?php echo getCurrentUrl() ?>?logout=true'>Logout</a>
        </div>
        <img alt="Logo" height="50" src="../static/Nettmann Logo.png" />
    </header>
    <div class="TitleContainer">
        <h1 class="Title"><?php echo $title ?></h1>
    </div>
<?php
}
?>