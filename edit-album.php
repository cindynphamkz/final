<?php
require_once("model-albums.php");
require_once("model-groups.php");
$pageTitle = "Edit Album";
include "view-header.php";

$albumId = $_GET['id'];
$album = getAlbumById($albumId);
$groups = selectGroups();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $albumType = $_POST["albumType"];
    $groupId = $_POST["groupid"];
    updateAlbum($albumId, $title, $albumType, $groupId);
    echo "<script>alert('Album updated successfully!'); window.location.href='albums.php';</script>";
}
?>
<form method="POST" action="edit-album.php?id=<?php echo $albumId; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($album['Title']); ?>" required>
    <br>
    <label for="albumType">Album Type:</label>
    <input type="text" id="albumType" name="albumType" value="<?php echo htmlspecialchars($album['AlbumType']); ?>" required>
    <br>
    <label for="groupid">Group:</label>
    <select id="groupid" name="groupid" required>
        <?php while ($group = $groups->fetch_assoc()): ?>
            <option value="<?php echo $group['GroupID']; ?>" <?php if ($album['GroupID'] == $group['GroupID']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($group['Name']); ?>
            </option>
        <?php endwhile; ?>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Update Album</button>
</form>
<?php include "view-footer.php"; ?>
