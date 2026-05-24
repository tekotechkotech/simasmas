@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Catat Transaksi {{ ucfirst($jenis) }}</h3>
                <p class="text-muted mb-0">Manajemen kas dan keuangan masjid</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('keuangan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="jenis" value="{{ $jenis }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nominal (Rp)</label>
                                <input type="number" name="nominal" class="form-control fs-5" placeholder="0" min="1"
                                    required>
                                @error('nominal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Kategori</label>
                                    <select name="kategori" class="form-select">
                                        <option value="infaq_jumat">Infaq Jumat</option>
                                        <option value="infaq_umum">Infaq Umum</option>
                                        <option value="sedekah">Sedekah</option>
                                        <option value="zakat">Zakat</option>
                                        <option value="operasional">Operasional / Belanja</option>
                                        <option value="pembangunan">Pembangunan</option>
                                        <option value="lainnya">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}"
                                        required>
                                    @error('tanggal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Keterangan / Catatan</label>
                                <textarea name="keterangan" class="form-control" rows="3"
                                    placeholder="Contoh: Beban listrik bulan ini, Infaq dari hamba Allah, dll..."></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard') }}" class="btn btn-light border">Batal</a>
                                <button type="submit"
                                    class="btn btn-{{ $jenis == 'pemasukan' ? 'success' : 'danger' }} px-4">Simpan
                                    Transaksi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection