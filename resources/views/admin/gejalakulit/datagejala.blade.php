@extends('layout.admin.main')

@section('tittleadmin') @lang('Data Gejala Kulit') @endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  @component('components.breadcrumb')

  @slot('li_1') Sipakar @endslot
  @slot('title') Data Gejala Kulit @endslot

  @endcomponent
  
  <section class="content">
    <div class="card">
        <div class="card-header">
          <a href="/gejalakulit/create"  method="POST" class="btn btn-info bg-lightblue  btn-md"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body table-responsive p-0">
          @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
              <table class="table table-hover text-nowrap table-bordered">
                  <thead>
                      <tr class="bg-info">
                      <th scope="col">No</th>
                      <th scope="col">Kode Gejala</th>
                      <th scope="col">Nama Gejala</th>
                      <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @php
                      $no = 1;
                    @endphp
                      @foreach($gejalakulit as $index => $gk)
                      <tr>
                          <td>{{$index + $gejalakulit->firstItem() }}</td>
                          <td>{{$gk->kode_gejala}}</td>
                          <td>{{$gk->nama_gejala}}</td>
                          <td>
                            <form action="gejalakulit/{{$gk->id}}" method="POST">
                              <a href="{{ route('gejalakulit.edit',$gk->id)}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Ubah</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" id="deleteGejalaKulit" data-id="{{ $gk->id }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Hapus</button>
                            </form>
                          </td>
                      </tr>
                    <?php $no++ ?>
                    @endforeach
                  </tbody>
              </table>
        </div>
        <br>
        {{$gejalakulit->links()}}
    </div>
  </section>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
  $('body').on('click', '#deleteGejalaKulit', function() {
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
              "<form method=\"POST\" action=\"{{ url('/delete') }}/" + idGejalakulit +
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