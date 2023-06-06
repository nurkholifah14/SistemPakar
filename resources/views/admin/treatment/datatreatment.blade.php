@extends('layout.admin.main')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->

  @component('components.breadcrumb')
  @slot('li_1') Sipakar @endslot
  @slot('title') Data Treatment @endslot
  @endcomponent

    <section class="content">
      <div class="card">
        <div class="card-header">
          <a href="/treatment/create" class="btn btn-info bg-lightblue  btn-md"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="card-bod table-responsive  p-0">
          @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
              <table class="table table-md dtable table-hover text-nowrap table-bordered">
                  <thead>
                      <tr class="bg-info">
                      <th scope="col-md-3">No</th>
                      <th scope="col">Kode Treatment</th>
                      <th scope="col-md-3">Nama Treatment</th>
                      <th scope="col-md-3">Gambar</th>
                      <th scope="col-md-3">Fungsi</th>
                      <th scope="col-md-3">Harga</th>
                      <th scope="col-md-3">Deskripsi</th>
                      <th scope="col-md-3">Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @php
                      $no = 1;
                    @endphp
                      @foreach($treatment as $index => $tr)
                      <tr>
                          <td>{{$index + $treatment->firstItem() }}</td>
                          <td>{{$tr->kode_treatment}}</td>
                          <td>{{$tr->nama_treatment}}</td>
                          <td><img src="{{asset('storage/' . $tr->gambar)}}" width="100"></td>
                          <td>{!! $tr->fungsi !!}</td>
                          <td>{{$tr->harga}}</td>
                          <td>{{$tr->deskripsi}}</td>
                          <td>
                            <form action="treatment/{{$tr->id}}" method="POST">
                              <a href="{{ route('treatment.edit',$tr->id)}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Ubah</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" id="deleteTreatment" data-id="{{ $tr->id }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Hapus</button>
                            </form>
                          </td>
                      </tr>
                    <?php $no++ ?>
                    @endforeach
                  </tbody>
              </table>
              <br>
              {{$treatment->links()}}
        </div>
     </div>
    </section>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
  $('body').on('click', '#deleteTreatment', function() {
    let idTretatment = $(this).data('id');
    swal({
          title: "Apakah Anda Yakin?",
          text: "Untuk menghapus data ini",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((result) => {
          if (result) {
            form_confirmation =
              "<form method=\"POST\" action=\"{{ url('/delete') }}/" + idTretatment +
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