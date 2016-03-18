<?php
define("RECORDINGDIR","../recordings/");
//echo $_POST["aLogic"];
//echo $_POST["fwStrategy"];

$TARGETDIR = realpath("../network") . "/";

// Determine source-directory as combination of chosen aLogic and fwStrategy
$SOURCEDIR = realpath(RECORDINGDIR . $_POST['aLogic'] . "_" . $_POST['fwStrategy']) . "/";
echo $SOURCEDIR;
if(!is_dir($SOURCEDIR)) {exit($SOURCEDIR . " : no such directory");}


//
// Start the playback
//
$command = "/bin/bash startPiLogPlayback.sh $SOURCEDIR $TARGETDIR";
exec($command . " > /dev/null 2>&1 &"); // run in background (avoid stalling php-script)

// Store settings in file for later use by visualizations
$jsonData = array('aLogic'=> $_POST["aLogic"], 'fwStrategy' => $_POST["fwStrategy"]);
file_put_contents($TARGETDIR . "settings.json", json_encode($jsonData));

?>
