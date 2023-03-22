<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\logAc;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('admin.warga',[
        //     "warga"=>Warga::all(),
        // ]);
        $warga = warga::all();

               //menyiapkan data untuk chart
        // $categories = [];
        // foreach ($warga as $warga) {
        //     $categories[] = $warga->alamat;
        // }

        // dd(($categories));

        $data['search'] = $request->query('search');
        $data['nik'] = $request->query('nik');
        $data['nama'] = $request->query('nama');
        $data['alamat'] = $request->query('alamat');
        $data['no_telp'] = $request->query('no_telp');

        $query = DB::table('wargas');

        if ($data['search']) {
            $query->where(function($q) use($data) {
                $q->where('nik', 'like', '%'.$data['search'].'%');
                $q->orWhere('nama', 'like', '%'.$data['search'].'%');
                $q->orWhere('alamat', 'like', '%'.$data['search'].'%');
                $q->orWhere('no_telp', 'like', '%'.$data['search'].'%');
            });
        }

        if ($data['nik']) {
            $query->where('nik', '=', $data['nik']);
        }

        if ($data['nama']) {
            $query->where('nama', 'like', '%'.$data['nama'].'%');
        }

        if ($data['alamat']) {
            $query->where('alamat', 'like', '%'.$data['alamat'].'%');
        }

        if ($data['no_telp']) {
            $query->where('no_telp', '=', $data['no_telp']);
        }

        $data['warga'] = $query->paginate(10)->appends(request()->query());


        return view('admin.warga', $data,compact('warga'));

 

    }

    public function export(){
        return view("admin.cetakExcel",[
            "warga"=>Warga::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah_warga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nik' => 'required',
    //         'nama' => 'required',
    //         'alamat' => 'required',
    //         'no_telp' => 'required',
    //     ]);

    //     Warga::create($request->all());

    //     $dt = Carbon::now();
    //     $todayDate = $dt->toDayDateTimeString();
    //     if($data->save()){
    //         $activityLog = [
    //             'activity'=>'data " '.$request->nama.' " ditambahkan',
    //             'date'=>$todayDate
    //         ];
    //         DB::table('log_acs')->insert($activityLog);
    //         return redirect('/warga')->with('status', 'Data Warga Berhasil Ditambahkan!');
    //     }

    //     // return redirect('/warga')->with('status', 'Data Warga Berhasil Ditambahkan!');

        
    // }

    public function store(Request $request)
{
    $request->validate([
        'nik' => 'required',
        'nama' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
    ]);

    $warga = Warga::create($request->all());

    $dt = Carbon::now();
    $todayDate = $dt->toDayDateTimeString();
    $activityLog = [
        'activity'=>'data " '.$request->nama.' " ditambahkan',
        'date'=>$todayDate
    ];
    DB::table('log_acs')->insert($activityLog);

    return redirect('/warga')->with('status', 'Data Warga Berhasil Ditambahkan!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.edit_warga',
        [
            'title' => 'Edit Warga',
            'warga' => Warga::findOrFail($id)
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
        
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     Warga::where('id', $id)
    //         ->update([
    //             'nik' => $request->nik,
    //             'nama' => $request->nama,
    //             'alamat' => $request->alamat,
    //             'no_telp' => $request->no_telp,
    //         ]);

    //     $dt = Carbon::now();
    //     $todayDate = $dt->toDayDateTimeString();
    //     $data->update($request->except('token', 'submit'));
    //     if ($data->save()){
    //         $activityLog = [
    //             'activity'=>'user mengupdate data',
    //             'date'=>$todayDate
    //         ];
    //         DB::table('log_acs')->insert($activityLog);
    //         return redirect('/warga')->with('success', 'Data Berhasil Diupdate');
    //     }
    //     // return redirect('/warga');
    // }

    public function update(Request $request, $id)
{
    $data = Warga::find($id);

    Warga::where('id', $id)
        ->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

    $dt = Carbon::now();
    $todayDate = $dt->toDayDateTimeString();

    $activityLog = [
        'activity' => 'user mengupdate data',
        'date' => $todayDate
    ];

    DB::table('log_acs')->insert($activityLog);

    return redirect('/warga')->with('success', 'Data Berhasil Diupdate');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Warga::destroy($id);
    //     $dt = Carbon::now();
    //     $todayDate = $dt->toDayDateTimeString();
    //     if ($data->delete()){
    //         DB::table('log_acs')->insert(array(['activity'=>'user menghapus data','date'=>$todayDate]));
    //         return redirect('/warga')->with('success', 'Data Berhasil Dihapus');
    //     }
       
    // }

    public function destroy($id)
{
    $data = Warga::find($id);

    Warga::destroy($id);

    $dt = Carbon::now();
    $todayDate = $dt->toDayDateTimeString();

    DB::table('log_acs')->insert([
        'activity' => 'user menghapus data',
        'date' => $todayDate
    ]);

    return redirect('/warga')->with('success', 'Data Berhasil Dihapus');
}

    public function viewactivity()
    {   
        $activity = logAc::all();
        return view('admin.logAc', compact('activity'));
    }

}
