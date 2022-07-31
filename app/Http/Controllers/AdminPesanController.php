<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class AdminPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('search'));
       

            if(request('search')){
                $pesan =  ContactUs::where('pesan', 'like', '%' . request('search') . '%')->paginate(2);

            }else{
                $pesan = ContactUs::latest()->paginate(2);

            }
        return view('admin.pesan.pesan',[
            'title'=>'contact',
            'contact_us' =>  $pesan
    
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactus = contactus::select('nama','pesan', 'id')->where('id', $id)->first();
        // $contactus = contactus::find($id)->first();
        return view('admin.pesan.show',[
                "title" => "contact",
                "contact_us" => $contactus
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactus, $id)
    {
        $contactus = ContactUs::find($id);
        $contactus->delete();
        // ContactUs::destroy($contactus->id);
        return redirect('/admin/pesan/pesan')->with('success','Pesan sekarang sudah dihapus');
    }
}
