@extends('layouts.admin')

@section('title', 'Kelola Users')

@section('header_title')
    <h1>Kelola Users</h1>
    <span>Daftar Pengguna Terdaftar</span>
@endsection

@section('content')
    <div class="table-card">
        <div class="card-header">
            <h4>Semua Users</h4>
            <div style="display: flex; align-items: center; gap: 15px;">
                <span style="color: var(--text-dim); font-size: 13px;">Total: {{ $consumers->count() }} pengguna</span>
            </div>
        </div>
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consumers as $consumer)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, var(--gold-accent), #f39c12); display: flex; align-items: center; justify-content: center; font-weight: 700; color: #000;">
                                    {{ strtoupper(substr($consumer->name, 0, 1)) }}
                                </div>
                                <div>{{ $consumer->name }}</div>
                            </div>
                        </td>
                        <td>
                            <span style="color: var(--text-dim);">{{ $consumer->email }}</span>
                        </td>
                        <td>{{ $consumer->created_at->format('d M Y') }}</td>
                        <td>
                            @if($consumer->email_verified_at)
                                <span class="status-badge status-success">Terverifikasi</span>
                            @else
                                <span class="status-badge status-pending">Aktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-btns">
                                <button class="btn-action btn-edit" 
                                        data-id="{{ $consumer->id }}"
                                        data-name="{{ $consumer->name }}"
                                        data-email="{{ $consumer->email }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.consumers.delete', $consumer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus konsumen ini?')">
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
                        <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">
                            <i class="fas fa-users" style="font-size: 40px; margin-bottom: 15px; display: block; opacity: 0.3;"></i>
                            Belum ada konsumen terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit Konsumen -->
    <div class="modal-overlay" id="consumerModal">
        <div class="modal-content glass-panel">
            <div class="modal-header">
                <h3>Edit Users</h3>
                <button class="close-modal" id="btnCloseModal">&times;</button>
            </div>
            <form id="consumerForm" method="POST" class="admin-form">
                @csrf
                @method('PUT')
                <div class="form-grid">
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" id="in_name" placeholder="Nama konsumen" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Email</label>
                        <input type="email" name="email" id="in_email" placeholder="email@contoh.com" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Password Baru <small style="color: var(--text-dim);">(Kosongkan jika tidak ingin mengubah)</small></label>
                        <input type="password" name="password" id="in_password" placeholder="••••••••">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="btnCancel">Batal</button>
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .status-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-success {
        background: rgba(39, 174, 96, 0.15);
        color: #27ae60;
    }
    .status-pending {
        background: rgba(212, 175, 55, 0.15);
        color: var(--gold-accent);
    }
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
        max-width: 500px;
        max-height: 90vh;
        overflow-y: auto;
        background: #111;
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        padding: 30px;
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
    .admin-form input {
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
<script>
    const modal = document.getElementById('consumerModal');
    const consumerForm = document.getElementById('consumerForm');
    const btnClose = document.getElementById('btnCloseModal');
    const btnCancel = document.getElementById('btnCancel');

    const inName = document.getElementById('in_name');
    const inEmail = document.getElementById('in_email');
    const inPassword = document.getElementById('in_password');

    // Handle Edit Modal
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.onclick = () => {
            const id = btn.dataset.id;
            consumerForm.action = `/admin/consumers/${id}`;
            
            inName.value = btn.dataset.name;
            inEmail.value = btn.dataset.email;
            inPassword.value = '';
            
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
