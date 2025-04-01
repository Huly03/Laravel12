<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        /* Header */
        .header {
            background-color: #1f2a3f;
            color: white;
            padding: 20px 0;
        }

        .header h1 {
            text-align: center;
        }

        /* Sidebar */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
        }

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 30px;
        }

        .card {
            margin-bottom: 20px;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #1f2a3f;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

    </style>
</head>
<body>
<x-header />


    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center">Navigation</h3>
        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
        <a href="#">Reports</a>
        <a href="#">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Welcome to Admin Dashboard</h2>

        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        Total Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">1200</h5>
                        <p class="card-text">Total registered users on the platform.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        Active Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">800</h5>
                        <p class="card-text">Users currently active on the platform.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">
                        Inactive Users
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">400</h5>
                        <p class="card-text">Users who have not logged in recently.</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>News & Recommendations</h3>
        <div class="row">
            <!-- News 1 -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">Half-Life 2 RTX</h5>
                        <p class="card-text">Exciting news about the new Half-Life 2 RTX game update!</p>
                    </div>
                </div>
            </div>

            <!-- News 2 -->
            <div class="col-md-6">
                <div class="card">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="News Image">
                    <div class="card-body">
                        <h5 class="card-title">NVIDIA DLSS Announcement</h5>
                        <p class="card-text">Learn more about the latest NVIDIA DLSS technology and updates.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
