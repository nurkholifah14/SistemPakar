<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejalakulit;

class GejalakulitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gejalakulit = Gejalakulit::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.gejalakulit.datagejala', compact('gejalakulit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gejalakulit.tambahgejala');
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
            'kode_gejala' => 'required|unique:gejalakulit,kode_gejala',
            'nama_gejala' => 'required',
        ]);

        $gejalakulit = Gejalakulit::create([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect('/gejalakulit')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
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
        $edit = Gejalakulit::find($id);
        return view('admin.gejalakulit.editgejala', compact('edit'));
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
            'nama_gejala' => 'required',
        ]);

        Gejalakulit::where('id', $id)->update([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
        ]);

        return redirect('/gejalakulit')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gejalakulit::destroy($id);
        return redirect('/gejalakulit')->with(["message" => "<script>swal('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
