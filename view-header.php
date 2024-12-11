<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'K-pop Hub'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set light pastel purple background */
        body {
            background-color: #f9f2ff;
            color: #000; /* Black text */
        }
        /* Add padding and limit max-width for better spacing */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Center navbar links */
        .navbar-nav .nav-link {
            text-align: center;
        }
        /* Style table headers */
        table thead th {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view-groups.php">Groups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view-albums.php">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="albums-by-group.php">Albums by Group</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="groups-chart.php">Group Chart</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>
