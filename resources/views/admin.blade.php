@extends('layouts.admin')

@section('title', 'Admin Panel')

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
                @php
                    $isGrowth = str_contains($stat['growth'], '+');
                    $color = $isGrowth ? '#27ae60' : '#e74c3c';
                @endphp
                <small style="color: {{ $color }};">{{ $stat['growth'] }} this month</small>
            </div>
        </div>
        @endforeach
       
    </div>

    <!-- Charts & Popular Destinations -->
    <div class="middle-row">
        <div class="chart-card">
            <div class="card-header">
                <h4>Monthly Visitors</h4>
                <select id="visitor-filter" style="background: var(--glass-bg); color: white; border: none; font-size: 11px; padding: 5px; border-radius: 4px; cursor: pointer;">
                    <option value="6">Last 6 Months</option>
                    <option value="12">Last Year</option>
                    <option value="all">All Time</option>
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
            <div class="chart-labels">
                <span>Jan</span>
                <span>Feb</span>
                <span>Mar</span>
                <span>Apr</span>
                <span>May</span>
                <span>Jun</span>
            </div>
        </div>

        <div class="popular-card">
            <div class="card-header">
                <h4>Most Visited</h4>
            </div>
            <div class="popular-list">
                @forelse($popularDestinations as $dest)
                <div class="popular-item">
                    <span style="font-size: 13px; font-weight: 500;">{{ $dest->name }}</span>
                    <div class="popular-item-info">
                        <span class="popular-item-visits">{{ number_format($dest->visits) }}</span>
                        <div class="bar-progress-container">
                            <div class="bar-progress-fill" style="width: {{ $dest->percentage }}%; background: {{ $dest->bar_color }}; box-shadow: 0 0 10px {{ $dest->bar_color }}44;"></div>
                        </div>
                    </div>
                </div>
                @empty
                <p style="font-size: 12px; color: var(--text-dim);">Belum ada data destinasi.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="card-header">
            <h4>Recent Users Activities</h4>
            <button class="btn-add">
                <i class="fas fa-plus"></i> Add New Data
            </button>
        </div>
        <div class="table-container">
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
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterSelect = document.getElementById('visitor-filter');
        const bars = document.querySelectorAll('.bar-chart .bar');
        const labelsContainer = document.querySelector('.chart-labels');

        // Mock data sets with labels
        const dataSets = {
            '6': {
                values: ['40%', '65%', '50%', '85%', '60%', '95%'],
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
            },
            '12': {
                values: ['30%', '45%', '60%', '55%', '70%', '80%'],
                labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            'all': {
                values: ['90%', '85%', '88%', '92%', '95%', '98%'],
                labels: ['2021', '2022', '2023', '2024', '2025', '2026']
            }
        };

        if(filterSelect) {
            filterSelect.addEventListener('change', function() {
                const val = this.value;
                const data = dataSets[val] || dataSets['6'];
                const newValues = data.values;
                const newLabels = data.labels;

                // Animate bars
                bars.forEach((bar, index) => {
                    if(newValues[index]) {
                        // Reset opacity for effect
                        bar.style.opacity = '0.5';
                        bar.style.height = newValues[index];
                        
                        setTimeout(() => {
                            bar.style.opacity = '1';
                        }, 200);
                    }
                });

                // Update Labels
                if(labelsContainer) {
                    labelsContainer.innerHTML = ''; // Clear existing
                    newLabels.forEach(label => {
                        const span = document.createElement('span');
                        span.textContent = label;
                        labelsContainer.appendChild(span);
                    });
                }
            });
        }
    });
</script>
@endpush
