<?php
require_once("db.php");

function selectAlbums() {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT Albums.*, Groups.Name AS GroupName FROM Albums JOIN Groups ON Albums.GroupID = Groups.GroupID");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

function getAlbumById($albumId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM Albums WHERE AlbumID = ?");
    $stmt->bind_param("i", $albumId);
    $stmt->execute();
    $result = $stmt->get_result();
    $album = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $album;
}

function addAlbum($title, $albumType, $groupId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO Albums (Title, AlbumType, GroupID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $albumType, $groupId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function updateAlbum($albumId, $title, $albumType, $groupId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE Albums SET Title = ?, AlbumType = ?, GroupID = ? WHERE AlbumID = ?");
    $stmt->bind_param("ssii", $title, $albumType, $groupId, $albumId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function deleteAlbum($albumId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM Albums WHERE AlbumID = ?");
    $stmt->bind_param("i", $albumId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
