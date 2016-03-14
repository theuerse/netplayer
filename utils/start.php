<?php
define("RECORDINGDIR","../recordings/");
//echo $_POST["aLogic"];
//echo $_POST["fwStrategy"];

$TARGETDIR = realpath("../network") . "/";

// Determine source-directory, for now, aLogic only
$SOURCEDIR = realpath(RECORDINGDIR . $_POST["aLogic"]) . "/";
if(!is_dir($SOURCEDIR)) {exit($SOURCEDIR . " : no such directory");}


//
// (Re-)start playback
//
// Stop the playback
exec("/bin/bash stop.sh");

//
// Start the playback
//
$command = "/bin/bash startPiLogPlayback.sh $SOURCEDIR $TARGETDIR";
exec($command . " > /dev/null 2>&1 &"); // run in background (avoid stalling php-script)

?>
