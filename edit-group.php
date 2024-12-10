<?php
require_once("model-groups.php");
$pageTitle = "Edit Group";
include "view-header.php";

$groupId = $_GET['id'];
$group = getGroupById($groupId);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $company = $_POST["company"];
    $members = $_POST["members"];
    updateGroup($groupId, $name, $company, $members);
    echo "<script>alert('Group updated successfully!'); window.location.href='groups.php';</script>";
}
?>
<form method="POST" action="edit-group.php?id=<?php echo $groupId; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($group['Name']); ?>" required>
    <br>
    <label for="company">Company:</label>
    <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($group['Company']); ?>" required>
    <br>
    <label for="members">Members:</label>
    <textarea id="members" name="members" required><?php echo htmlspecialchars($group['Members']); ?></textarea>
    <br>
    <button type="submit" class="btn btn-primary">Update Group</button>
</form>
<?php include "view-footer.php"; ?>
