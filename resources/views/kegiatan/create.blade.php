@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Tambah Kegiatan Baru</h3>
                <p class="text-muted mb-0">Jadwalkan kegiatan masjid</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('kegiatan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Kegiatan</label>
                                <input type="text" name="judul" class="form-control"
                                    placeholder="Contoh: Pengajian Rutin Ahad Pagi" required>
                                @error('judul')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3"
                                    placeholder="Informasi tambahan terkait kegiatan..."></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                    @error('tanggal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Waktu</label>
                                    <input type="time" name="waktu" class="form-control">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control"
                                    placeholder="Contoh: Ruang Utama Masjid">
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Kegiatan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection