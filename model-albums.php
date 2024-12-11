<?php
require_once("db.php");

function selectAlbums() {
    $conn = get_db_connection();
    $stmt = $conn->prepare("
        SELECT `Albums`.*, `Groups`.`Name` AS GroupName
        FROM `Albums`
        JOIN `Groups` ON `Albums`.`GroupID` = `Groups`.`GroupID`
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

function selectAlbumsByGroup($groupId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("
        SELECT `Albums`.*, `Groups`.`Name` AS GroupName
        FROM `Albums`
        JOIN `Groups` ON `Albums`.`GroupID` = `Groups`.`GroupID`
        WHERE `Albums`.`GroupID` = ?
    ");
    $stmt->bind_param("i", $groupId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

function countAlbumsByGroup() {
    $conn = get_db_connection();
    $stmt = $conn->prepare("
        SELECT `Groups`.`Name` AS GroupName, COUNT(`Albums`.`AlbumID`) AS AlbumCount
        FROM `Groups`
        LEFT JOIN `Albums` ON `Groups`.`GroupID` = `Albums`.`GroupID`
        GROUP BY `Groups`.`Name`
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

function addAlbum($title, $albumType, $groupId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO `Albums` (`Title`, `AlbumType`, `GroupID`) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $albumType, $groupId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
