<?php

namespace App\Http\Controllers;


use app\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\Wilayah;
use App\Models\data_sensors;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.lokasi.lokasi',[
           
            'title'=>'Wilayah',
            'lokasis' => Wilayah::latest()->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('admin.lokasi.tambahLokasi',[
            'title'=>'Wilayah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'wilayah' => 'required|max:255',
        ]);

        Wilayah::create($validateData);
        // Wilayah::create([
        //     'wilayah' => $request->wilayah,
        // ]);
        return redirect('admin/lokasi/lokasi')->with('success', 'Lokasi berhasil ditambahkan');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wilayah $wilayah)
    {
        return view('admin.lokasi.edit', [
            "title" => "wilayah",
             "wilayah" => $wilayah
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Wilayah $wilayah)
    {
        $validateData = $request->validate([
            'wilayah' => 'required',
        ]);
        Wilayah::where('id', $wilayah->id)->update($validateData);
        return redirect('/admin/lokasi/lokasi')->with('success','lokasi sekarang sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $lokasi = Wilayah::find($id);
        $lokasi->delete();
        // ContactUs::destroy($contactus->id);
        return redirect('/admin/lokasi/lokasi')->with('success','lokasi sekarang sudah dihapus');
    }
}
