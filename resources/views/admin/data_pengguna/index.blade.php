@extends('layout.admin.main')

@section('tittleadmin') @lang('Data Pengguna') @endsection

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
  @component('components.breadcrumb')
  @slot('li_1') Sipakar @endslot
  @slot('title') Data pengguna @endslot
  @endcomponent
    
  <section class="content">
    <div class="card">
      <div class="card-header">
          <div class="card-body table-responsive p-0">
            <!-- @if ($message = Session::get('success'))
              <div class="alert alert-success" role="alert">
                {{ $message }}
              </div>
            @endif -->
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                        <tr class="bg-info">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @php
                        $no = 1;
                      @endphp
                        @foreach($users as $index => $pengguna)
                        <tr>
                            <td>{{$index + $users->firstItem() }}</td>
                            <td>{{$pengguna->name}}</td>
                            <td>{{$pengguna->email}}</td>
                            <td>{{$pengguna->telp}}</td>
                            <td>{{$pengguna->alamat}}</td>
                            <td>{{$pengguna->role}}</td>
                            <td>
                              <form action="data-pengguna/{{$pengguna->id}}" method="POST">
                                <a href="{{ route('data-pengguna.edit',$pengguna->id)}}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="deleteUser" data-id="{{ $pengguna->id }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Hapus</button>
                              </form>
                            </td>
                        </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                </table>
                <br>
                {{$users->links()}}
          </div>
        </div>
      </div>
  </section>

</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
  $('body').on('click', '#deleteUser', function() {
    let idUser = $(this).data('id');
    swal({
          title: "Apakah Anda Yakin?",
          text: "Untuk menghapus data ini",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((result) => {
          if (result) {
            form_confirmation =
              "<form method=\"POST\" action=\"{{ url('/delete') }}/" + idUser
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