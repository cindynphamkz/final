<?php
require_once("model-albums.php");
$pageTitle = "Group Chart";
include "view-header.php";

// Fetch album counts by group
$data = countAlbumsByGroup();

// Prepare data for the chart
$groupNames = [];
$albumCounts = [];
while ($row = $data->fetch_assoc()) {
    $groupNames[] = $row['GroupName'];
    $albumCounts[] = $row['AlbumCount'];
}
?>
<h1 class="text-center my-4">Albums by Group</h1>
<canvas id="groupChart" width="400" height="200"></canvas>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for the chart
    const groupNames = <?php echo json_encode($groupNames); ?>;
    const albumCounts = <?php echo json_encode($albumCounts); ?>;

    // Render the chart
    const ctx = document.getElementById('groupChart').getContext('2d');
    const groupChart = new Chart(ctx, {
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
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php include "view-footer.php"; ?>
