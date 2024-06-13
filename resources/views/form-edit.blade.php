@extends('layouts.main')
@section('title', 'Form Edit Senjata')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <!-- FORM EDIT SENJATA DISINI -->
            <form action="{{ route('bazooka.update', ['id' => $bazooka->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama Senjata</label>
                    <input type="text" name="nama_senjata" class="form-control" value="{{ $bazooka->nama_senjata }}" required>
                </div>
                <div class="form-group">
                    <label>Jenis Senjata</label>
                    <input type="text" name="jenis_senjata" class="form-control" value="{{ $bazooka->jenis_senjata }}" required>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $bazooka->jumlah }}" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $bazooka->harga }}" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control-file">
                </div>
                <div class="form-group">
                    <img src="{{ asset('storage/' . $bazooka->foto) }}" alt="Foto Senjata" width="100">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection




