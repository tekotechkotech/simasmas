<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login.post');
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'storeRegister'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        $masjidId = auth()->user()->masjid_id;

        $totalKas = \App\Models\Keuangan::where('masjid_id', $masjidId)
            ->selectRaw('SUM(CASE WHEN jenis = "pemasukan" THEN nominal ELSE -nominal END) as total')
            ->value('total') ?? 0;

        $kegiatanBulanIni = \App\Models\Kegiatan::where('masjid_id', $masjidId)
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->count();

        $kegiatanTerdekat = \App\Models\Kegiatan::where('masjid_id', $masjidId)
            ->whereDate('tanggal', '>=', date('Y-m-d'))
            ->orderBy('tanggal', 'asc')
            ->take(5)
            ->get();

        $transaksiTerakhir = \App\Models\Keuangan::where('masjid_id', $masjidId)
            ->orderBy('tanggal', 'desc')
            ->take(5)
            ->get();

        $totalJamaah = \App\Models\Jamaah::where('masjid_id', $masjidId)->count();
        $jamaahBaruMingguIni = \App\Models\Jamaah::where('masjid_id', $masjidId)
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        $totalInventaris = \App\Models\Inventaris::where('masjid_id', $masjidId)->sum('jumlah');

        return view('dashboard', compact('totalKas', 'kegiatanBulanIni', 'kegiatanTerdekat', 'transaksiTerakhir', 'totalJamaah', 'jamaahBaruMingguIni', 'totalInventaris'));
    })->name('dashboard');

    Route::resource('keuangan', \App\Http\Controllers\KeuanganController::class);
    Route::resource('kegiatan', \App\Http\Controllers\KegiatanController::class);
    Route::resource('jamaah', \App\Http\Controllers\JamaahController::class);
    Route::resource('inventaris', \App\Http\Controllers\InventarisController::class);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
