<?php
function get_db_connection() {
    $conn = new mysqli('138.197.17.168', 'cindypha_finaluser', 'HWLhi2zXH*Wl', 'cindypha_final');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
