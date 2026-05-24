@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Edit Transaksi {{ ucfirst($jenis) }}</h3>
                <p class="text-muted mb-0">Ubah data kas dan keuangan masjid</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nominal (Rp)</label>
                                <input type="number" name="nominal" class="form-control fs-5"
                                    value="{{ floor($keuangan->nominal) }}" min="1" required>
                                @error('nominal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Kategori</label>
                                    <select name="kategori" class="form-select">
                                        <option value="infaq_jumat" {{ $keuangan->kategori == 'infaq_jumat' ? 'selected' : '' }}>Infaq Jumat</option>
                                        <option value="infaq_umum" {{ $keuangan->kategori == 'infaq_umum' ? 'selected' : '' }}>Infaq Umum</option>
                                        <option value="sedekah" {{ $keuangan->kategori == 'sedekah' ? 'selected' : '' }}>
                                            Sedekah</option>
                                        <option value="zakat" {{ $keuangan->kategori == 'zakat' ? 'selected' : '' }}>Zakat
                                        </option>
                                        <option value="operasional" {{ $keuangan->kategori == 'operasional' ? 'selected' : '' }}>Operasional / Belanja</option>
                                        <option value="pembangunan" {{ $keuangan->kategori == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                                        <option value="lainnya" {{ $keuangan->kategori == 'lainnya' ? 'selected' : '' }}>
                                            Lain-lain</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $keuangan->tanggal }}"
                                        required>
                                    @error('tanggal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Keterangan / Catatan</label>
                                <textarea name="keterangan" class="form-control"
                                    rows="3">{{ $keuangan->keterangan }}</textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('keuangan.index') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection