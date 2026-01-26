<?php
// Mock Data for Admin Dashboard
$stats = [
    ['label' => 'Total Users', 'value' => '1,284', 'icon' => 'fas fa-users', 'growth' => '+12%'],
    ['label' => 'Total Bookings', 'value' => '856', 'icon' => 'fas fa-ticket-alt', 'growth' => '+5%'],
    ['label' => 'Revenue', 'value' => '$12,450', 'icon' => 'fas fa-wallet', 'growth' => '+18%'],
    ['label' => 'Active Trips', 'value' => '42', 'icon' => 'fas fa-plane', 'growth' => '+2%'],
];

$consumers = [
    ['name' => 'Aditya Pratama', 'email' => 'aditya@example.com', 'destination' => 'Derawan', 'status' => 'Success', 'date' => '24 Jan 2026'],
    ['name' => 'Siti Aminah', 'email' => 'siti@example.com', 'destination' => 'Kakaban', 'status' => 'Pending', 'date' => '25 Jan 2026'],
    ['name' => 'Budi Santoso', 'email' => 'budi@example.com', 'destination' => 'Maratua', 'status' => 'Success', 'date' => '23 Jan 2026'],
    ['name' => 'Dewi Lestari', 'email' => 'dewi@example.com', 'destination' => 'Labuan Cermin', 'status' => 'Success', 'date' => '22 Jan 2026'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wisata Kaltim</title>
    
    <!-- CSS -->
    @vite(['resources/css/admin.css'])
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="admin-wrapper">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <i class="fas fa-crown"></i>
                <h2>ADMIN DASHBOARD</h2>
            </div>

            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Destinations</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Consumers</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span>Statistics</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log Out</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-dashboard">
            
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-left">
                    <h1>Selamat Datang, Admin</h1>
                    <span>Dahboard Overview & Analytics</span>
                </div>

                <div class="header-right">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search data...">
                    </div>
                    <div class="admin-profile">
                        <img src="https://ui-avatars.com/api/?name=Admin+Kaltim&background=d4af37&color=000" alt="Admin">
                        <span>Admin Kaltim</span>
                    </div>
                </div>
            </header>

            <!-- Stats Bar -->
            <div class="stats-grid">
                <?php foreach($stats as $stat): ?>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="<?php echo $stat['icon']; ?>"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo $stat['value']; ?></h3>
                        <p><?php echo $stat['label']; ?></p>
                        <small style="color: var(--gold-accent)"><?php echo $stat['growth']; ?> this month</small>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Charts & Popular Destinations -->
            <div class="middle-row">
                <div class="chart-card">
                    <div class="card-header">
                        <h4>Monthly Bookings Statistics</h4>
                        <select style="background: var(--glass-bg); color: white; border: none; font-size: 11px; padding: 5px;">
                            <option>Last 6 Months</option>
                        </select>
                    </div>
                    <div class="bar-chart">
                        <div class="bar" style="height: 40%;"></div>
                        <div class="bar" style="height: 65%;"></div>
                        <div class="bar" style="height: 50%;"></div>
                        <div class="bar" style="height: 85%;"></div>
                        <div class="bar" style="height: 60%;"></div>
                        <div class="bar" style="height: 95%;"></div>
                    </div>
                </div>

                <div class="popular-card">
                    <div class="card-header">
                        <h4>Most Visited</h4>
                    </div>
                    <div class="popular-list" style="display: flex; flex-direction: column; gap: 15px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 13px;">Kep. Derawan</span>
                            <div style="width: 100px; height: 6px; background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden;">
                                <div style="width: 90%; height: 100%; background: var(--gold-accent);"></div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 13px;">Labuan Cermin</span>
                            <div style="width: 100px; height: 6px; background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden;">
                                <div style="width: 75%; height: 100%; background: var(--gold-accent);"></div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 13px;">P. Maratua</span>
                            <div style="width: 100px; height: 6px; background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden;">
                                <div style="width: 60%; height: 100%; background: var(--gold-accent);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Consumers Table -->
            <div class="table-card">
                <div class="card-header">
                    <h4>Recent Consumers Activities</h4>
                    <button class="btn-add">Add New Data</button>
                </div>
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($consumers as $consumer): ?>
                        <tr>
                            <td>
                                <div><?php echo $consumer['name']; ?></div>
                                <small style="color: var(--text-dim)"><?php echo $consumer['email']; ?></small>
                            </td>
                            <td><?php echo $consumer['destination']; ?></td>
                            <td><?php echo $consumer['date']; ?></td>
                            <td>
                                <span class="status-badge <?php echo $consumer['status'] == 'Success' ? 'status-success' : 'status-pending'; ?>">
                                    <?php echo $consumer['status']; ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </main>

    </div>

</body>
</html>
