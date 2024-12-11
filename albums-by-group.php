<?php
require_once("model-albums.php");
require_once("model-groups.php");

$pageTitle = "Albums by Group";
include "view-header.php";

$groupId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($groupId > 0) {
    $group = getGroupById($groupId);
    $albums = selectAlbumsByGroup($groupId);

    if (!$group) {
        echo "<p class='text-center mt-4'>Group not found.</p>";
        include "view-footer.php";
        exit();
    }

    echo "<h1 class='text-center my-4'>Albums by " . htmlspecialchars($group['Name']) . "</h1>";
    echo "<div class='table-responsive'><table class='table table-striped'>
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
                    <a href='edit-album.php?id=" . $album['AlbumID'] . "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete-album.php?id=" . $album['AlbumID'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this album?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody>
        </table></div>";

} else {
    $groups = selectGroups();

    echo "<h1 class='text-center my-4'>Albums by Group</h1>";
    while ($group = $groups->fetch_assoc()) {
        echo "<div class='mt-5'>
                <h2 class='text-primary'>" . htmlspecialchars($group['Name']) . "</h2>";
        $albums = selectAlbumsByGroup($group['GroupID']);

        if ($albums->num_rows > 0) {
            echo "<div class='table-responsive'><table class='table table-striped'>
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
                </table></div>";
        } else {
            echo "<p class='text-muted'>No albums found for this group.</p>";
        }
        echo "</div>";
    }
}

include "view-footer.php";
?>
