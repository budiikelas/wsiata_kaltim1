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
        <table class="modern-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Fasilitas</th>
                    <th>Deskripsi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($facilities as $facility)
                <tr>
                    <td>
                        <div class="facility-preview-img">
                            @if($facility->image)
                                <img src="{{ asset($facility->image) }}" alt="{{ $facility->name }}">
                            @else
                                <div class="placeholder-img"><i class="fas fa-image"></i></div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600;">{{ $facility->name }}</div>
                    </td>
                    <td>
                        <span style="color: var(--text-dim);">{{ Str::limit($facility->description ?? '-', 60) }}</span>
                    </td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-action btn-edit" 
                                    data-id="{{ $facility->id }}"
                                    data-name="{{ $facility->name }}"
                                    data-description="{{ $facility->description }}"
                                    data-image="{{ $facility->image ? asset($facility->image) : '' }}">
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
                    <td colspan="4" style="text-align: center; color: var(--text-dim); padding: 50px;">
                        <i class="fas fa-concierge-bell" style="font-size: 40px; margin-bottom: 15px; display: block; opacity: 0.3;"></i>
                        Belum ada fasilitas. Silakan tambahkan fasilitas baru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Foto Fasilitas</label>
                        <div class="image-upload-wrapper">
                            <div class="image-preview-box" id="imagePreviewBox">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Pilih Foto</span>
                                <img src="" id="imgPreviewTag" style="display: none;">
                            </div>
                            <input type="file" name="image" id="in_image" accept="image/*" style="display: none;">
                            <button type="button" class="btn-upload-trigger" onclick="document.getElementById('in_image').click()">
                                <i class="fas fa-camera"></i> Ganti Foto
                            </button>
                        </div>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Deskripsi</label>
                        <textarea name="description" id="in_description" rows="3" placeholder="Jelaskan fasilitas ini..."></textarea>
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
    .admin-form input, .admin-form textarea {
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 12px;
        color: white;
        font-family: inherit;
        outline: none;
        resize: vertical;
    }
    .admin-form input:focus, .admin-form textarea:focus {
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

    /* PREVIEW IMG TABLE */
    .facility-preview-img {
        width: 80px;
        height: 50px;
        border-radius: 10px;
        overflow: hidden;
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--glass-border);
    }
    .facility-preview-img img { width: 100%; height: 100%; object-fit: cover; }
    .facility-preview-img .placeholder-img { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.2); font-size: 20px; }

    /* IMAGE UPLOAD STYLE */
    .image-upload-wrapper { display: flex; flex-direction: column; gap: 12px; }
    .image-preview-box {
        height: 180px;
        background: rgba(255,255,255,0.03);
        border: 2px dashed var(--glass-border);
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .image-preview-box:hover { border-color: var(--gold-accent); }
    .image-preview-box i { font-size: 32px; color: var(--gold-accent); margin-bottom: 10px; }
    .image-preview-box span { font-size: 12px; color: var(--text-dim); }
    .image-preview-box img { position: absolute; width: 100%; height: 100%; object-fit: cover; }
    .btn-upload-trigger {
        background: rgba(255,255,255,0.05);
        color: white;
        border: 1px solid var(--glass-border);
        padding: 8px 15px;
        border-radius: 10px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
</style>
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
    const inDescription = document.getElementById('in_description');
    const inImage = document.getElementById('in_image');
    const imgPreviewTag = document.getElementById('imgPreviewTag');
    const imagePreviewBox = document.getElementById('imagePreviewBox');

    // Handle Image Preview
    inImage.onchange = (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imgPreviewTag.src = e.target.result;
                imgPreviewTag.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    };

    imagePreviewBox.onclick = () => inImage.click();

    // Handle Add Modal
    btnAdd.onclick = () => {
        modalTitle.innerText = 'Tambah Fasilitas';
        btnSubmit.innerText = 'Simpan Fasilitas';
        facilityForm.action = "{{ route('admin.facilities.store') }}";
        methodField.innerHTML = '';
        facilityForm.reset();
        imgPreviewTag.style.display = 'none';
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
            inDescription.value = btn.dataset.description || '';
            
            if (btn.dataset.image) {
                imgPreviewTag.src = btn.dataset.image;
                imgPreviewTag.style.display = 'block';
            } else {
                imgPreviewTag.style.display = 'none';
            }
            
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
