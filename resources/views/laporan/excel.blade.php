<table>
    <thead>
        <tr>
            <th colspan="5" style="text-align: center; font-weight: bold; font-size: 14pt;">{{ $masjid->name ?? 'SIMASMAS' }}</th>
        </tr>
        <tr>
            <th colspan="5" style="text-align: center; font-weight: bold; font-size: 12pt;">{{ $laporan->judul }}</th>
        </tr>
        <tr>
            <th colspan="5"></th>
        </tr>
        <tr>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">No</th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">Tanggal</th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">Keterangan</th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">Pemasukan (Rp)</th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">Pengeluaran (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $totalMasuk = 0;
            $totalKeluar = 0;
            $no = 1;
        @endphp

        @foreach($keuangans as $trans)
            @php 
                if($trans->jenis == 'pemasukan') $totalMasuk += $trans->nominal;
                else $totalKeluar += $trans->nominal;
            @endphp
            <tr>
                <td style="border: 1px solid #000; text-align: center;">{{ $no++ }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ \Carbon\Carbon::parse($trans->tanggal)->format('d/m/Y') }}</td>
                <td style="border: 1px solid #000;">{{ ucwords(str_replace('_', ' ', $trans->kategori)) }} - {{ $trans->keterangan }}</td>
                <td style="border: 1px solid #000; text-align: right;">{{ $trans->jenis == 'pemasukan' ? $trans->nominal : 0 }}</td>
                <td style="border: 1px solid #000; text-align: right;">{{ $trans->jenis == 'pengeluaran' ? $trans->nominal : 0 }}</td>
            </tr>
        @endforeach
        
        <tr>
            <td colspan="3" style="border: 1px solid #000; text-align: right; font-weight: bold;">TOTAL BULAN INI</td>
            <td style="border: 1px solid #000; text-align: right; font-weight: bold;">{{ $totalMasuk }}</td>
            <td style="border: 1px solid #000; text-align: right; font-weight: bold;">{{ $totalKeluar }}</td>
        </tr>
        <tr>
            <td colspan="3" style="border: 1px solid #000; text-align: right; font-weight: bold;">SALDO AKHIR BULAN INI</td>
            <td colspan="2" style="border: 1px solid #000; text-align: center; font-weight: bold;">{{ $totalMasuk - $totalKeluar }}</td>
        </tr>
    </tbody>
</table>
