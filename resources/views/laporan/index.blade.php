@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4 align-items-center">
            <div class="col-12 col-md-auto me-auto mb-3 mb-md-0">
                <h3 class="fw-bold mb-1 text-dark">Laporan Keuangan</h3>
                <p class="text-muted mb-0">Generate dan unduh laporan transaksi bulanan</p>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2">
                <a href="{{ route('laporan.create') }}" class="btn btn-primary shadow-sm"><i
                        class="fas fa-plus me-2"></i>Buat Laporan Baru</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3">Nama Laporan</th>
                                <th class="py-3">Bulan/Tahun</th>
                                <th class="py-3">Dibuat Pada</th>
                                <th class="px-4 py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($laporans as $laporan)
                                <tr>
                                    <td class="px-4 py-3 fw-bold">{{ $laporan->judul }}</td>
                                    <td class="py-3">{{ str_pad($laporan->bulan, 2, '0', STR_PAD_LEFT) }} /
                                        {{ $laporan->tahun }}
                                    </td>
                                    <td class="py-3">{{ \Carbon\Carbon::parse($laporan->generated_at)->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <a href="{{ route('laporan.pdf', $laporan->id) }}" target="_blank"
                                            class="btn btn-sm btn-light text-danger me-1" title="Unduh PDF"><i
                                                class="fas fa-file-pdf"></i></a>
                                        <a href="{{ route('laporan.excel', $laporan->id) }}" target="_blank"
                                            class="btn btn-sm btn-light text-success me-1" title="Unduh Excel"><i
                                                class="fas fa-file-excel"></i></a>
                                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger"
                                                onclick="return confirm('Hapus record laporan ini?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada riwayat laporan yang
                                        di-generate.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection