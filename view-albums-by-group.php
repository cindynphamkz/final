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
        </tr>
    </thead>
    <tbody>
        <?php while ($album = $albums->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($album['Title']); ?></td>
            <td><?php echo htmlspecialchars($album['AlbumType']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include "view-footer.php"; ?>
