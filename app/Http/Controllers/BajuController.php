<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;

class BajuController extends Controller
{

    public function create()
    {
        return view('admin.createBaju');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'image' => 'required|image',
            'harga' => 'required|numeric'
        ]);

        $imageName = time().'.'.$request->file('image')->extension();  
        $request->file('image')->move(public_path('images/baju'), $imageName);

        $baju = new Baju();
        $baju->nama = $request->nama;
        $baju->gambar = $imageName;
        $baju->harga = $request->harga;
        $baju->save();

        return redirect()->route('manage.items')->with('success', 'Baju has been added successfully.');
    }

    public function edit($id)
    {
        $baju = Baju::findOrFail($id);
        return view('admin.editBaju', compact('baju'));
    }

    public function update(Request $request, $id){
    $request->validate([
        'nama' => 'required',
        'image' => 'image|nullable', // Make image nullable in case it is not updated
        'harga' => 'required|numeric',
    ]);

    $baju = Baju::findOrFail($id);
    $baju->nama = $request->nama;
    $baju->harga = $request->harga;

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($baju->gambar) {
            $oldImagePath = public_path('images/baju') . '/' . $baju->gambar;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload the new image
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images/baju'), $imageName);
        $baju->gambar = $imageName;
    }

    $baju->save();

    return redirect()->route('manage.items')->with('success', 'Baju has been updated successfully.');
}


}
