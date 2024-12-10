<?php
require_once("model-groups.php");

$groupId = $_GET['id'];
deleteGroup($groupId);
echo "<script>alert('Group deleted successfully!'); window.location.href='groups.php';</script>";
?>
