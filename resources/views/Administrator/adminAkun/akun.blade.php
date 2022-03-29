@extends('layouts.administrator')
@section('title', 'Administrasi Akun')
@section('sidebar')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Administrasi Akun</h1>
      </div>
            <div class="card">
                <div class="card-header">
                  <h4>Tabel Akun Dokter</h4>
                  <div class="card-header-action">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari berdasarkan username">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <a class="btn btn-primary" href="/AdminAkun/create" role="button"><i class="fa fa-plus-circle"></i> Tambah Akun</a>
                </div>
                <div class="card-body">
                  <br>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Username</th>
                        <th scope="col">Kelas Akun</th>
                        <th scope="col">Status Akun</th>
                        <th colspan="2" scope="colgroup"></th>
                      </tr>
                    </thead>
                  <tbody>
                      @foreach($data as $key=>$value)
                        @if ($value->status_pengguna === 1)
                        @php $status = '<span class="badge badge-pill badge-success">Aktif</span>' @endphp
                          @elseif ($value->status_pengguna === 2)
                          @php $status = '<span class="badge badge-pill badge-danger">Non Aktif</span>' @endphp
                            @endif
                        @if ($value->id_kelas_pengguna === 1)
                        @php $kelas = "User" @endphp
                          @elseif ($value->id_kelas_pengguna === 2)
                          @php $kelas = "Admin" @endphp
                            @endif
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{ $value->nama_lengkap }}</td>
                      <td>{{ $value->username }}</td>
                      <td>{{ $kelas }}</td>
                      <td>{!! $status !!}</td>
                      <td><a class="btn btn-primary" href="{{url('AdminAkun/'.$value->username.'/edit')}}" data-toggle="tooltip" data-placement="top" title data-original-title="Edit Data Akun"><i class="far fa-edit"></i></a></td>
                      <td>
                       <form action="{{url('AdminAkun/'.$value->username)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger trigger--fire-modal-7" type="submit" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Data Akun"><i class="fas fa-trash"></i></button>
                        </form>    
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
          </div>
        </div>
    </section>
</div>
@endsection


{{-- data-confirm="Data akun dan seluruh biodata pengguna terkait akun ini akan dihapus, lanjut hapus akun?" data-confirm-yes="alert('Deleted')" --}}