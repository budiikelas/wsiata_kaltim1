@extends('layouts.admin')

@section('title', 'Kelola Fasilitas')

@section('header_title')
    <h1>Kelola Fasilitas</h1>
    <span>Daftar Fasilitas Wisata</span>
@endsection

@section('content')
    <div class="table-card">
        <div class="card-header">
            <h4>Semua Fasilitas</h4>
            <button class="btn-add" id="btnAddFacility">
                <i class="fas fa-plus"></i> Tambah Fasilitas
            </button>
        </div>
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Nama Fasilitas</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($facilities as $facility)
                    <tr>
                        <td>
                            <div style="font-weight: 600;">{{ $facility->name }}</div>
                        </td>
                        <td>
                            <div class="action-btns">
                                <button class="btn-action btn-edit" 
                                        data-id="{{ $facility->id }}"
                                        data-name="{{ $facility->name }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.facilities.delete', $facility->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
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
                        <td colspan="2" style="text-align: center; color: var(--text-dim); padding: 50px;">
                            <i class="fas fa-concierge-bell" style="font-size: 40px; margin-bottom: 15px; display: block; opacity: 0.3;"></i>
                            Belum ada fasilitas. Silakan tambahkan fasilitas baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile List View -->
        <div class="mobile-list-view">
            @forelse($facilities as $facility)
            <div class="mobile-card">
                <div class="mobile-card-header">
                    <div class="mobile-card-title">
                        <h4>{{ $facility->name }}</h4>
                    </div>
                </div>
                <div class="mobile-card-actions">
                    <button class="btn-action btn-edit" 
                            data-id="{{ $facility->id }}"
                            data-name="{{ $facility->name }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <form action="{{ route('admin.facilities.delete', $facility->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')" style="flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete" style="width: 100%; justify-content: center;">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 40px; color: var(--text-dim);">
                Belum ada fasilitas.
            </div>
            @endforelse
        </div>
    </div>

    @if ($errors->any())
    <div style="background: rgba(231, 76, 60, 0.2); border-left: 4px solid #e74c3c; padding: 15px; margin-bottom: 20px; border-radius: 8px; color: white;">
        <strong><i class="fas fa-exclamation-circle"></i> Terjadi Kesalahan:</strong>
        <ul style="margin: 5px 0 0 20px; padding: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Modal Tambah/Edit Fasilitas -->
    <div class="modal-overlay" id="facilityModal">
        <div class="modal-content glass-panel">
            <div class="modal-header">
                <h3 id="modalTitle">Tambah Fasilitas</h3>
                <button class="close-modal" id="btnCloseModal">&times;</button>
            </div>
            <form id="facilityForm" action="{{ route('admin.facilities.store') }}" method="POST" class="admin-form" enctype="multipart/form-data">
                @csrf
                <div id="methodField"></div>
                <div class="form-grid">
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="name" id="in_name" placeholder="Contoh: WiFi Gratis" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="btnCancel">Batal</button>
                    <button type="submit" class="btn-save" id="btnSubmit">Simpan Fasilitas</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    const modal = document.getElementById('facilityModal');
    const facilityForm = document.getElementById('facilityForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodField = document.getElementById('methodField');
    const btnSubmit = document.getElementById('btnSubmit');
    const btnAdd = document.getElementById('btnAddFacility');
    const btnClose = document.getElementById('btnCloseModal');
    const btnCancel = document.getElementById('btnCancel');

    const inName = document.getElementById('in_name');

    // Handle Add Modal
    btnAdd.onclick = () => {
        modalTitle.innerText = 'Tambah Fasilitas';
        btnSubmit.innerText = 'Simpan Fasilitas';
        facilityForm.action = "{{ route('admin.facilities.store') }}";
        methodField.innerHTML = '';
        facilityForm.reset();
        modal.classList.add('active');
    };

    // Handle Edit Modal
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.onclick = () => {
            const id = btn.dataset.id;
            modalTitle.innerText = 'Edit Fasilitas';
            btnSubmit.innerText = 'Perbarui Fasilitas';
            facilityForm.action = `/admin/facilities/${id}`;
            methodField.innerHTML = '@method("PUT")';
            
            inName.value = btn.dataset.name;
            
            modal.classList.add('active');
        };
    });

    btnClose.onclick = () => modal.classList.remove('active');
    btnCancel.onclick = () => modal.classList.remove('active');

    window.onclick = (event) => {
        if (event.target == modal) {
            modal.classList.remove('active');
        }
    }
</script>
@endpush
