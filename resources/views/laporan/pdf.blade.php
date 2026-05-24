<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $laporan->judul }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .title { font-size: 18px; font-weight: bold; text-transform: uppercase; margin: 0; }
        .subtitle { font-size: 14px; margin: 5px 0; }
        .address { font-size: 11px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-transform: uppercase; font-size: 11px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .fw-bold { font-weight: bold; }
        .text-success { color: green; }
        .text-danger { color: red; }
        .footer { margin-top: 50px; text-align: right; }
        .ttd { width: 200px; float: right; text-align: center;}
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">{{ $masjid->name ?? 'SIMASMAS' }}</h1>
        <p class="subtitle">{{ $laporan->judul }}</p>
        <p class="address">{{ $masjid->alamat ?? 'Alamat Belum Diatur' }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="35%">Keterangan</th>
                <th width="20%" class="text-right">Pemasukan (Rp)</th>
                <th width="20%" class="text-right">Pengeluaran (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $totalMasuk = 0;
                $totalKeluar = 0;
                $no = 1;
            @endphp

            @forelse($keuangans as $trans)
                @php 
                    if($trans->jenis == 'pemasukan') $totalMasuk += $trans->nominal;
                    else $totalKeluar += $trans->nominal;
                @endphp
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ \Carbon\Carbon::parse($trans->tanggal)->format('d/m/Y') }}</td>
                    <td>
                        <span class="fw-bold">{{ ucwords(str_replace('_', ' ', $trans->kategori)) }}</span><br>
                        {{ $trans->keterangan }}
                    </td>
                    <td class="text-right text-success">
                        {{ $trans->jenis == 'pemasukan' ? number_format($trans->nominal, 0, ',', '.') : '-' }}
                    </td>
                    <td class="text-right text-danger">
                        {{ $trans->jenis == 'pengeluaran' ? number_format($trans->nominal, 0, ',', '.') : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada transaksi di bulan ini.</td>
                </tr>
            @endforelse
            
            <tr>
                <td colspan="3" class="text-right fw-bold">TOTAL BULAN INI</td>
                <td class="text-right fw-bold text-success">{{ number_format($totalMasuk, 0, ',', '.') }}</td>
                <td class="text-right fw-bold text-danger">{{ number_format($totalKeluar, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right fw-bold">SALDO AKHIR BULAN INI</td>
                <td colspan="2" class="text-center fw-bold" style="font-size: 14px;">Rp {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <div class="ttd">
            <p>Mengetahui,</p>
            <br><br><br>
            <p class="fw-bold">_________________________</p>
            <p>Pengurus / Bendahara</p>
        </div>
    </div>
</body>
</html>
