@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Manajemen Kas</h2>
                <a href="{{ route('kas.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Transaksi
                </a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h6 class="card-title">Total Pemasukan</h6>
                            <h3>Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h6 class="card-title">Total Pengeluaran</h6>
                            <h3>Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h6 class="card-title">Saldo Kas</h6>
                            <h3>Rp {{ number_format($saldo, 2, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card">
                <div class="card-header">
                    <h5>Daftar Transaksi Kas</h5>
                </div>
                <div class="card-body">
                    @if($kas->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Tipe</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kas as $key => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                @if($item->tipe == 'pemasukan')
                                                    <span class="badge bg-success">Pemasukan</span>
                                                @else
                                                    <span class="badge bg-danger">Pengeluaran</span>
                                                @endif
                                            </td>
                                            <td class="fw-bold">
                                                @if($item->tipe == 'pemasukan')
                                                    <span class="text-success">+Rp {{ number_format($item->jumlah, 2, ',', '.') }}</span>
                                                @else
                                                    <span class="text-danger">-Rp {{ number_format($item->jumlah, 2, ',', '.') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('kas.show', $item->id) }}" class="btn btn-sm btn-info" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('kas.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('kas.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">Belum ada data transaksi kas.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
