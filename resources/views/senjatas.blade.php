@extends('layouts.main')
@section('title', 'Senjata')
@section('artikel')
    <h1>Senjata</h1>
    <div class="card">
        <div class="card-header">
            <a href="/bazooka/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah Senjata</a>
        </div>
        <div class="card-body">
            @if (session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Senjata</th>
                        <th>Jenis Senjata</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($senjatas as $index => $senjata)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $senjata->nama_senjata }}</td>
                            <td>{{ $senjata->jenis_senjata }}</td>
                            <td>{{ $senjata->jumlah }}</td>
                            <td>{{ $senjata->harga }}</td>
                            <td><img src="{{ asset('storage/' . $senjata->foto) }}" alt="{{ $senjata->nama_senjata }}" width="100"></td>
                            <td>
                                <a href="{{ route('bazooka.edit', ['id' => $senjata->id]) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('bazooka.delete', ['id' => $senjata->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
