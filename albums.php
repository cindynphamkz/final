<?php
require_once("model-albums.php");
$pageTitle = "Albums";
include "view-header.php";

$albums = selectAlbums();
?>
<h1>Albums</h1>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAlbumModal">Add New Album</button>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Album Type</th>
            <th>Group</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($album = $albums->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($album['Title']); ?></td>
            <td><?php echo htmlspecialchars($album['AlbumType']); ?></td>
            <td><?php echo htmlspecialchars($album['GroupName']); ?></td>
            <td>
                <a href="edit-album.php?id=<?php echo $album['AlbumID']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete-album.php?id=<?php echo $album['AlbumID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this album?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include "view-footer.php"; ?>
