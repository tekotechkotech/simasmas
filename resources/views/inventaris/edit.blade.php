@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-1 text-dark">Edit Inventaris</h3>
                <p class="text-muted mb-0">Ubah aset barang milik masjid</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Barang</label>
                                <input type="text" name="nama" class="form-control" value="{{ $inventaris->nama }}"
                                    required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control"
                                        value="{{ $inventaris->jumlah }}" min="1" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Kondisi Barang</label>
                                    <select name="kondisi" class="form-select" required>
                                        <option value="Baik" {{ $inventaris->kondisi == 'Baik' ? 'selected' : '' }}>Baik
                                        </option>
                                        <option value="Rusak Ringan" {{ $inventaris->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                        <option value="Rusak Berat" {{ $inventaris->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex gap-2 border-top pt-4">
                                <a href="{{ route('inventaris.index') }}" class="btn btn-light border">Batal</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection