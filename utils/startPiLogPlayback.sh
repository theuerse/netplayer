#!/bin/bash

# copies (parts of) logfiles in the targetfolder, in order to "play-back" preexisting logs
# (e.g. from emulation-results)
# the overkill way of stopping all this is "killall sh"
# take care not to cause "collateral damage"

SOURCEDIR=$1
TARGETDIR=$2
PICOUNT=20

# start playback
sh copyAllPisLogs.sh $SOURCEDIR $TARGETDIR $PICOUNT &
sh copyAllPisRtLogs.sh $SOURCEDIR $TARGETDIR $PICOUNT &
wait $(jobs -p)
