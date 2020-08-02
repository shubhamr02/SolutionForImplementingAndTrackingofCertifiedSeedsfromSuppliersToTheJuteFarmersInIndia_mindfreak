<?php
include 'database.php';
include 'opendb.php'; 

$tableName  = 'sale';
$backupFile = 'backup/mypet.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysqli_query($conn,$query); 

include 'closedb.php';
?>