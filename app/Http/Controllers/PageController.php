<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bazooka;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function senjatas()
    {
        $bazookas = Bazooka::orderBy('id', 'desc')->get();
        return view('senjatas', ['key' => 'bazooka', 'senjatas' => $bazookas]);
    }

    public function formAddBazooka()
    {
        return view('form-add', ['key' => 'bazooka']);
    }

    public function saveBazooka(Request $request)
    {
        $validatedData = $request->validate([
            'nama_senjata' => 'required|string',
            'jenis_senjata' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file_name = time() . '-' . $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('fotos', $file_name, 'public');

        Bazooka::create([
            'nama_senjata' => $validatedData['nama_senjata'],
            'jenis_senjata' => $validatedData['jenis_senjata'],
            'jumlah' => $validatedData['jumlah'],
            'harga' => $validatedData['harga'],
            'foto' => $path,
        ]);

        return redirect('/bazooka')->with('alert', 'Data berhasil disimpan');
    }

    public function editBazooka($id)
    {
        $bazooka = Bazooka::findOrFail($id);
        return view('edit-form', ['bazooka' => $bazooka]);
    }

    public function updateBazooka(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_senjata' => 'required|string',
            'jenis_senjata' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $bazooka = Bazooka::findOrFail($id);
        $bazooka->nama_senjata = $validatedData['nama_senjata'];
        $bazooka->jenis_senjata = $validatedData['jenis_senjata'];
        $bazooka->jumlah = $validatedData['jumlah'];
        $bazooka->harga = $validatedData['harga'];

        if ($request->hasFile('foto')) {
            $file_name = time() . '-' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('fotos', $file_name, 'public');
            $bazooka->foto = $path;
        }

        $bazooka->save();

        return redirect('/bazooka')->with('alert', 'Data berhasil diperbarui');
    }

    public function deleteBazooka($id)
    {
        $bazooka = Bazooka::findOrFail($id);

        if ($bazooka->foto) {
            Storage::delete('public/' . $bazooka->foto);
        }

        $bazooka->delete();

        return redirect('/bazooka')->with('success', 'Data berhasil dihapus');
    }
}
