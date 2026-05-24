@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4 align-items-center">
            <div class="col-12 col-md-auto me-auto mb-3 mb-md-0">
                <h3 class="fw-bold mb-1 text-dark">Inventaris Masjid</h3>
                <p class="text-muted mb-0">Daftar aset dan inventaris barang</p>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2">
                <a href="{{ route('inventaris.create') }}" class="btn btn-primary shadow-sm"><i
                        class="fas fa-plus me-2"></i>Tambah Barang</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3">Nama Barang / Aset</th>
                                <th class="py-3 text-center">Jumlah</th>
                                <th class="py-3 text-center">Kondisi</th>
                                <th class="px-4 py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inventaris as $item)
                                <tr>
                                    <td class="px-4 py-3 fw-bold">{{ $item->nama }}</td>
                                    <td class="py-3 text-center">
                                        <span class="badge bg-secondary rounded-pill px-3 py-2">{{ $item->jumlah }}</span>
                                    </td>
                                    <td class="py-3 text-center">
                                        @if($item->kondisi == 'Baik')
                                            <span
                                                class="badge bg-success-subtle text-success border border-success-subtle">Baik</span>
                                        @elseif($item->kondisi == 'Rusak Ringan')
                                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Rusak
                                                Ringan</span>
                                        @else
                                            <span
                                                class="badge bg-danger-subtle text-danger border border-danger-subtle">{{ $item->kondisi }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <a href="{{ route('inventaris.edit', $item->id) }}"
                                            class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger"
                                                onclick="return confirm('Hapus aset ini?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data inventaris.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection