<?php
require_once("model-albums.php");

// Check if the `id` parameter exists in the query string
if (isset($_GET['id'])) {
    $albumId = $_GET['id'];

    // Call the deleteAlbum function to remove the album
    deleteAlbum($albumId);

    // Redirect back to the albums page
    header("Location: view-albums.php");
    exit();
} else {
    echo "No album ID provided.";
}
?>
