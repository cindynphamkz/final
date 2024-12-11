<?php
require_once("model-albums.php");
$pageTitle = "Group Chart";
include "view-header.php";

// Fetch album counts by group
$data = countAlbumsByGroup();

// Prepare data for the chart
$groupNames = [];
$fullAlbumCounts = [];
$miniAlbumCounts = [];
$singleAlbumCounts = [];
while ($row = $data->fetch_assoc()) {
    $groupNames[] = $row['GroupName'];
    $fullAlbumCounts[] = $row['FullAlbumCount'];
    $miniAlbumCounts[] = $row['MiniAlbumCount'];
    $singleAlbumCounts[] = $row['SingleAlbumCount'];
}
?>
<h1 class="text-center my-4">Albums by Group and Type</h1>
<canvas id="groupChart" width="400" height="200"></canvas>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for the chart
    const groupNames = <?php echo json_encode($groupNames); ?>;
    const fullAlbumCounts = <?php echo json_encode($fullAlbumCounts); ?>;
    const miniAlbumCounts = <?php echo json_encode($miniAlbumCounts); ?>;
    const singleAlbumCounts = <?php echo json_encode($singleAlbumCounts); ?>;

    // Render the chart
    const ctx = document.getElementById('groupChart').getContext('2d');
    const groupChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: groupNames,
            datasets: [
                {
                    label: 'Full Albums',
                    data: fullAlbumCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Mini Albums',
                    data: miniAlbumCounts,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Single Albums',
                    data: singleAlbumCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
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
