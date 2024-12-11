<?php
require_once("model-albums.php");
require_once("model-groups.php");
$pageTitle = "Albums by Group";
include "view-header.php";

$groupId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$albums = selectAlbumsByGroup($groupId);
$group = getGroupById($groupId);
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
