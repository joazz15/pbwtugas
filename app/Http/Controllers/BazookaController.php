<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bazooka;
use Illuminate\Support\Facades\Storage;

class BazookaController extends Controller
{
    // Method untuk menampilkan semua senjata
    public function index()
    {
        // Ambil semua data senjata dari database
        $bazookas = Bazooka::orderBy('id', 'desc')->get();
        
        // Kirim data senjata ke view senjatas.blade.php
        return view('senjatas', ['key' => 'bazooka', 'senjatas' => $bazookas]);
    }

    // Method untuk menampilkan form tambah senjata
    public function createForm()
    {
        // Mengembalikan view form tambah
        return view('form-add');
    }

    // Method untuk menyimpan data senjata baru
    public function store(Request $request)
    {
        // Validasi data yang dikirim oleh form
        $validatedData = $request->validate([
            'nama_senjata' => 'required|string',
            'jenis_senjata' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buat objek Bazooka baru
        $bazooka = new Bazooka;
        $bazooka->nama_senjata = $validatedData['nama_senjata'];
        $bazooka->jenis_senjata = $validatedData['jenis_senjata'];
        $bazooka->jumlah = $validatedData['jumlah'];
        $bazooka->harga = $validatedData['harga'];

        // Jika ada foto yang diunggah, simpan foto baru
        if ($request->hasFile('foto')) {
            $file_name = time() . '-' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('fotos', $file_name, 'public');
            $bazooka->foto = $path;
        }

        // Simpan data Bazooka ke database
        $bazooka->save();

        // Redirect kembali ke halaman senjata dengan pesan sukses
        return redirect('/bazooka')->with('success', 'Data berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit senjata
    public function edit($id)
    {
        // Mengambil data Bazooka dari basis data berdasarkan ID
        $bazooka = Bazooka::find($id);

        // Memastikan Bazooka dengan ID tersebut ditemukan
        if (!$bazooka) {
            // Jika tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan, misalnya dengan redirect ke halaman lain atau menampilkan pesan error.
            abort(404); // Contoh menampilkan error 404 jika data tidak ditemukan
        }

        // Mengirim data Bazooka ke view form edit
        return view('form-edit', compact('bazooka'));
    }

    // Method untuk memperbarui data senjata
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim oleh form
        $validatedData = $request->validate([
            'nama_senjata' => 'required|string',
            'jenis_senjata' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cari data Bazooka berdasarkan ID
        $bazooka = Bazooka::findOrFail($id);

        // Perbarui data Bazooka dengan data yang baru
        $bazooka->nama_senjata = $validatedData['nama_senjata'];
        $bazooka->jenis_senjata = $validatedData['jenis_senjata'];
        $bazooka->jumlah = $validatedData['jumlah'];
        $bazooka->harga = $validatedData['harga'];

        // Jika ada foto yang diunggah, simpan foto baru
        if ($request->hasFile('foto')) {
            $file_name = time() . '-' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('fotos', $file_name, 'public');
            $bazooka->foto = $path;
        }

        // Simpan perubahan data Bazooka
        $bazooka->save();

        // Redirect kembali ke halaman senjata dengan pesan sukses
        return redirect('/bazooka')->with('alert', 'Data berhasil diperbarui');
    }

    // Method untuk menghapus data senjata
    public function destroy($id)
    {
        // Temukan data Bazooka berdasarkan ID
        $bazooka = Bazooka::findOrFail($id);

        // Jika ada foto terkait dengan Bazooka, hapus foto dari storage
        if ($bazooka->foto) {
            Storage::delete('public/' . $bazooka->foto);
        }

        // Hapus data Bazooka dari database
        $bazooka->delete();

        // Redirect kembali ke halaman senjata dengan pesan sukses
        return redirect('/bazooka')->with('success', 'Data berhasil dihapus');
    }
}
