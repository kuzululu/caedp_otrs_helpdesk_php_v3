<?php

include("../inc/config.php");
include("../class/class.php");
include("../inc/connection.php");

$incident_count = new IncidentRecords($conn);

echo $incident_count->recordsCount();

?>