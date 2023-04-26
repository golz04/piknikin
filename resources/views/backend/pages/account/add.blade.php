@extends('backend.layouts.app')
@section('onPage')
Akun > Admin > <span style="color: #4e73df;">Tambah Akun</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Admin</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/account/store')}}">
                @csrf
                <div class="form-group">
                    <label for="full_name" class="ml-1">Nama Lengkap* :</label>
                    <input type="text" class="form-control  @error('full_name') is-invalid @enderror" name="full_name" placeholder="Nama Lengkap..." value="{{old('full_name')}}" autocomplete="off">
                    @error('full_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="ml-1">Email* :</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email..." value="{{old('email')}}" autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="ml-1">Kata Sandi* :</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi..." value="{{old('password')}}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirm" class="ml-1">Konfirmasi Kata Sandi* :</label>
                            <input type="password" class="form-control  @error('password_confirm') is-invalid @enderror" name="password_confirm" placeholder="Konfirmasi Kata Sandi..." value="{{old('password_confirm')}}">
                            @error('password_confirm')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Akun</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection