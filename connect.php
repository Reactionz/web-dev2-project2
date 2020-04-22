<?php
// This file will contain the PHP code that establishes your connection to the database. 
// This will be the same as the ones you've used on your previous assignments.

// Set up my SQL connection 

$host = 'localhost';
$user = 'lmarquez';
$password = 'nrep@4Zseyp';
$database = 'lmarquez';

// This is considered an object when connecting to a database.
$conn = new mysqli($host, $user, $password, $database);

// test if connection failed
if($conn->connect_errno) {
    // Use this to show an error
    // Object oriented way
    die("Connection failed: {$conn ->connect_error}\n"); 
}
// } else {
//     die("Connected to MySQL!\n";
// }

?>
