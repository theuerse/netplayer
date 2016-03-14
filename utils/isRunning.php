<?php
 exec("pgrep -f startPiLogPlayback.sh",$output);
 echo (sizeof($output) > 1) ? 1 : 0; // sizeof($options) == 1 -> only PID of pgrep given
?>
