<?php
require_once("model-albums.php");
require_once("model-groups.php");

$pageTitle = "Albums by Group";
include "view-header.php";

// Get the GroupID from the query parameter (if provided)
$groupId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// If a specific group is selected, fetch only its albums
if ($groupId > 0) {
    $group = getGroupById($groupId);
    $albums = selectAlbumsByGroup($groupId);

    // Check if the group exists
    if (!$group) {
        echo "<p class='text-center'>Group not found.</p>";
        include "view-footer.php";
        exit();
    }

    echo "<h1>Albums by " . htmlspecialchars($group['Name']) . "</h1>";
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Album Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";
    while ($album = $albums->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($album['Title']) . "</td>
                <td>" . htmlspecialchars($album['AlbumType']) . "</td>
                <td>
                    <a href='edit-album.php?id=" . $album['AlbumID'] . "' class='btn btn-warning'>Edit</a>
                    <a href='delete-album.php?id=" . $album['AlbumID'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this album?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody>
        </table>";

} else {
    // No specific group selected; fetch all albums grouped by group
    $groups = selectGroups();

    echo "<h1>Albums by Group</h1>";
    while ($group = $groups->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($group['Name']) . "</h2>";
        $albums = selectAlbumsByGroup($group['GroupID']);

        if ($albums->num_rows > 0) {
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Album Type</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($album = $albums->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($album['Title']) . "</td>
                        <td>" . htmlspecialchars($album['AlbumType']) . "</td>
                      </tr>";
            }
            echo "</tbody>
                </table>";
        } else {
            echo "<p>No albums found for this group.</p>";
        }
    }
}

include "view-footer.php";
?>
