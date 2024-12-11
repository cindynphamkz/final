<?php
require_once("model-groups.php");
require_once("model-albums.php");
$pageTitle = "Groups Chart";
include "view-header.php";

// Prepare data for chart
$groups = selectGroups();
$groupNames = [];
$albumCounts = [];

while ($group = $groups->fetch_assoc()) {
    $groupNames[] = $group['Name'];
    $albumCounts[] = countAlbumsByGroup($group['GroupID']);
}
?>
<h1>Groups Chart</h1>
<canvas id="groupsChart" width="400" height="200"></canvas>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const groupNames = <?php echo json_encode($groupNames); ?>;
    const albumCounts = <?php echo json_encode($albumCounts); ?>;

    const ctx = document.getElementById('groupsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: groupNames,
            datasets: [{
                label: 'Number of Albums',
                data: albumCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php include "view-footer.php"; ?>
