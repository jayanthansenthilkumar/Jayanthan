<?php
include "config.php";
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PrisolTech</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: #3498db;
            --secondary-color: #f8f9fa;
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: white;
            color: var(--text-dark);
            padding: 20px;
            position: fixed;
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        }

        .sidebar-header {
            padding: 20px 0;
            text-align: center;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .sidebar-header h2 {
            color: var(--primary-color);
        }

        .menu-item {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: 0.3s;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .menu-item:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
        }

        .menu-item i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            background: var(--secondary-color);
        }

        .header {
            height: var(--header-height);
            background: white;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .header h2 {
            color: var(--text-dark);
            font-weight: 500;
        }

        .user-info {
            color: var(--primary-color);
            font-weight: 500;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h3 {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 10px;
            font-weight: 400;
        }

        .stat-card p {
            font-size: 24px;
            color: var(--primary-color);
            font-weight: 600;
        }

        .datatable-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        table.dataTable thead th {
            background-color: var(--secondary-color);
            color: var(--text-dark);
            border-bottom: 2px solid var(--primary-color);
            font-weight: 500;
        }

        table.dataTable tbody td {
            color: var(--text-dark);
            font-weight: 400;
        }

        .datatable-container h1 {
            color: var(--text-dark);
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>PrisolTech</h2>
            </div>
            <div class="sidebar-menu">
                <a href="#" class="menu-item">
                    <i class='bx bxs-dashboard'></i>
                    Dashboard
                </a>
                <a href="#" class="menu-item">
                    <i class='bx bxs-user-detail'></i>
                    Registrations
                </a>
                <a href="#" class="menu-item">
                    <i class='bx bxs-cog'></i>
                    Settings
                </a>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h2>Dashboard</h2>
                <div class="user-info">
                    Admin
                </div>
            </div>

            <div class="stats-cards">
                <div class="stat-card">
                    <h3>Total Registrations</h3>
                    <p><?php echo mysqli_num_rows($result); ?></p>
                </div>
                <div class="stat-card">
                    <h3>Today's Registrations</h3>
                    <p>0</p>
                </div>
                <div class="stat-card">
                    <h3>Active Users</h3>
                    <p>0</p>
                </div>
            </div>

            <div class="datatable-container">
                <h1>Registration Details</h1>
                <table id="registrationTable" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Register Number</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>GitHub ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($row['Name'])."</td>";
                            echo "<td>".htmlspecialchars($row['Regno'])."</td>";
                            echo "<td>".htmlspecialchars($row['Dept'])."</td>";
                            echo "<td>".htmlspecialchars($row['Mailid'])."</td>";
                            echo "<td>".htmlspecialchars($row['Phone'])."</td>";
                            echo "<td>".htmlspecialchars($row['Github'])."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registrationTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[0, 'asc']],
                language: {
                    search: "Search records:"
                }
            });
        });
    </script>
</body>
</html>
