@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4 align-items-center">
            <div class="col-12 col-md-auto me-auto mb-3 mb-md-0">
                <h3 class="fw-bold mb-1 text-dark">Data Jamaah</h3>
                <p class="text-muted mb-0">Manajemen data jamaah masjid</p>
            </div>
            <div class="col-12 col-md-auto d-flex gap-2">
                <a href="{{ route('jamaah.create') }}" class="btn btn-primary shadow-sm"><i
                        class="fas fa-plus me-2"></i>Tambah Jamaah</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3">Nama Jamaah</th>
                                <th class="py-3">No. HP</th>
                                <th class="py-3">Alamat</th>
                                <th class="py-3">RT/RW</th>
                                <th class="px-4 py-3 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jamaahs as $jamaah)
                                <tr>
                                    <td class="px-4 py-3 fw-bold">{{ $jamaah->nama }}</td>
                                    <td class="py-3">{{ $jamaah->no_hp ?? '-' }}</td>
                                    <td class="py-3">{{ $jamaah->alamat ?? '-' }}</td>
                                    <td class="py-3">{{ $jamaah->rt ?? '-' }} / {{ $jamaah->rw ?? '-' }}</td>
                                    <td class="px-4 py-3 text-end">
                                        <a href="{{ route('jamaah.edit', $jamaah->id) }}"
                                            class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('jamaah.destroy', $jamaah->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger"
                                                onclick="return confirm('Hapus data jamaah ini?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data jamaah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection