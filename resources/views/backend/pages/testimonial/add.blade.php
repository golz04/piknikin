@extends('backend.layouts.app')
@section('onPage')
Master Web > Testimoni > <span style="color: #4e73df;">Tambah Data</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Testimoni</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/testimonial/store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name" class="ml-1">Nama Lengkap* :</label>
                            <input type="text" class="form-control  @error('full_name') is-invalid @enderror" name="full_name" placeholder="Nama Lengkap..." value="{{old('full_name')}}" autocomplete="off">
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="job" class="ml-1">Pekerjaan / Jabatan* :</label>
                            <input type="text" class="form-control  @error('job') is-invalid @enderror" name="job" placeholder="Pekerjaan / Jabatan..." value="{{old('job')}}" autocomplete="off">
                            @error('job')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message" class="ml-1">Pesan* :</label>
                            <input type="text" class="form-control  @error('message') is-invalid @enderror" name="message" placeholder="Pesan..." value="{{old('message')}}" autocomplete="off">
                            @error('message')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="avatar" class="ml-1">Foto* :</label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" placeholder="Foto..." value="{{old('avatar')}}" style="padding-bottom: 36px !important;" autocomplete="off">
                            @error('avatar')
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
                        <span class="text">Simpan Testimoni</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection