<?php
require_once("model-albums.php");

$albumId = $_GET['id'];
deleteAlbum($albumId);
echo "<script>alert('Album deleted successfully!'); window.location.href='albums.php';</script>";
?>
