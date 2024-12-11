<?php
require_once("model-albums.php");
require_once("model-groups.php");

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
    $album = getAlbumById($albumId);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $albumType = $_POST['albumType'];
        $groupId = $_POST['groupid'];

        if (!empty($title) && !empty($albumType) && !empty($groupId)) {
            updateAlbum($albumId, $title, $albumType, $groupId);
            header("Location: view-albums.php");
            exit();
        } else {
            echo "All fields are required!";
        }
    }
} else {
    echo "No album ID provided.";
    exit();
}

$pageTitle = "Edit Album";
include "view-header.php";
?>

<div class="container">
    <h1 class="text-center my-4">Edit Album</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($album['Title']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="albumType" class="form-label">Album Type</label>
            <input type="text" id="albumType" name="albumType" class="form-control" value="<?php echo htmlspecialchars($album['AlbumType']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="groupid" class="form-label">Group</label>
            <select id="groupid" name="groupid" class="form-control" required>
                <?php
                $groups = selectGroups();
                while ($group = $groups->fetch_assoc()) {
                    $selected = ($group['GroupID'] == $album['GroupID']) ? "selected" : "";
                    echo "<option value=\"" . $group['GroupID'] . "\" $selected>" . htmlspecialchars($group['Name']) . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="view-albums.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include "view-footer.php"; ?>
