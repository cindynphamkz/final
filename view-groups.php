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

<div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="add-group.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGroupModalLabel">Add New Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                    <br>
                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" class="form-control" required>
                    <br>
                    <label for="members">Members:</label>
                    <textarea id="members" name="members" class="form-control" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Group</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "view-footer.php"; ?>
