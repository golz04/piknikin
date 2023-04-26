@extends('backend.layouts.app')
@section('onPage')
Akun > Admin > <span style="color: #4e73df;">Detail Akun</span>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Akun ({{$getDetailUser->name}})</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-25">Nama Lengkap</th>
                                <td>{{$getDetailUser->name}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Email</th>
                                <td>{{$getDetailUser->email}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Email Telah Diverifikasi Pada</th>
                                <td>{{$getDetailUser->email_verified_at}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Dibuat Pada</th>
                                <td>{{$getDetailUser->created_at}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Terakhir Diperbarui Pada</th>
                                <td>{{$getDetailUser->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <form action="{{url('/admin/account')}}/{{$getDetailUser->id}}/reset" method="POST" class="d-inline">
                            @method('patch')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Reset Password ?')">
                                <i class="fas fa-history"></i> &nbsp; 
                                Reset Password
                            </button>
                        </form>
                        <form action="{{url('/admin/account')}}/{{$getDetailUser->id}}/drop" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')">
                                <i class="fas fa-trash"></i> &nbsp; 
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection