<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Treatment;


class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatment = Treatment::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.treatment.datatreatment', compact('treatment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.treatment.tambahtreatment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_treatment' => 'required|unique:treatment,kode_treatment',
            'nama_treatment' => 'required|max:255',
            'gambar' => 'required|image|mimes:png,jpg,jpeg',
            'fungsi' => 'required|max:255',
            'harga' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('post-treatments');
        }

        Treatment::create($validatedData);
        
        return redirect('/treatment')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
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
        $edit = Treatment::find($id);
        return view('admin.treatment.edittreatment', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatment $treatment)
    {
        $rules = [
            'kode_treatment' => 'required|unique:treatment,kode_treatment',
            'nama_treatment' => 'required|max:255',
            'gambar' => 'required|image|mimes:png,jpg,jpeg',
            'fungsi' => 'required|max:255',
            'harga' => 'required',
            'deskripsi' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validatedData['gambar'] = $request->file('gambar')->store('post-treatments');
        }

            Treatment::where('id', $treatment->id)
                        ->update($validatedData);

        return redirect('/treatment')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        if($treatment->gambar) {
            Storage::delete($treatment->gambar);
        }
        Treatment::destroy($treatment->id);
        return redirect('/treatment')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
