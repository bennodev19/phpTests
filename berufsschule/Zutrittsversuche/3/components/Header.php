<?php
function renderHeader($title)
{
?>
    <header>
        <div>
            <a href="/Zutrittsversuche">Zutrittsversuche</a>
            |
            <a href="/Mitarbeiter">Mitarbeiter</a>
            |
            <a href="/Mietwagen">Mietwagen</a>
        </div>
        <img alt="Logo" height="50" src="../static/Nettmann Logo.png" />
    </header>
    <div class="TitleContainer">
        <h1 class="Title"><?php echo $title ?></h1>
    </div>
<?php
}
?>