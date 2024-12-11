<?php
require_once("model-albums.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $albumType = $_POST['albumType'];
    $groupId = $_POST['groupid'];

    // Validate inputs
    if (!empty($title) && !empty($albumType) && !empty($groupId)) {
        addAlbum($title, $albumType, $groupId);
        header("Location: view-albums.php");
        exit();
    } else {
        echo "All fields are required!";
    }
}
?>
