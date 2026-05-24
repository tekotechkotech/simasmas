@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Profil Masjid</h3>
                <p class="text-muted mb-0">Ubah informasi identitas dan detail masjid Anda</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Masjid</label>
                                <input type="text" name="name" class="form-control" value="{{ $masjid->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3">{{ $masjid->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kontak / No Telepon</label>
                                <input type="text" name="kontak" class="form-control" value="{{ $masjid->kontak }}"
                                    placeholder="Contoh: 08123456789">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Visi</label>
                                    <textarea name="visi" class="form-control" rows="4"
                                        placeholder="Tuliskan visi masjid...">{{ $masjid->visi }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Misi</label>
                                    <textarea name="misi" class="form-control" rows="4"
                                        placeholder="Tuliskan misi masjid...">{{ $masjid->misi }}</textarea>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Logo Masjid (Opsional)</label>
                                <input type="file" name="logo" class="form-control" accept="image/*">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah logo.</small>
                                @if($masjid->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $masjid->logo) }}" alt="Logo Masjid"
                                            class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan
                                    Profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection