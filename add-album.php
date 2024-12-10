<?php
require_once("model-albums.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $albumType = $_POST["albumType"];
    $groupId = $_POST["groupid"];
    addAlbum($title, $albumType, $groupId);
    echo "<script>alert('Album added successfully!'); window.location.href='albums.php';</script>";
}
?>
