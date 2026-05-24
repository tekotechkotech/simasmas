@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4 align-items-center">
            <div class="col-12 col-md-auto me-auto mb-3 mb-md-0">
                <h3 class="fw-bold mb-1 text-dark">Daftar Kegiatan</h3>
                <p class="text-muted mb-0">Manajemen jadwal kegiatan masjid</p>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2">
                <a href="{{ route('kegiatan.create') }}" class="btn btn-primary shadow-sm"><i
                        class="fas fa-plus me-2"></i>Tambah Kegiatan</a>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted fw-semibold mb-1" style="font-size: 0.85rem;">Total Kegiatan</p>
                                <h3 class="fw-bold mb-0 text-dark">{{ $totalKegiatan }}</h3>
                            </div>
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-list-ul fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted fw-semibold mb-1" style="font-size: 0.85rem;">Kegiatan Mendatang</p>
                                <h3 class="fw-bold mb-0 text-warning">{{ $kegiatanMendatang }}</h3>
                            </div>
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-clock fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted fw-semibold mb-1" style="font-size: 0.85rem;">Kegiatan Selesai</p>
                                <h3 class="fw-bold mb-0 text-success">{{ $kegiatanSelesai }}</h3>
                            </div>
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-check-circle fs-5"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="py-3">Waktu</th>
                                <th class="py-3">Kegiatan</th>
                                <th class="py-3">Lokasi</th>
                                <th class="px-4 py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kegiatans as $kegiatan)
                                <tr>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3">{{ $kegiatan->waktu ?? '-' }}</td>
                                    <td class="py-3">
                                        <div class="fw-bold">{{ $kegiatan->judul }}</div>
                                        @if($kegiatan->deskripsi)
                                            <div class="text-muted small">{{ Str::limit($kegiatan->deskripsi, 50) }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3">{{ $kegiatan->lokasi ?? '-' }}</td>
                                    <td class="px-4 py-3 text-end">
                                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                            class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger"
                                                onclick="return confirm('Hapus kegiatan ini?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data kegiatan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection