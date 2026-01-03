#!/bin/bash

# recursively creates index.php relative symlinks in all subdirectories
# excluding the top level directory which has its own special index.php
ANCESTRY_PERSON1_ROOT="../Brett Tolbert/"
TARGET=$(realpath index.php)
LINK_NAME="index.php"

find "$ANCESTRY_PERSON1_ROOT" -type d -print0 | while IFS= read -r -d '' dir; do
    # Calculate the relative path from the *link location* to the *target*
    # Use pushd/popd to change directory safely and use realpath for calculation
    pushd "$dir" > /dev/null
    REL_PATH=$(realpath --relative-to=. "$TARGET")
    rm -f "$LINK_NAME"
    ln -s "$REL_PATH" "$LINK_NAME"
    echo $REL_PATH
    popd > /dev/null
done
