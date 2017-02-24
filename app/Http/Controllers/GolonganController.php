<?php

namespace App\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Golongan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GolonganController extends Controller
{
    /**
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
        //
         $Golongan = Golongan::all();
        return view('Golongan.index',compact('Golongan'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Golongan.create');
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
            'Kode_Golongan' => 'required|min:3|unique:Golongan',
            ]);

        $gol = new Golongan;
        $gol->Kode_Golongan = $request->get('Kode_Golongan');
        $gol->Nama_Golongan = $request->get('Nama_Golongan');
        $gol->Besaran_Uang = $request->get('Besaran_Uang');
        $gol->save();

        return redirect('Golongan');
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
        $Golongan=Golongan::find($id);
        return view('Golongan.edit',compact('Golongan'));
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
                  $Golongan = Golongan::find($id);

        $this -> validate($request, [
            'Kode_Golongan' => 'required|min:3',
            ]);
                $gol->Kode_Golongan = $request->get('Kode_Golongan');
        $gol->Nama_Golongan = $request->get('Nama_Golongan');
        $gol->Besaran_Uang = $request->get('Besaran_Uang');
        $gol->save();

        return redirect('Golongan');
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
         Golongan::find($id)->delete();
        return redirect('Golongan');
    }
}
