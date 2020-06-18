@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Kandidat</h4>
                <div class="card-header-action">
                    <a href="javascript:void(0)" id="btn-back" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kandidat.ubah',$kandidat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Kandidat</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $kandidat->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Visi</label>
                        <textarea name="visi" id="ckeditor" cols="30" rows="7"
                    class="form-control ckeditor @error('visi') is-invalid @enderror">{{ $kandidat->visi }}</textarea>
                        @error('visi')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Misi</label>
                        <textarea name="misi" id="ckeditor" cols="30" rows="7"
                            class="form-control ckeditor @error('misi') is-invalid @enderror">{{ $kandidat->visi }}</textarea>
                        @error('misi')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Foto Kandidat</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                        <small class="text-warning">Kosongkan Jika Tidak Akan Mengubah Foto Profil </small>
                        @error('avatar')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" id="btn-submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection