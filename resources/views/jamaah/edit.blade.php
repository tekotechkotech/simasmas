@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Edit Data Jamaah</h3>
                <p class="text-muted mb-0">Ubah informasi jamaah</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('jamaah.update', $jamaah->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ $jamaah->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">No. HP / WhatsApp</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $jamaah->no_hp }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="2">{{ $jamaah->alamat }}</textarea>
                            </div>
                            <div class="row border-bottom pb-4 mb-4">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="form-label fw-semibold">RT</label>
                                    <input type="text" name="rt" class="form-control" value="{{ $jamaah->rt }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">RW</label>
                                    <input type="text" name="rw" class="form-control" value="{{ $jamaah->rw }}">
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('jamaah.index') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection