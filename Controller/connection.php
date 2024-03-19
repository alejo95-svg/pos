<?php

$host = "localhost"; 
$dbname = "tolitamal"; /* u656502954_tolitamal */
$user = "root"; /* u656502954_tolitamalDB */
$password = ""; /* h&#Vl=Vj7 */

try{
    $conn = new mysqli($host, $user, $password, $dbname);
    }
catch(Exception $e){
    die('Error: ' . $e->GetMessage());
}
