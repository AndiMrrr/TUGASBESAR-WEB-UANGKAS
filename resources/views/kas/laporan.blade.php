@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Laporan Kas</h5>
                    <button class="btn btn-sm btn-secondary" onclick="window.print()">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                </div>
                <div class="card-body">
                    <div class="row mb-4 text-center">
                        <div class="col-md-4">
                            <div class="border p-3">
                                <h6>Total Pemasukan</h6>
                                <h4 class="text-success">Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3">
                                <h6>Total Pengeluaran</h6>
                                <h4 class="text-danger">Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border p-3">
                                <h6>Saldo Kas</h6>
                                <h4 class="text-info">Rp {{ number_format($saldo, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>

                    <h5 class="mt-5 mb-3">Daftar Transaksi</h5>
                    
                    @if($kas->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Tanggal</th>
                                        <th style="width: 35%">Keterangan</th>
                                        <th style="width: 10%">Tipe</th>
                                        <th style="width: 20%">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kas as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td class="text-center">
                                                @if($item->tipe == 'pemasukan')
                                                    <span class="badge bg-success">Pemasukan</span>
                                                @else
                                                    <span class="badge bg-danger">Pengeluaran</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                @if($item->tipe == 'pemasukan')
                                                    <span class="text-success">+Rp {{ number_format($item->jumlah, 2, ',', '.') }}</span>
                                                @else
                                                    <span class="text-danger">-Rp {{ number_format($item->jumlah, 2, ',', '.') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">Belum ada data transaksi kas.</div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('kas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        .btn {
            display: none;
        }
        body {
            padding: 0;
            margin: 0;
        }
        .card {
            border: none;
            box-shadow: none;
        }
    }
</style>
@endsection
