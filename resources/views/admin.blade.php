@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('header_title')
    <h1>Selamat Datang, Admin</h1>
    <span>Dashboard Overview & Analytics</span>
@endsection

@section('content')
    <!-- Stats Bar -->
    <div class="stats-grid">
        @foreach($stats as $stat)
        <div class="stat-card">
            <div class="stat-icon">
                <i class="{{ $stat['icon'] }}"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $stat['value'] }}</h3>
                <p>{{ $stat['label'] }}</p>
                <small style="color: var(--gold-accent)">{{ $stat['growth'] }} this month</small>
            </div>
        </div>
        @endforeach
       
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
                @forelse($popularDestinations as $dest)
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 13px;">{{ $dest->name }}</span>
                    <div style="width: 100px; height: 6px; background: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden;">
                        @php $progress = ($dest->rating ?? 0) * 20; @endphp
                        <div style="width: {{ $progress }}%; height: 100%; background: var(--gold-accent);"></div>
                    </div>
                </div>
                @empty
                <p style="font-size: 12px; color: var(--text-dim);">Belum ada data destinasi.</p>
                @endforelse
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
                @foreach($consumers as $consumer)
                <tr>
                    <td>
                        <div>{{ $consumer['name'] }}</div>
                        <small style="color: var(--text-dim)">{{ $consumer['email'] }}</small>
                    </td>
                    <td>{{ $consumer['destination'] }}</td>
                    <td>{{ $consumer['date'] }}</td>
                    <td>
                        <span class="status-badge {{ $consumer['status'] == 'Success' ? 'status-success' : 'status-pending' }}">
                            {{ $consumer['status'] }}
                        </span>
                    </td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-icon"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
