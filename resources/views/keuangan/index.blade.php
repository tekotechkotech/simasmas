@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4 align-items-center">
            <div class="col-12 col-md-auto me-auto mb-3 mb-md-0">
                <h3 class="fw-bold mb-1 text-dark">Data Keuangan</h3>
                <p class="text-muted mb-0">Rekapitulasi pemasukan dan pengeluaran kas masjid</p>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2">
                <a href="{{ route('keuangan.create', ['jenis' => 'pemasukan']) }}" class="btn btn-success shadow-sm"><i
                        class="fas fa-plus me-2"></i>Pemasukan</a>
                <a href="{{ route('keuangan.create', ['jenis' => 'pengeluaran']) }}" class="btn btn-danger shadow-sm"><i
                        class="fas fa-minus me-2"></i>Pengeluaran</a>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted fw-semibold mb-1" style="font-size: 0.85rem;">Total Saldo Saat Ini</p>
                                <h3 class="fw-bold mb-0 text-primary">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</h3>
                            </div>
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-wallet fs-5"></i>
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
                                <p class="text-muted fw-semibold mb-1" style="font-size: 0.85rem;">Pemasukan (Bulan Ini)</p>
                                <h3 class="fw-bold mb-0 text-success">Rp
                                    {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</h3>
                            </div>
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-arrow-down fs-5"></i>
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
                                <p class="text-muted fw-semibold mb-1" style="font-size: 0.85rem;">Pengeluaran (Bulan Ini)
                                </p>
                                <h3 class="fw-bold mb-0 text-danger">Rp
                                    {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}</h3>
                            </div>
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 48px; height: 48px;">
                                <i class="fas fa-arrow-up fs-5"></i>
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
                                <th class="py-3">Jenis</th>
                                <th class="py-3">Kategori</th>
                                <th class="py-3">Keterangan</th>
                                <th class="py-3 text-end">Nominal</th>
                                <th class="px-4 py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($keuangans as $keuangan)
                                <tr>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($keuangan->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3">
                                        @if($keuangan->jenis == 'pemasukan')
                                            <span class="badge bg-success-subtle text-success">Pemasukan</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger">Pengeluaran</span>
                                        @endif
                                    </td>
                                    <td class="py-3">{{ ucwords(str_replace('_', ' ', $keuangan->kategori)) }}</td>
                                    <td class="py-3">{{ $keuangan->keterangan ?? '-' }}</td>
                                    <td
                                        class="py-3 text-end fw-bold {{ $keuangan->jenis == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                        {{ $keuangan->jenis == 'pemasukan' ? '+' : '-' }}Rp
                                        {{ number_format($keuangan->nominal, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <a href="{{ route('keuangan.edit', $keuangan->id) }}" class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger"
                                                onclick="return confirm('Batalkan transaksi ini?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection