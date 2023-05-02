@extends('backend.layouts.app')
@section('onPage')
Akun > Admin > <span style="color: #4e73df;">Ubah Profil</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ubah Password</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/account/save-profile')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="ml-1">Nama :</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Nama..." value="{{auth()->user()->name}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="ml-1">Surel :</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Surel..." value="{{auth()->user()->email}}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        email : <strong>{{old('email')}}</strong>, {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username" class="ml-1">Role :
                                    <strong>
                                        Admin
                                    </strong>
                                </label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password" class="ml-1">Kata Sandi Saat Ini:</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi Saat Ini..." value="{{old('password')}}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/account/save-profile-password')}}">
                            @csrf
                            <div class="form-group">
                                <label for="new_password" class="ml-1">Password Baru :</label>
                                <input type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password" placeholder="Password Baru..." value="{{old('new_password')}}">
                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="ml-1">Konfirmasi Password Baru :</label>
                                <input type="password" class="form-control  @error('confirm-password') is-invalid @enderror" name="confirm-password" placeholder="Konfirmasi Password Baru..." value="{{old('confirm-password')}}">
                                @error('confirm-password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password" class="ml-1">Password Lama :</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password..." value="{{old('password')}}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection