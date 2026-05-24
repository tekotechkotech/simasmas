@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Edit Kegiatan</h3>
                <p class="text-muted mb-0">Ubah jadwal kegiatan masjid</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Judul Kegiatan</label>
                                <input type="text" name="judul" class="form-control" value="{{ $kegiatan->judul }}"
                                    required>
                                @error('judul')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control"
                                    rows="3">{{ $kegiatan->deskripsi }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $kegiatan->tanggal }}"
                                        required>
                                    @error('tanggal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Waktu</label>
                                    <input type="time" name="waktu" class="form-control" value="{{ $kegiatan->waktu }}">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" value="{{ $kegiatan->lokasi }}">
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection