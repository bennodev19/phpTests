<?php

function getEmployees($limit = null)
{
    // Create SQL Connection
    $sqlConnection = createMySqlConnection('rfidv5');

    // Create SQL Query
    $sqlQuery = "
    SELECT b.BenutzerId AS id, b.Nachname AS name
    FROM tblBenutzer AS b
    ORDER BY b.BenutzerId ASC
    " . (isset($limit) ? (" LIMIT " . $limit . ";") : ";");

    // Post Query to SQL Connection
    $result = mysqli_query($sqlConnection, $sqlQuery);

    // Close SQL Connection
    closeMySqlConnection($sqlConnection);

    console_log($result);

    return $result != false ? $result : null;
}

function deleteEmployee($id)
{
    // Create SQL Connection
    $sqlConnection = createMySqlConnection('rfidv5');

    // Create SQL Query
    $sqlQuery = "
    DELETE FROM tblBenutzer AS b 
    WHERE b.BenutzerId ='" . $id . "';";

    // Post Query to SQL Connection
    $result = mysqli_query($sqlConnection, $sqlQuery);

    // Close SQL Connection
    closeMySqlConnection($sqlConnection);

    console_log($result);

    return $result > 0; // $result = number of rows that changed
}

function updateEmployeeName($id, $newName)
{
    // Create SQL Connection
    $sqlConnection = createMySqlConnection('rfidv5');

    // Create SQL Query
    $sqlQuery = "
    UPDATE tblBenutzer AS b
    SET b.Nachname ='" . $newName . "'
    WHERE b.BenutzerId ='" . $id . "';";

    // Post Query to SQL Connection
    $result = mysqli_query($sqlConnection, $sqlQuery);

    // Close SQL Connection
    closeMySqlConnection($sqlConnection);

    console_log($result);

    return $result > 0; // $result = number of rows that changed
}

function addEmployee($name)
{
    // Create SQL Connection
    $sqlConnection = createMySqlConnection('rfidv5');

    // Escape String
    $name = mysqli_real_escape_string($sqlConnection, $name);

    // Create SQL Query
    $sqlQuery = "
       INSERT INTO tblBenutzer (Nachname)
       VALUES (" . $name . ");";

    // Post Query to SQL Connection
    $result = mysqli_query($sqlConnection, $sqlQuery);

    // Close SQL Connection
    closeMySqlConnection($sqlConnection);

    console_log($result);

    return $result > 0; // $result = number of rows that changed
}
