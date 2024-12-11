<?php
require_once("db.php");

function selectGroups() {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM 'Groups'");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}

function getGroupById($groupId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT * FROM 'Groups' WHERE GroupID = ?");
    $stmt->bind_param("i", $groupId);
    $stmt->execute();
    $result = $stmt->get_result();
    $group = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $group;
}

function addGroup($name, $company, $members) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO 'Groups' (Name, Company, Members) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $company, $members);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function updateGroup($groupId, $name, $company, $members) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE 'Groups' SET Name = ?, Company = ?, Members = ? WHERE GroupID = ?");
    $stmt->bind_param("sssi", $name, $company, $members, $groupId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function deleteGroup($groupId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM 'Groups' WHERE GroupID = ?");
    $stmt->bind_param("i", $groupId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
