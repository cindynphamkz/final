<?php
require_once("model-groups.php");
$pageTitle = "Groups";
include "view-header.php";

$groups = selectGroups();
?>
<h1>Groups</h1>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGroupModal">Add New Group</button>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Members</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($group = $groups->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($group['Name']); ?></td>
            <td><?php echo htmlspecialchars($group['Company']); ?></td>
            <td><?php echo htmlspecialchars($group['Members']); ?></td>
            <td>
                <a href="albums-by-group.php?id=<?php echo $group['GroupID']; ?>" class="btn btn-info">View Albums</a>
                <a href="edit-group.php?id=<?php echo $group['GroupID']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete-group.php?id=<?php echo $group['GroupID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this group?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include "view-footer.php"; ?>
