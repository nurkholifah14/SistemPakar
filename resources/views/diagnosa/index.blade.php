@extends('layout.user.main')

<!-- @section('tittle') @lang('Informasi - jenis Kulit') @endsection -->

@section('container')
<div>
    <section>
    <div class="container pt-5 mb-5">
        <div class="row gx-5 justify-content-center">
        <div class="col-lg-11 col-xl-5 col-xxl-8">
            <!-- Project Card 2-->
            <div class="card overflow-hidden shadow rounded-4 border-0">
                <div class="card">
                    <div class="card-body">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <center>
                            <strong><h4>Konsultasi</h4></strong>
                        </center>
                    </div>
                        <div class="card text-center">
                            <div class="card-header">
                            Jawablah pertanyaan berikut sesuai dengan gejala yang Anda rasakan
                            </div>
                            <div class="card-body">
                            
                                <h5 class="card-title"><b>{{$gejala->nama_gejala}}</b></h5>
                                
                                <div class="form-group c0l-12">
                               
                                <div class="col-12 pt-3">
                              
                                    <button class="btn btn-primary" data-answer="1">Ya</button>
                                    <button class="btn btn-danger" data-answer="0">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>


  @endsection



