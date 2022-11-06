<?php

// Connect to the database
$dbconn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
// Show the client and server versions
print_r(pg_version($dbconn));