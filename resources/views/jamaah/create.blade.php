@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Tambah Data Jamaah</h3>
                <p class="text-muted mb-0">Masukkan informasi jamaah baru</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('jamaah.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Contoh: Abdullah" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">No. HP / WhatsApp</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="08123456789">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="2"
                                    placeholder="Nama Jalan, Blok, dll..."></textarea>
                            </div>
                            <div class="row border-bottom pb-4 mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="form-label fw-semibold">RT</label>
                                    <input type="text" name="rt" class="form-control" placeholder="001">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">RW</label>
                                    <input type="text" name="rw" class="form-control" placeholder="002">
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('jamaah.index') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection