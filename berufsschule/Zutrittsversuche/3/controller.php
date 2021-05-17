<?php

$sqlConfig = [
    'url' => '127.0.0.1',
    'user' => 'root',
    'password' => '' // Because I have no set Password
];


// Helper Functions
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function redirect($path, $with_script_tags = true)
{
    $js_code = 'document.location=\'' . $path . '\';';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function createMySqlConnection($database, $config = null)
{
    // https://www.php.net/manual/de/language.variables.scope.php
    global $sqlConfig;

    // Get SQL Config
    $finalConfig = $config;
    if (!isset($finalConfig)) {
        $finalConfig = $sqlConfig;
    }

    console_log("SQL Config: ");
    console_log($finalConfig);

    $sqlConnection = mysqli_connect($finalConfig['url'], $finalConfig['user'], $finalConfig['password'], $database);

    // Check if Connection got created successfully
    if (!$sqlConnection) {
        echo ("Datenbank Verbindungsfehler: " . mysqli_connect_error());
        return null;
    }

    // Define Charset
    mysqli_set_charset($sqlConnection, "utf8");

    return $sqlConnection;
}

function closeMySqlConnection($connection)
{
    mysqli_close($connection);
}

function getZutrittsversuche($limit = null)
{
    // Create SQL Connection
    $sqlConnection = createMySqlConnection('rfidv5');

    // Create SQL Query
    $sqlQuery = "
    SELECT z.ZutrittsversuchID Id, 
    z.Zeitstempel as time, 
    c.ChipsID as chipId, 
    b.Nachname as chipOwner, 
    r.Bezeichnung AS door, 
    z.Ergebnis as result
    FROM tblZutrittsversuche as z
    INNER JOIN tblChips as c 
    ON z.tblChips_ChipsID = c.ChipsID
    INNER JOIN tblBenutzer as b
    ON c.tblBenutzer_BenutzerID = b.BenutzerID
    INNER JOIN tblReader as r
    ON r.ReaderID = z.tblReader_ReaderID
    GROUP BY z.ZutrittsversuchID
    " . (isset($limit) ? (" LIMIT " . $limit . ";") : ";");

    // Post Query to SQL Connection
    $result = mysqli_query($sqlConnection, $sqlQuery);

    // Close SQL Connection
    closeMySqlConnection($sqlConnection);

    console_log($result);

    return $result != false ? $result : null;
}
