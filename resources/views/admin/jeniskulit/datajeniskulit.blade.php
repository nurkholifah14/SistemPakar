@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">

<!-- Content Header (Page header) -->
    @component('components.breadcrumb')
    @slot('li_1') Sipakar @endslot
    @slot('title') Data Jenis Kulit @endslot
    @endcomponent

    <section class="content">
            <div class="card">
                <div class="card-header">
                <a href="/jeniskulit/create" method="POST" class="btn btn-info bg-lightblue  btn-md"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th scope="col">No</th>
                                <th scope="col">Kode Jenis</th>
                                <th scope="col">Nama Jenis Kulit</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($jeniskulits as $index => $jk)
                                <tr>
                                    <td>{{$index + $jeniskulits->firstItem() }}</td>
                                    <td>{{ $jk->kode_jenis }}</td>
                                    <td>{{ $jk->nama_jeniskulit }}</td>
                                    <td>{{ $jk->deskripsi }}</td>
                                    <td>
                                    <form action="jeniskulit/{{$jk->id}}" method="POST">
                                        <a href="{{ route('jeniskulit.edit',$jk->id)}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Ubah</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="deleteJenisKulit" data-id="{{ $jk->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{$jeniskulits->links()}}
                </div>
            </div>
    </section>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
    $('body').on('click', '#deleteJenisKulit', function() {
    let idJenisKulit = $(this).data('id');
    swal({
            title: "Apakah Anda Yakin?",
            text: "Untuk menghapus data ini",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                form_confirmation =
                    "<form method=\"POST\" action=\"{{ url('/delete') }}/" + idJenisKulit +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"
                form = $(form_confirmation)
                form.appendTo('body');
                form.submit();
                } else {
                    swal('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
        })
    })
    </script>
@endsection
