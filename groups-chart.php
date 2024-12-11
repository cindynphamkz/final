<?php
require_once("model-groups.php");
require_once("model-albums.php");
$pageTitle = "Group Chart";
include "view-header.php";

$groups = selectGroups();
$groupNames = [];
$albumCounts = [];

while ($group = $groups->fetch_assoc()) {
    $groupNames[] = $group['Name'];
    $albumCounts[] = countAlbumsByGroup($group['GroupID']);
}
?>
<h1>Group Chart</h1>
<canvas id="groupChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('groupChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($groupNames); ?>,
            datasets: [{
                label: 'Number of Albums',
                data: <?php echo json_encode($albumCounts); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php include "view-footer.php"; ?>
