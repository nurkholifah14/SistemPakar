<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;

class DataDiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosa = Diagnosa::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.data_diagnosa.index', compact('diagnosa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_diagnosa.tambah');
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
            'kode_gejala' => 'required|unique:diagnosa,kode_gejala',
            'kode_jeniskulit' => 'required|unique:diagnosa,kode_jeniskulit',
            'kode_treatment' => 'required|unique:diagnosa,kode_treatment',  
            'nama_treatment' => 'required',
        ]);

        $diagnosa = Diagnosa::create([
            'kode_gejala' => $request->kode_gejala,
            'kode_jeniskulit' => $request->kode_jeniskulit,
            'kode_treatment' => $request->kode_treatment,
            'nama_treatment' => $request->nama_treatment,
        ]);

        return redirect('/data_diagnosa')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
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
        $edit = Diagnosa::find($id);
        return view('admin.data_diagnosa.edit', compact('edit'));
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
        $request->validate([
            'kode_gejala' => 'required',
            'kode_jeniskulit' => 'required',
            'kode_treatment' => 'required',
            'nama_treatment' => 'required',
        ]);

        Diagnosa::where('id', $id)->update([
            'kode_gejala' => $request->kode_gejala,
            'kode_jeniskulit' => $request->kode_jeniskulit,
            'kode_treatment' => $request->kode_treatment,
            'nama_treatment' => $request->nama_treatment,
        ]);

        return redirect('/data_diagnosa')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Diagnosa::destroy($id);
        return redirect('/data_diagnosa')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
