@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Akun Evoting</h4>
                <div class="card-header-action">
                    <a href="javascript:void(0)" id="btn-back" class="btn btn-primary">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pemilih.simpan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Jumlah Akun Voting</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah">
                        @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" id="btn-submit" class="btn btn-success">Generate Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection