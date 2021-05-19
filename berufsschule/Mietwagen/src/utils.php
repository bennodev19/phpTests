<?php

$sqlConfig = [
    'url' => '127.0.0.1',
    'user' => 'root',
    'password' => '' // Because I have no set Password
];

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

function startSession()
{
    // Start Session if no session is active yet
    // https://www.php.net/manual/de/function.session-status.php
    if (session_status() != 2) {
        session_start();
    }
}

function refresh()
{
    // https://stackoverflow.com/questions/12383371/refresh-a-page-using-php
    header("Refresh:0");
}

function getCurrentUrl()
{
    // https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
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