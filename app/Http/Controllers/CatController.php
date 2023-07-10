<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

class CatController extends Controller
{
    public function index()
    {
        // dd(Cat::get());
        return view('cats.index', [
            'cats' => Cat::latest()->get(),
        ]);
    }

    public function new()
    {
        return view('cats.new');
    }

    public function isi(Request $request)
    {
        // dd('Iso');
        $this->validate($request, [
            'nama_cat' => ['required'],
            'jenis_cat' => ['required'],
            'umur_cat' => ['required'],
        ],);

        $cat = new Cat();

        $cat->nama_cat = $request->nama_cat;
        $cat->jenis_cat = $request->jenis_cat;
        $cat->umur_cat = $request->umur_cat;

        $cat->save();

        session()->flash('success', 'Data Iso Ditambah');

        return redirect()->route('cats.index');
    }

    public function ubah($id)
    {
        // dd($id);
        $cat = Cat::find($id);

        return view('cats/ubah', [
            'cat' => $cat,
        ]);
    }

    public function berubah(Request $request, $id)
    {
        $this->validate($request, [
            'nama_cat' => ['required'],
            'jenis_cat' => ['required'],
            'umur_cat' => ['required'],
        ],);

        $cat = Cat::find($id);

        $cat->nama_cat = $request->nama_cat;
        $cat->jenis_cat = $request->jenis_cat;
        $cat->umur_cat = $request->umur_cat;

        $cat->save();

        session()->flash('info', 'Data Iso Diubah');

        return redirect()->route('cats.index');
    }

    public function Hapus($id)
    {
        $cat = Cat::find($id);

        $cat->delete();

        session()->flash('danger', 'Data Iso Dihapus');

        return redirect()->route('cats.index');
    }
}
