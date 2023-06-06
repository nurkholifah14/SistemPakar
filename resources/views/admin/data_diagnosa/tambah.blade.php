@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
  @component('components.breadcrumb')
  @slot('li_1') Data Diagnosa @endslot
  @slot('title') Tambah Data @endslot
  @endcomponent

  <!-- Main content -->
    
  <section class="content ">
    <div class="ml-3 mt-3">
      <div class="card card-lightblue bg-light">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Diagnosa</h3>
        </div>
        <form action="/data-diagnosa" method="POST">
          @csrf
            <div class="card-body">
                <div class="form-group">
                  <label for="kodegejala">Kode Gejala</label>
                  <input type="text" id="kode_gejala" name="kode_gejala" class="form-control @error('kode_gejala') is-invalid @enderror" value="{{ old('kodegejala', '') }}" placeholder="G**">
                  @error('kode_gejala')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kodejeniskulit">Kode Jenis Kulit</label>
                  <input type="text" id="kode_jeniskulit" name="kode_jeniskulit" class="form-control @error('kode_jeniskulit') is-invalid @enderror" value="{{ old('kodejeniskulit', '') }}" placeholder="JK**">
                  @error('kode_jeniskulit')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kodetreatment">Kode Treatment</label>
                  <input type="text" id="kode_treatment" name="kode_treatment" class="form-control @error('kode_treatment') is-invalid @enderror" value="{{ old('kodetreatment', '') }}" placeholder="T**">
                  @error('kode_treatment')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama">Nama Treatment</label>
                  <input type="text" id="nama" name="nama_treatment" class="form-control @error('nama_treatment') is-invalid @enderror" value="{{ old('nama', '') }}" placeholder="text">
                  @error('nama_treatment')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-12">
                    <button class="btn btn-success float-right" type="submit">Simpan</button>
                    <button class="btn btn-secondary float-right">Cancel</button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </section>
    <!-- /.content -->
</div>

@endsection