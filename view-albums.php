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
<!-- Add Album Modal -->
<div class="modal fade" id="addAlbumModal" tabindex="-1" aria-labelledby="addAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="add-album.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAlbumModalLabel">Add New Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                    <br>
                    <label for="albumType">Album Type:</label>
                    <input type="text" id="albumType" name="albumType" class="form-control" required>
                    <br>
                    <label for="groupid">Group:</label>
                    <select id="groupid" name="groupid" class="form-control" required>
                        <?php
                        $groups = selectGroups();
                        while ($group = $groups->fetch_assoc()): ?>
                            <option value="<?php echo $group['GroupID']; ?>"><?php echo htmlspecialchars($group['Name']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Album</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "view-footer.php"; ?>
