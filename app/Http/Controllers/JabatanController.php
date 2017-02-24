<?php

namespace App\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JabatanController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('HRD');
     }
    public function index()
    {
        //kategori
        $Jabatan = Jabatan::all();
        return view('Jabatan.index',compact('Jabatan'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Jabatan.create');
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
      $this -> validate($request, [
            'Kode_Jabatan' => 'required|min:3|unique:Jabatan',
            ]);

        $jabat = new Jabatan;
        $jabat->Kode_Jabatan = $request->get('Kode_Jabatan');
        $jabat->Nama_Jabatan = $request->get('Nama_Jabatan');
        $jabat->Besaran_Uang = $request->get('Besaran_Uang');
        $jabat->save();

        return redirect('Jabatan');
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
    public function edit($id)
    {
        //
      $Jabatan = Jabatan::find($id);
        return view('Jabatan.edit', compact('Jabatan'));
  
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
          $Jabatan = Jabatan::find($id);

        $this -> validate($request, [
            'Kode_Jabatan' => 'required|min:3',
            ]);
        $Jabatan->Kode_Jabatan = $request->get('Kode_Jabatan');
        $Jabatan->Nama_Jabatan = $request->get('Nama_Jabatan');
        $Jabatan->Besaran_Uang = $request->get('Besaran_Uang');

        $Jabatan->save();
        return redirect('Jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Jabatan::find($id)->delete();
        return redirect('Jabatan');
    }
}