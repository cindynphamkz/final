<?php
require_once("model-groups.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $company = $_POST["company"];
    $members = $_POST["members"];
    addGroup($name, $company, $members);
    echo "<script>alert('Group added successfully!'); window.location.href='groups.php';</script>";
}
?>
