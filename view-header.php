<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'K-pop Hub'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color: #f9f2ff;
            color: #000;
        }

        .navbar, .footer {
            background-color: #e6d9ff; 
            color: #000;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f2ff; 
            border-radius: 8px; 
        }

        .navbar-nav .nav-link {
            text-align: center;
            color: #000 !important;
        }

        .footer {
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            color: #000;
        }

        table thead th {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
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
