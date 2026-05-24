@extends('layouts.app')

@push('styles')
<style>
    .widget-icon-box {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }
    .text-indigo { color: #4f46e5; }
    .bg-indigo-light { background-color: #e0e7ff; }
    .text-emerald { color: #10b981; }
    .bg-emerald-light { background-color: #d1fae5; }
    .text-amber { color: #f59e0b; }
    .bg-amber-light { background-color: #fef3c7; }
    .text-sky { color: #0ea5e9; }
    .bg-sky-light { background-color: #e0f2fe; }
    
    .btn-light-action {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-weight: 500;
        transition: all 0.2s;
    }
    .btn-light-action:hover {
        background-color: #f1f5f9;
        color: #1e293b;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .table th { font-weight: 600; color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .table td { vertical-align: middle; color: #334155; }
</style>
@endpush

@section('content')
<div class="container-fluid p-0">
    <!-- Page Header -->
    <div class="row mb-4 align-items-center">
        <div class="col-12 col-md-auto me-auto mb-3 mb-md-0">
            <h3 class="fw-bold mb-1 text-dark">Dashboard</h3>
            <p class="text-muted mb-0">Ringkasan informasi Sistem Informasi Manajemen Masjid</p>
        </div>
        <div class="col-12 col-md-auto d-flex gap-2">
            <button class="btn btn-primary shadow-sm"><i class="fas fa-plus me-2"></i>Tambah Kegiatan</button>
        </div>
    </div>

    <!-- Stats Widgets -->
    <div class="row">
        <!-- Kas Widget -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1" style="font-size: 0.875rem;">Total Kas Masjid</p>
                            <h3 class="fw-bold mb-0 text-dark">Rp 0</h3>
                        </div>
                        <div class="widget-icon-box bg-emerald-light text-emerald">
                            <i class="fas fa-wallet fs-5"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-emerald-light text-emerald rounded-pill"><i class="fas fa-arrow-up me-1"></i>0%</span>
                        <span class="text-muted small ms-1">Bulan ini</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kegiatan Widget -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1" style="font-size: 0.875rem;">Kegiatan Bulan Ini</p>
                            <h3 class="fw-bold mb-0 text-dark">0</h3>
                        </div>
                        <div class="widget-icon-box bg-indigo-light text-indigo">
                            <i class="fas fa-calendar-check fs-5"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-decoration-none small text-indigo fw-medium">Lihat Kalender <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jamaah Widget -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1" style="font-size: 0.875rem;">Total Jamaah Terdaftar</p>
                            <h3 class="fw-bold mb-0 text-dark">0</h3>
                        </div>
                        <div class="widget-icon-box bg-sky-light text-sky">
                            <i class="fas fa-users fs-5"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-sky-light text-sky rounded-pill"><i class="fas fa-plus me-1"></i>0</span>
                        <span class="text-muted small ms-1">Minggu ini</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventaris Widget -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <p class="text-muted fw-semibold mb-1" style="font-size: 0.875rem;">Aset & Inventaris</p>
                            <h3 class="fw-bold mb-0 text-dark">0 <span class="fs-6 fw-normal text-muted">Item</span></h3>
                        </div>
                        <div class="widget-icon-box bg-amber-light text-amber">
                            <i class="fas fa-boxes fs-5"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-decoration-none small text-amber fw-medium">Cek Kondisi Barang <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-3">Jalan Pintas</h6>
                    <div class="d-flex flex-wrap gap-2 gap-md-3">
                        <button class="btn btn-light-action px-3 py-2 rounded-3"><i class="fas fa-hand-holding-usd text-emerald me-2"></i>Terima Infaq</button>
                        <button class="btn btn-light-action px-3 py-2 rounded-3"><i class="fas fa-file-invoice-dollar text-danger me-2"></i>Catat Pengeluaran</button>
                        <button class="btn btn-light-action px-3 py-2 rounded-3"><i class="fas fa-user-plus text-sky me-2"></i>Daftar Jamaah</button>
                        <button class="btn btn-light-action px-3 py-2 rounded-3"><i class="fas fa-bullhorn text-indigo me-2"></i>Buat Pengumuman</button>
                        <button class="btn btn-light-action px-3 py-2 rounded-3"><i class="fas fa-print text-muted me-2"></i>Cetak Laporan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column: Jadwal Kegiatan -->
        <div class="col-xl-8 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-dark mb-0">Kegiatan Terdekat</h6>
                    <a href="#" class="btn btn-sm btn-link text-decoration-none px-0">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-calendar-times fs-2 text-muted"></i>
                        </div>
                        <h6 class="fw-semibold text-dark">Belum ada kegiatan</h6>
                        <p class="text-muted small mb-4">Tambahkan kegiatan untuk menampilkan jadwal di sini.</p>
                        <button class="btn btn-outline-primary btn-sm rounded-pill px-4">Buat Kegiatan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Riwayat Kas -->
        <div class="col-xl-4 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold text-dark mb-0">Transaksi Kas Terakhir</h6>
                </div>
                <div class="card-body p-0">
                    <!-- Empty State -->
                    <div class="text-center py-5 px-3">
                        <i class="fas fa-receipt fs-1 text-muted opacity-50 mb-3"></i>
                        <p class="text-muted small">Transaksi keuangan yang dicatat akan muncul di daftar ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
