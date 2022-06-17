<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Deskripsi;
use Illuminate\Http\Request;

class AdminDeskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('deskripsis')->orderBy('id', 'desc')->get();\
        // if(auth()->guest()){
        //     abort(403);
        // }
        // if(auth()->user()->role !== '1'){
        //     abort(403);
        // }
        return view('admin.deskripsi.deskripsi', [
            'title'=>'deskripsi',
            'deskripsi' =>  Deskripsi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        Deskripsi::create($validateData);
        return redirect('/admin/deskripsi/deskripsi')->with('success','deskripi sekarang sudah ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function show(Deskripsi $deskripsi)
    {
         return view('admin.deskripsi.show', [
             "title" => "deskripsi",
              "deskripsi" => $deskripsi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Deskripsi $deskripsi)
    {

        return view('admin.deskripsi.editDeskripsi', [
            "title" => "deskripsi",
             "deskripsi" => $deskripsi
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deskripsi $deskripsi)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        Deskripsi::where('id', $deskripsi->id)->update($validateData);
        return redirect('/admin/deskripsi/deskripsi')->with('success','deskripi sekarang sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deskripsi  $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deskripsi $deskripsi)
    {
        Deskripsi::destroy($deskripsi->id);
        return redirect('/admin/deskripsi/deskripsi')->with('success','deskripi sekarang sudah dihapus');
    }
}
