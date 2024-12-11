<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'K-pop Hub'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background Colors */
        body {
            background-color: #f9f2ff; /* Very light pastel purple */
            color: #000; /* Black text */
        }
        .navbar, .footer {
            background-color: #fffdeb; /* Very light pastel yellow */
        }
        .container {
            max-width: 1200px; /* Limit the width of the content */
            margin: 20px auto; /* Center content and add space on top/bottom */
            padding: 20px; /* Add padding around the edges */
            background-color: #fffdeb; /* Very light pastel yellow background for content */
            border-radius: 8px; /* Rounded corners */
        }

        /* Style navbar links */
        .navbar-nav .nav-link {
            text-align: center;
            color: #000 !important; /* Ensure black text for navbar links */
        }

        /* Footer styling */
        .footer {
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        /* Table header styling */
        table thead th {
            color: #000; /* Black text */
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
