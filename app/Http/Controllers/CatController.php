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

    public function create()
    {
        return view('cats.create');
    }

    public function store(Request $request)
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

    public function edit($id)
    {
        // dd($id);
        $cat = Cat::find($id);

        return view('cats/edit', [
            'cat' => $cat,
        ]);
    }

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        $cat = Cat::find($id);

        $cat->delete();

        session()->flash('danger', 'Data Iso Dihapus');

        return redirect()->route('cats.index');
    }
}
