<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;



class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        return view('admin.barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah_barang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sampah' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        Barang::create($request->all());

        return redirect('/barang')->with('status', 'Data Barang Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.edit_barang',
        [
            'title' => 'Edit Barang',
            'barang' => Barang::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Barang::where('id', $id)
            ->update([
                'nama_sampah' => $request->nama_sampah,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ]);
        return redirect('/barang')->with('status', 'Data Barang Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect('/barang')->with('status', 'Data Barang Warga Berhasil Dihapus!');
    }
}
