<?php

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