<?php
require_once("model-albums.php");

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];

    deleteAlbum($albumId);

    header("Location: view-albums.php");
    exit();
} else {
    echo "No album ID provided.";
}
?>
