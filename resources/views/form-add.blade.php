@extends('layouts.main')
@section('title', 'Tambah Senjata')
@section('artikel')
    <h1>Tambah Senjata</h1>
    @if (session('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form action="{{ route('bazooka.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_senjata">Nama Senjata:</label>
            <input type="text" class="form-control" id="nama_senjata" name="nama_senjata">
        </div>
        <div class="form-group">
            <label for="jenis_senjata">Jenis Senjata:</label>
            <select class="form-control" id="jenis_senjata" name="jenis_senjata">
                <option value="Sniper">Sniper</option>
                <option value="Shotgun">Shotgun</option>
                <option value="Pistol">Pistol</option>
                <option value="Assault Rifles">Assault Rifles</option>
                <option value="Sub Machine Guns">Sub Machine Guns</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah">
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga">
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    </form>
@endsection
