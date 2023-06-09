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
                    <div class="page-content">

<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">
        <div class="container" style="margin-top:-40px;">

            <div class="breadcrumb-line breadcrumb-line-component" id="konsultasi">
                <ul class="breadcrumb">
                    <li><a href=""><i class="icon-home2 position-left"></i>Beranda</a></li>
                    <li class="active">Hasil Diagnosa</li>
                </ul>
            </div>
            <br>

            <div class="panel panel-default">
                <div class="panel-body">

                    <fieldset class="content-group">
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <center>
                                <strong>HASIL DIAGNOSA </strong>
                            </center>
                        </div>
                        <br>

                        <style>
                        #jarak{
                            padding-left:0px;padding-right:0px;vertical-align:top;
                        }
                        #v_top{
                            vertical-align:top;
                        }
                        </style>

                        <table class="table" width="100%">
                        <tbody><tr>
                            <th width="16%" id="v_top">NAMA LENGKAP</th>
                            <th width="1%" id="jarak">:</th>
                            <td width="87%" id="jarak">Lala</td>
                        </tr>
                        <tr>
                            <th id="v_top">E-MAIL</th>
                            <th id="jarak">:</th>
                            <td id="jarak">lala@gmaill.com</td>
                        </tr>
                        <tr>
                            <th id="v_top">NO. HP</th>
                            <th id="jarak">:</th>
                            <td id="jarak">089776888</td>
                        </tr>
                        <tr>
                            <th id="v_top">ALAMAT</th>
                            <th id="jarak">:</th>
                            <td id="jarak">utuyiuiuiu</td>
                        </tr>
                        <tr>
                            <th id="v_top">JAWABAN PENGGUNA</th>
                            <th id="jarak">:</th>
                            <td id="jarak">
                            <ul>
                                        <li>G01 - Pori-Pori Kulit Kecil <b>(YA)</b></li>
                                        <li>G02 - Kulit Banyak mengeluarkan minyak<b>(TIDAK)</b></li>
                                        <li>G03 - Kulit Sedikit mengeluarkan minyak<b>(YA)</b></li>
                                    </ul>
                            </td>
                        </tr>
                        <tr>
                            <th id="v_top">HASIL</th>
                            <th id="jarak">:</th>
                            <td id="jarak">
                            <p style="white-space: pre-wrap;">Berdasarkan gejala yang <b>lala</b> alami, Jenis kulit yang dimiliki <b>Jenis kulit normal</b>.</p>    </td>
                        </tr>
                        <tr>
                            <th id="v_top">Rekomendasi Treatment</th>
                            <th id="jarak">:</th>
                            <td id="jarak">
                            <p style="white-space: pre-wrap;">-</p>    </td>
                        </tr>
                        <tr>
                            <td colspan="3"><center><a href="diagnosa/hasil/108/cetak/1" target="_blank" class="btn btn-success"><i class="icon-printer2"></i> CETAK HASIL DIAGNOSA</a></center></td>
                        </tr>
                        </tbody></table>


                        <div class="col-md-12">
                                <hr><br>
                                <center>
                                <!-- <a href="" class="btn btn-default"><i class="icon-home4"></i> Beranda</a> &nbsp; -->
                                <a href="/diagnosa" class="btn btn-default"><i class="icon-search4"></i> Kembali Melakukan Diagnosa</a>
                                </center>
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>

    </div>

</div>
<!--    /content area -->

</div>
<!-- /main content -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>


@endsection