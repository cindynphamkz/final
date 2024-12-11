<?php
require_once("model-albums.php");
require_once("model-groups.php");

$pageTitle = "Albums by Group";
include "view-header.php";

// Get the GroupID from the query parameter
$groupId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the group and albums data
$group = getGroupById($groupId);
$albums = selectAlbumsByGroup($groupId);

// Check if the group exists
if (!$group) {
    echo "<p class='text-center'>Group not found.</p>";
    include "view-footer.php";
    exit();
}
?>
<h1>Albums by <?php echo htmlspecialchars($group['Name']); ?></h1>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Album Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($album = $albums->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($album['Title']); ?></td>
            <td><?php echo htmlspecialchars($album['AlbumType']); ?></td>
            <td>
                <a href="edit-album.php?id=<?php echo $album['AlbumID']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete-album.php?id=<?php echo $album['AlbumID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this album?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include "view-footer.php"; ?>
