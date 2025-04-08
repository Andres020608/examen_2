<?php

namespace App\Http\Controllers;

use App\Models\Joya;
use Illuminate\Http\Request;

class JoyaController extends Controller
{
    public function index()
    {
        $joyas = Joya::all();
        return view('joyas.index', compact('joyas'));
    }

    public function create()
    {
        return view('joyas.create');
    }

    public function store(Request $request)
    {
        Joya::create($request->all());
        return redirect()->route('joyas.index')->with('success', 'Joya agregada al inventario.');
    }

    public function edit(Joya $joya)
    {
        return view('joyas.edit', compact('joya'));
    }

    public function update(Request $request, Joya $joya)
    {
        $joya->update($request->all());
        return redirect()->route('joyas.index')->with('success', 'Joya actualizada.');
    }

    public function destroy(Joya $joya)
    {
        $joya->delete();
        return redirect()->route('joyas.index')->with('success', 'Joya eliminada.');
    }
}
