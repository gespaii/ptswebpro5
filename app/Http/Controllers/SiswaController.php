<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

//Nafisa Naylal 
class SiswaController extends Controller
{
    public function index()
    {
        $siswas=Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswas.create');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'gender' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswas.index')->with('success','Berhasil Menambahkan.');
    }

    public function edit(Siswa $siswa) 
    {
        return view('siswas.edit', compact('siswa'));
    }

    public function update(Request $request, Product $product)

    {
        $request->validate([
            'siswas' => 'required',
            'gender' => 'required',
        ]);

        $siswa->update($request->all());
        return redirect()->route('siswas.index')->with('success','Berhasil Di Update');

    }

    public function destroy(Siswa $siswa) 
    {
        $siswa->delete();
        return redirect()->route('siswas.index')->with('success', 'Kelas Berhasil dihapus');
    }
}
