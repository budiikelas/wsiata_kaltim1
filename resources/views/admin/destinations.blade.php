@extends('layouts.admin')

@section('title', 'Kelola Destinasi')

@section('header_title')
    <h1>Kelola Destinasi</h1>
    <span>Daftar Paket & Destinasi Wisata</span>
@endsection

@section('content')
    <div class="table-card">
        <div class="card-header">
            <h4>Semua Destinasi</h4>
            <button class="btn-add" id="btnAddDest">
                <i class="fas fa-plus"></i> Tambah Wisata
            </button>
        </div>
        <table class="modern-table">
            <thead>
                <tr>
                    <th>Nama Destinasi</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($destinations as $dest)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <img src="{{ $dest->thumbnail ? asset($dest->thumbnail) : asset('images/beach.jpeg') }}" 
                                 style="width: 40px; height: 40px; border-radius: 8px; object-fit: cover;">
                            <div>{{ $dest->name }}</div>
                        </div>
                    </td>
                    <td><span class="status-badge" style="background: rgba(212, 175, 55, 0.1); color: var(--gold-accent);">{{ $dest->category->name }}</span></td>
                    <td>{{ $dest->location }}</td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-action btn-edit" 
                                    data-id="{{ $dest->id }}"
                                    data-name="{{ $dest->name }}"
                                    data-category="{{ $dest->category_id }}"
                                    data-location="{{ $dest->location }}"
                                    data-latitude="{{ $dest->latitude }}"
                                    data-longitude="{{ $dest->longitude }}"
                                    data-description="{{ $dest->description }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('destinations.destroy', $dest->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-dim); padding: 50px;">
                        Belum ada destinasi. Silakan tambahkan destinasi baru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah/Edit Wisata -->
    <div class="modal-overlay" id="destModal">
        <div class="modal-content glass-panel">
            <div class="modal-header">
                <h3 id="modalTitle">Tambah Wisata Baru</h3>
                <button class="close-modal" id="btnCloseModal">&times;</button>
            </div>
            <form id="destForm" action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
                @csrf
                <div id="methodField"></div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Destinasi</label>
                        <input type="text" name="name" id="in_name" placeholder="Contoh: Pulau Derawan" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" id="in_category" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Lokasi (Pilih di Peta)</label>
                        <input type="text" name="location" id="in_location" placeholder="Lokasi akan terisi otomatis saat anda memilih di peta" required readonly>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <div class="map-search-wrapper" style="position: relative; margin-bottom: 10px;">
                            <input type="text" id="mapSearchInput" placeholder="Cari nama lokasi (contoh: Samarinda, Berau, dll)..." style="width: 100%; border-color: rgba(212, 175, 55, 0.3);">
                            <button type="button" id="btnSearchLoc" style="position: absolute; right: 10px; top: 1px; bottom: 1px; background: none; border: none; color: var(--gold-accent); cursor: pointer; padding: 0 10px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div id="mapPicker" style="height: 300px; border-radius: 12px; border: 1px solid var(--glass-border); position: relative; z-index: 1;"></div>
                        <input type="hidden" name="latitude" id="in_latitude">
                        <input type="hidden" name="longitude" id="in_longitude">
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Foto Destinasi</label>
                        <input type="file" name="thumbnail" accept="image/*">
                        <small style="color: var(--text-dim); font-size: 11px;">Format: JPG, PNG, WEBP (Maks: 2MB). Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Deskripsi Singkat</label>
                        <textarea name="description" id="in_description" rows="3" placeholder="Jelaskan keindahan destinasi ini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="btnCancel">Batal</button>
                    <button type="submit" class="btn-save" id="btnSubmit">Simpan Destinasi</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    .btn-action {
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    .btn-edit {
        background: rgba(212, 175, 55, 0.1);
        color: var(--gold-accent);
        border: 1px solid rgba(212, 175, 55, 0.2);
    }
    .btn-edit:hover {
        background: var(--gold-accent);
        color: black;
    }
    .btn-delete {
        background: rgba(231, 76, 60, 0.1);
        color: #e74c3c;
        border: 1px solid rgba(231, 76, 60, 0.2);
    }
    .btn-delete:hover {
        background: #e74c3c;
        color: white;
    }
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        backdrop-filter: blur(5px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 2000;
    }
    .modal-content {
        width: 100%;
        max-width: 600px;
        background: #111;
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        padding: 30px;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }
    .modal-overlay.active {
        display: flex;
    }
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    .close-modal {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }
    .admin-form .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .admin-form .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .admin-form label {
        font-size: 13px;
        color: var(--text-dim);
    }
    .admin-form input, .admin-form select, .admin-form textarea {
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 12px;
        color: white;
        font-family: inherit;
        outline: none;
    }
    .admin-form input:focus {
        border-color: var(--gold-accent);
    }
    .modal-footer {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }
    .btn-cancel {
        background: transparent;
        border: 1px solid var(--glass-border);
        color: white;
        padding: 12px 25px;
        border-radius: 12px;
        cursor: pointer;
    }
    .btn-save {
        background: var(--gold-accent);
        color: black;
        border: none;
        padding: 12px 25px;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    const modal = document.getElementById('destModal');
    const destForm = document.getElementById('destForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');
    const btnSubmit = document.getElementById('btnSubmit');
    
    const btnAdd = document.getElementById('btnAddDest');
    const btnClose = document.getElementById('btnCloseModal');
    const btnCancel = document.getElementById('btnCancel');

    const inName = document.getElementById('in_name');
    const inCategory = document.getElementById('in_category');
    const inLocation = document.getElementById('in_location');
    const inDescription = document.getElementById('in_description');

    // Handle Add Modal
    btnAdd.onclick = () => {
        modalTitle.innerText = 'Tambah Wisata Baru';
        btnSubmit.innerText = 'Simpan Destinasi';
        destForm.action = "{{ route('destinations.store') }}";
        methodField.innerHTML = '';
        destForm.reset();
        
        // Reset Map & Search State
        if (mapSearchInput) mapSearchInput.value = '';
        inLatitude.value = '';
        inLongitude.value = '';
        if (mainMarker) map.removeLayer(mainMarker);
        mainMarker = null;
        map.setView([-0.5022, 117.1536], 7);
        
        modal.classList.add('active');
        // Refresh map layout inside modal
        setTimeout(() => map.invalidateSize(), 300);
    };

    // Handle Edit Modal
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.onclick = () => {
            const id = btn.dataset.id;
            modalTitle.innerText = 'Edit Destinasi';
            btnSubmit.innerText = 'Perbarui Destinasi';
            destForm.action = `/destinations/${id}`;
            methodField.innerHTML = '@method("PUT")';
            
            inName.value = btn.dataset.name;
            inCategory.value = btn.dataset.category;
            inLocation.value = btn.dataset.location;
            inDescription.value = btn.dataset.description;
            if (mapSearchInput) mapSearchInput.value = '';
            
            // Set Lat Lng
            const lat = btn.dataset.latitude;
            const lng = btn.dataset.longitude;
            
            if (lat && lng) {
                inLatitude.value = lat;
                inLongitude.value = lng;
                updateMarker(lat, lng);
            } else {
                inLatitude.value = '';
                inLongitude.value = '';
                if (mainMarker) map.removeLayer(mainMarker);
                mainMarker = null;
            }
            
            modal.classList.add('active');
            // Refresh map layout inside modal
            setTimeout(() => map.invalidateSize(), 300);
        };
    });

    btnClose.onclick = () => modal.classList.remove('active');
    btnCancel.onclick = () => modal.classList.remove('active');

    window.onclick = (event) => {
        if (event.target == modal) {
            modal.classList.remove('active');
        }
    }

    // Leaflet Integration
    let map, mainMarker;
    const inLatitude = document.getElementById('in_latitude');
    const inLongitude = document.getElementById('in_longitude');
    const mapSearchInput = document.getElementById('mapSearchInput');
    const btnSearchLoc = document.getElementById('btnSearchLoc');

    function initMap() {
        // Center on Kaltim
        map = L.map('mapPicker').setView([-0.5022, 117.1536], 7);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;
            
            updateMarker(lat, lng);
            reverseGeocode(lat, lng);
        });

        // Search Logic
        if (btnSearchLoc) {
            btnSearchLoc.onclick = () => searchLocation();
        }
        if (mapSearchInput) {
            mapSearchInput.onkeydown = (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    searchLocation();
                }
            };
        }
    }

    function searchLocation() {
        const query = mapSearchInput.value;
        if (!query) return;

        btnSearchLoc.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`, {
            headers: {
                'User-Agent': 'WisataKaltimAdminApp'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const result = data[0];
                const lat = parseFloat(result.lat);
                const lng = parseFloat(result.lon);
                
                updateMarker(lat, lng);
                inLocation.value = result.display_name;
                map.setView([lat, lng], 13);
            } else {
                alert('Lokasi tidak ditemukan. Coba gunakan kata kunci yang lebih spesifik.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mencari lokasi.');
        })
        .finally(() => {
            btnSearchLoc.innerHTML = '<i class="fas fa-search"></i>';
        });
    }

    function updateMarker(lat, lng) {
        if (mainMarker) {
            mainMarker.setLatLng([lat, lng]);
        } else {
            mainMarker = L.marker([lat, lng], {draggable: true}).addTo(map);
            mainMarker.on('dragend', function(e) {
                const pos = mainMarker.getLatLng();
                updateMarker(pos.lat, pos.lng);
                reverseGeocode(pos.lat, pos.lng);
            });
        }
        
        inLatitude.value = lat;
        inLongitude.value = lng;
        map.panTo([lat, lng]);
    }

    function reverseGeocode(lat, lng) {
        inLocation.value = 'Mendapatkan alamat...';
        
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`, {
            headers: {
                'User-Agent': 'WisataKaltimAdminApp'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.display_name) {
                inLocation.value = data.display_name;
            } else {
                inLocation.value = `📍 ${lat.toFixed(4)}, ${lng.toFixed(4)}`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            inLocation.value = `📍 ${lat.toFixed(4)}, ${lng.toFixed(4)}`;
        });
    }

    // Wait for Leaflet to load then init
    window.addEventListener('load', () => {
        if (typeof L !== 'undefined') {
            initMap();
        }
    });
</script>
@endpush
