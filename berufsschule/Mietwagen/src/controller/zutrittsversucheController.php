<?php

function getZutrittsversuche($limit = null)
{
    // Create SQL Connection
    $sqlConnection = createMySqlConnection('rfidv5');

    // Create SQL Query
    $sqlQuery = "
    SELECT z.ZutrittsversuchID AS id, 
    z.Zeitstempel AS time, 
    c.ChipsID AS chipId, 
    b.Nachname AS chipOwner, 
    r.Bezeichnung AS door, 
    z.Ergebnis AS result
    FROM tblZutrittsversuche AS z
    INNER JOIN tblChips AS c 
    ON z.tblChips_ChipsID = c.ChipsID
    INNER JOIN tblBenutzer AS b
    ON c.tblBenutzer_BenutzerID = b.BenutzerID
    INNER JOIN tblReader AS r
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