<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use App\Golongan;
use App\User;
use App\Pegawai;
use DB;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class PegawaiController extends Controller
{
        use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('Admin');
    }
    public function index()
    {
        //
        $Jabatan = Jabatan::all();
        $Golongan = Golongan::all();
        $Pegawai = Pegawai::all();
        return view('Pegawai.index', compact('Jabatan', 'Golongan', 'Pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $forid = DB::table('Pegawai')->max('id');
        $newkode = $forid + 1;
        $digit = strlen($newkode);
        if ($digit == '1') {
            $kode = "1010101010".$newkode;
        }
        elseif ($digit == '2') {
            $kode = "101010101".$newkode;
        }
        elseif ($digit == '3') {
            $kode = "10101010".$newkode;
        }
        elseif ($digit == '4') {
            $kode = "1010101".$newkode;
        }

        $dd = User::all();
        $Jabatan = Jabatan::all();
        $Golongan = Golongan::all();
        return view('Pegawai.create', compact('kode', 'Pegawai', 'dd', 'Jabatan', 'Golongan'));
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

$input = $request->all();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'permission' => $input['permission']
        ]);

           $mm = new Pegawai;
           $mm->Nip = Input::get('Nip'); 
           $mm->user_id = $user->id;  
           $mm->Kode_Jabatan = Input::get('Kode_Jabatan'); 
           $mm->Kode_Golongan = Input::get('Kode_Golongan'); 

        if($request->hasFile('Photo')){
            $file = $request->file('Photo');
            $destinationPath = public_path().'/image/';
            $extention = $file->getClientOriginalName();
            $filename = str_random(6).'_'. $extention;
            $uploadSuccess = $file->move($destinationPath, $filename);
            $mm->Photo = $filename;
        }
        else{
            $mm->Photo = 'default.png';
        }
            $mm->save();
        return redirect(route('Pegawai.index'));
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

        $Pegawai = Pegawai::find($id);
        $Jabatan = Jabatan::all();
        $Golongan = Golongan::all();

        return view('Pegawai.edit', compact('Pegawai', 'Jabatan', 'Golongan'));
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
        $Pegawai = Pegawai::find($id);
            $Pegawai->Nip = $request->get('Nip');
            $Pegawai->Kode_Golongan = $request->get('Kode_Golongan');
            $Pegawai->Kode_Jabatan = $request->get('Kode_Jabatan');

        $this -> validate($request, [
            'Nip' => 'required|numeric|min:3|',
            ]);

        if($request->hasFile('Photo')){
            $filename = null;
            $uploaded_photo = $request->file('Photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5 (time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/image/';
            $uploaded_photo->move($destinationPath, $filename);
            if ($Pegawai->Photo) {
                $old_photo = $Pegawai->Photo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/image/' . DIRECTORY_SEPARATOR . $Pegawai->Photo;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $Pegawai->Photo = $filename;
        }
        $Pegawai->save();

        return redirect('Pegawai');
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
        Pegawai::find($id)->delete();
        return redirect('Pegawai');
    }
}
